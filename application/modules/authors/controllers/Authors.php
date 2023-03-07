<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Authors extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_authors');
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }


    function _get_single_author($update_id){

        $query = $this->mdl_authors->_get_single_author($update_id);
        return $query;

    }


    function _get_dropdown_options() {

        $options[''] = 'Please select ..';
        $query = $this->get('id');

        foreach ($query->result() as $row) {
            $options[$row->id] = $row->author_name;
        }
        return $options;
    }


    function delete_image($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $author_img = $data['author_img'];
        $img_path_1 = './assets/images/authors/raw/' . $author_img;
        $img_path_2 = './assets/images/authors/thumb/' . $author_img;
        $img_path_3 = './assets/images/authors/main/' . $author_img;

        if (file_exists($img_path_1)) {
            unlink($img_path_1);
        }

        if (file_exists($img_path_2)) {
            unlink($img_path_2);
        }

        if (file_exists($img_path_3)) {
            unlink($img_path_3);
        }


        unset($data);
        $data['author_img'] = "";
        $this->_update($update_id, $data);
        $flash_msg = "The Aothor image was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('authors/create/' . $update_id);
    }



    function _generate_main($file_name) {

        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/authors/raw/' . $file_name;
        $config['new_image'] = './assets/images/authors/main/' . $file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 200;
        $config['height'] = 200;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
        $this->image_lib->clear();
    }

    function _generate_thumbnail($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/authors/raw/' . $file_name;
        $config['new_image'] = './assets/images/authors/thumb/' . $file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 100;
        $config['height'] = 100;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
        $this->image_lib->clear();
        $this->_generate_main($file_name);
        
        
    }

    function do_upload($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == 'Cancel') {
            redirect('authors/create/' . $update_id);
        }

        $config['upload_path'] = './assets/images/authors/raw/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 3000;
        $config['max_width'] = 2500;
        $config['max_height'] = 2500;

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
            $this->_generate_thumbnail($file_name);
            //$this->_generate_main($file_name);



            $update_data['author_img'] = $file_name;
            $this->_update($update_id, $update_data);

            $data['headline'] = "Upload Successfully";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_success";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
    }

    function upload_image($update_id) {
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

    function create() {
        $this->load->library('session');
        $this->load->module('author_type');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {

            $this->form_validation->set_rules('author_name', 'Author Name', 'Trim|required|max_length[260]');
            $this->form_validation->set_rules('author_desc', 'Author Description', 'trim|required');
            $this->form_validation->set_rules('auth_type', 'Aothor Type', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Aothor details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('authors/create/' . $update_id);
                } else {
                    $data['id'] = time();
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Aothor was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('authors/create/' . $update_id);
                }
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Aothor";
            $data['author_img'] = "";
        } else {
            $data['headline'] = "Update Aothor details";
        }

        $data['options'] = $this->author_type->_get_dropdown_options($update_id);
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['query'] = $this->get('id');

        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function fetch_data_from_post() {
        $data['author_name'] = strip_tags($this->input->post('author_name', TRUE));
        $data['author_desc'] = $this->input->post('author_desc', TRUE);
        $data['auth_type'] = strip_tags($this->input->post('auth_type', TRUE));
        return $data;
    }

    function fetch_data_from_db($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['author_name'] = $row->author_name;
            $data['author_desc'] = $row->author_desc;
            $data['auth_type'] = $row->auth_type;
            $data['author_img'] = $row->author_img;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function get($order_by) {
        $query = $this->mdl_authors->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_authors->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_authors->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_authors->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_authors->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_authors->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_authors->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_authors->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_authors->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_authors->_custom_query($mysql_query);
        return $query;
    }

    

}
