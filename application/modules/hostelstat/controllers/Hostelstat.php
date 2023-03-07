<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hostelstat extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdlhostelstat');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
    }


    function _get_list($limit, $offset)
    {
        $query = $this->Mdlhostelstat->_get_list($limit, $offset);
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
        $img_path_1 = './assets/hostelstat/raw/' . $notice_file;


        if (file_exists($img_path_1)) {
            unlink($img_path_1);
        }



        unset($data);
        $data['notice_file'] = "";
        $this->_update($update_id, $data);
        $flash_msg = "The Photo was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('hostelstat/create/' . $update_id);
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
            redirect('hostelstat/create/' . $update_id);
        }

        $config['file_name']        = time();
        $config['upload_path'] = './assets/hostelstat/raw/';
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

        $query = $this->Mdlhostelstat->_get_noticesLink();
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

            $this->form_validation->set_rules('hostalTotSeat', 'English Title', 'Trim|required');
            $this->form_validation->set_rules('hostelOccuSeat', 'Hindi Title', 'Trim|required');
            $this->form_validation->set_rules('hostelMembers', 'Description', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The hostel static details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('hostelstat/create/' . $update_id);
                } else {
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The hostel static Details was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('hostelstat/create/' . $update_id);
                }
            } else {

                $flash_msg = validation_errors();
                $value = '<div class="alert alert-danger" role="alert"><strong>' . $flash_msg . '</strong></div>';
                $this->session->set_flashdata('post', $value);
                redirect('hostelstat/create/' . $update_id);
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New static";
            $data['notice_file'] = "";
        } else {
            $data['headline'] = "Update static";
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

        $mysql_query = "select * from hostel static where hostelStatus = 1 AND hostelType = 1 order by id desc";
        $data['query'] = $this->_custom_query($mysql_query);

        $data['navactive'] = 8;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "administration";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function mvsmeet()
    {

        $mysql_query = "select * from hostel static where hostelStatus = 1 AND hostelType = 2 order by id desc";
        $data['query'] = $this->_custom_query($mysql_query);

        $data['navactive'] = 8;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "mvsmeet";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function allhostel()
    {

        $mysql_query = "select * from hostel static where hostelStatus = 1 AND hostelType = 3 order by id desc";
        $data['query'] = $this->_custom_query($mysql_query);

        $data['navactive'] = 8;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "allhostel";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function hosteldetails($url)
    {
        $mysql_query = "select * from hostel static where notice_url = '$url' AND hostelStatus = 1 order by id desc";
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

        $mysql_query = "select * from hostel static where notice_url = '$url' AND hostelStatus = 1 order by id desc";
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

        $mysql_query = "select * from hostel static where notice_url = '$url' AND hostelStatus = 1 order by id desc";
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
        $data['hostalTotSeat'] = $this->input->post('hostalTotSeat', TRUE);
        $data['hostelOccuSeat'] = $this->input->post('hostelOccuSeat', TRUE);
        $data['hostelMembers'] = $this->input->post('hostelMembers', TRUE);
        $data['hostelType'] = $this->input->post('hostelType', TRUE);
        $data['hostelUpdated'] = time();
        $data['hostelStatus'] = $this->input->post('hostelStatus', TRUE);
        return $data;
    }

    function fetch_data_from_db($update_id)
    {

        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['hostelType'] = $row->hostelType;
            $data['hostalTotSeat'] = $row->hostalTotSeat;
            $data['hostelOccuSeat'] = $row->hostelOccuSeat;
            $data['hostelMembers'] = $row->hostelMembers;
            $data['hostelUpdated'] = $row->hostelUpdated;
            $data['hostelStatus'] = $row->hostelStatus;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function get($order_by)
    {
        $query = $this->Mdlhostelstat->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        $query = $this->Mdlhostelstat->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $query = $this->Mdlhostelstat->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $query = $this->Mdlhostelstat->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->Mdlhostelstat->_insert($data);
    }

    function _update($id, $data)
    {
        $this->Mdlhostelstat->_update($id, $data);
    }

    function _delete($id)
    {
        $this->Mdlhostelstat->_delete($id);
    }

    function count_where($column, $value)
    {
        $count = $this->Mdlhostelstat->count_where($column, $value);
        return $count;
    }

    function get_max()
    {
        $max_id = $this->Mdlhostelstat->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $query = $this->Mdlhostelstat->_custom_query($mysql_query);
        return $query;
    }
}
