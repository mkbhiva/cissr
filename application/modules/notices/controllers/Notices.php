<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notices extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_notices');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
    }


    function _get_list($limit, $offset)
    {
        $query = $this->mdl_notices->_get_list($limit, $offset);
        return $query;
    }


    function delete_image($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $notice_file = $data['notice_file'];
        $img_path_1 = './assets/notices/raw/' . $notice_file;


        if (file_exists($img_path_1)) {
            unlink($img_path_1);
        }



        unset($data);
        $data['notice_file'] = "";
        $this->_update($update_id, $data);
        $flash_msg = "The Photo was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('notices/create/' . $update_id);
    }


    function _generate_thumbnail($file_name)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/testimonial/' . $file_name;
        $config['new_image'] = './assets/images/testimonial/' . $file_name;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 200;
        $config['height'] = 200;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
        $this->image_lib->clear();
    }



    function do_upload($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == 'Cancel') {
            redirect('notices/create/' . $update_id);
        }

        $config['file_name']        = time();
        $config['upload_path'] = './assets/notices/raw/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
        $config['max_size'] = 50000;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));

            $data['headline'] = "Upload Error";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->admin($data);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];


            $update_data['notice_file'] = $file_name;
            $this->_update($update_id, $update_data);

            $data['headline'] = "Upload Successfully";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_success";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
    }


    function upload_image($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['headline'] = "Upload Image";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "upload_image";
        $this->load->module('templates');
        $this->templates->admin($data);
    }


    function _get_noticesLink()
    {

        $query = $this->mdl_notices->_get_noticesLink();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {

            foreach ($query->result() as $row) {
                $tplace = $row->tplace;
            }
        } else {
            $tplace = '';
        }

        return $tplace;
    }


    function create()
    {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {

            $this->form_validation->set_rules('notice_title', 'English Title', 'Trim|required');
            $this->form_validation->set_rules('notice_htitle', 'Hindi Title', 'Trim|required');
            $this->form_validation->set_rules('notice_desc', 'Description', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The notices details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('notices/create/' . $update_id);
                } else {
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The notices Details was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('notices/create/' . $update_id);
                }
            } else {

                $flash_msg = validation_errors();
                $value = '<div class="alert alert-danger" role="alert"><strong>' . $flash_msg . '</strong></div>';
                $this->session->set_flashdata('post', $value);
                redirect('notices/create/' . $update_id);
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New notices";
            $data['notice_file'] = "";
        } else {
            $data['headline'] = "Update notices";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function manage()
    {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['query'] = $this->get('id');

        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function index()
    {

        $data['navactive'] = 8;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function administration()
    {

        $mysql_query = "select * from notices where notice_status = 1 AND notice_cat = 1 order by id desc";
        $data['query'] = $this->_custom_query($mysql_query);

        $data['navactive'] = 8;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "administration";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function mvsmeet()
    {

        $mysql_query = "select * from notices where notice_status = 1 AND notice_cat = 2 order by id desc";
        $data['query'] = $this->_custom_query($mysql_query);

        $data['navactive'] = 8;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "mvsmeet";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function allhostel()
    {

        $mysql_query = "select * from notices where notice_status = 1 AND notice_cat = 3 order by id desc";
        $data['query'] = $this->_custom_query($mysql_query);

        $data['navactive'] = 8;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "allhostel";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function hosteldetails($url)
    {
        $mysql_query = "select * from notices where notice_url = '$url' AND notice_status = 1 order by id desc";
        $query = $this->_custom_query($mysql_query);
        foreach ($query->result() as $row) {
            $update_id = $row->id;
        }

        $data = $this->fetch_data_from_db($update_id);

        $data['navactive'] = 8;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "hosteldetails";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function admindetails($url)
    {

        $mysql_query = "select * from notices where notice_url = '$url' AND notice_status = 1 order by id desc";
        $query = $this->_custom_query($mysql_query);
        foreach ($query->result() as $row) {
            $update_id = $row->id;
        }

        $data = $this->fetch_data_from_db($update_id);

        $data['navactive'] = 8;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "noticeadmindetail";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function meetdetails($url)
    {

        $mysql_query = "select * from notices where notice_url = '$url' AND notice_status = 1 order by id desc";
        $query = $this->_custom_query($mysql_query);
        foreach ($query->result() as $row) {
            $update_id = $row->id;
        }

        $data = $this->fetch_data_from_db($update_id);

        $data['navactive'] = 8;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "noticemvsdetail";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function important()
    {
        $data['navactive'] = 8;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "notice";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function votelist2022()
    {
        $data['navactive'] = 8;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "list2022";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function votelist2021()
    {
        $data['navactive'] = 8;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "list2021";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function votelist2017()
    {
        $data['navactive'] = 8;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "list2017";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function memlist2017()
    {
        $data['navactive'] = 8;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "memlist2017";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function change_title_case($string)
    {
        $new_string = strip_tags($string);
        $new_string = strtolower($new_string);
        $new_string = ucwords($new_string);
        return $new_string;
    }

    function fetch_data_from_post()
    {
        $data['notice_title'] = $this->change_title_case($this->input->post('notice_title', TRUE));
        $data['notice_htitle'] = $this->input->post('notice_htitle', TRUE);
        $data['notice_desc'] = $this->input->post('notice_desc', TRUE);
        $data['notice_cat'] = $this->input->post('notice_cat', TRUE);
        $data['notice_date'] = time();
        $data['notice_status'] = $this->input->post('notice_status', TRUE);
        return $data;
    }

    function fetch_data_from_db($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['notice_cat'] = $row->notice_cat;
            $data['notice_title'] = $row->notice_title;
            $data['notice_htitle'] = $row->notice_htitle;
            $data['notice_url'] = $row->notice_url;
            $data['notice_desc'] = $row->notice_desc;
            $data['notice_date'] = $row->notice_date;
            $data['notice_file'] = $row->notice_file;
            $data['notice_status'] = $row->notice_status;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function get($order_by)
    {
        $query = $this->mdl_notices->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        $query = $this->mdl_notices->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $query = $this->mdl_notices->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $query = $this->mdl_notices->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->mdl_notices->_insert($data);
    }

    function _update($id, $data)
    {
        $this->mdl_notices->_update($id, $data);
    }

    function _delete($id)
    {
        $this->mdl_notices->_delete($id);
    }

    function count_where($column, $value)
    {
        $count = $this->mdl_notices->count_where($column, $value);
        return $count;
    }

    function get_max()
    {
        $max_id = $this->mdl_notices->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $query = $this->mdl_notices->_custom_query($mysql_query);
        return $query;
    }
}
