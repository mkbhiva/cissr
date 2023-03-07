<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siteforms extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdlsiteforms');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
    }

    function _get_hp_random_gallery($limit, $offset)
    {
        $query = $this->Mdlsiteforms->_get_hp_random_gallery($limit, $offset);
        return $query;
    }


    function album($update_id)
    {

        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $form_query = $this->get_where($update_id);

        foreach ($form_query->result() as $row) {
            $form_title = $row->form_title;
        }


        $this->load->module('galleryphotos');
        $data['query'] = $this->galleryphotos->get_where_custom('form_id', $update_id);

        $data['page_title'] = $form_title;
        $data['page_keywords'] = "";
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "album";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function index()
    {

        $data['query'] = $this->get('date_created desc');

        $data['page_title'] = "Doanload Forms";
        $data['page_keywords'] = "";
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
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
        $form_img = $data['form_img'];
        $img_path = './assets/pdf/forms/' . $form_img;

        if (file_exists($img_path)) {
            unlink($img_path);
        }

        unset($data);
        $data['form_img'] = "";
        $this->_update($update_id, $data);
        $flash_msg = "The Forms file was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('siteforms/create/' . $update_id);
    }


    function _generate_thumbnail($file_name)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/gallery/form_title/' . $file_name;
        $config['new_image'] = './assets/images/gallery/form_title/' . $file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 400;
        $config['height'] = 222;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
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
            redirect('siteforms/create/' . $update_id);
        }

        $config['file_name']        = time();
        $config['upload_path'] = './assets/pdf/forms/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg';
        $config['max_size'] = 20000;


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
            //$this->_generate_thumbnail($file_name);

            $update_data['form_img'] = $file_name;
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


    function create()
    {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {

            $this->form_validation->set_rules('form_htitle', 'Forms Hindi Title', 'Trim|required|max_length[250]');
            $this->form_validation->set_rules('form_desc', 'Description', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();


                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Forms details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('siteforms/create/' . $update_id);
                } else {
                    $data['date_created'] = time();
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Forms was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('siteforms/create/' . $update_id);
                }
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Forms";
            $data['form_img'] = "";
        } else {
            $data['headline'] = "Update Forms details";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }


    function fetch_data_from_post()
    {
        $data['form_htitle'] = $this->input->post('form_htitle', TRUE);
        $data['form_desc'] = $this->input->post('form_desc', TRUE);


        return $data;
    }

    function fetch_data_from_db($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['form_htitle'] = $row->form_htitle;
            $data['date_created'] = $row->date_created;
            $data['form_desc'] = $row->form_desc;
            $data['form_img'] = $row->form_img;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }


    function manage()
    {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['query'] = $this->get('date_created desc');

        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }



    function get($order_by)
    {
        $query = $this->Mdlsiteforms->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        $query = $this->Mdlsiteforms->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $query = $this->Mdlsiteforms->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $query = $this->Mdlsiteforms->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->Mdlsiteforms->_insert($data);
    }

    function _update($id, $data)
    {
        $this->Mdlsiteforms->_update($id, $data);
    }

    function _delete($id)
    {
        $this->Mdlsiteforms->_delete($id);
    }

    function count_where($column, $value)
    {
        $count = $this->Mdlsiteforms->count_where($column, $value);
        return $count;
    }

    function get_max()
    {
        $max_id = $this->Mdlsiteforms->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $query = $this->Mdlsiteforms->_custom_query($mysql_query);
        return $query;
    }
}
