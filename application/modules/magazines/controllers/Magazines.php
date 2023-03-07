<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Magazines extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_magazines');
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }


    function magList() {

        $this->load->module('site_settings');
        $this->load->module('custom_pagination');
        
        $query = $this->get_where_custom('status', '1');
        $total_posts = $query->num_rows();

        $use_limit = TRUE;
        $mysql_query = $this->_generate_mysql_query($use_limit);
        $pagination_data['template'] = 'public_bootstrap';
        $pagination_data['target_base_url'] = $this->get_target_pagination_base_url();
        $pagination_data['total_rows'] = $total_posts;
        $pagination_data['offset_segment'] = 3;
        $pagination_data['limit'] = $this->get_limit();
        $pagination_data['offset'] = $this->get_offset();


        $data['pagination'] = $this->custom_pagination->_generate_pagination($pagination_data);
        $data['showing_statement'] = $this->custom_pagination-> get_showing_statement($pagination_data);

        $data['query'] = $this->_custom_query($mysql_query);

        $data['flash'] = $this->session->flashdata('post');
        $data['view_module'] = "magazines";
        $data['view_file'] = "view_cat";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }
    
    function get_target_pagination_base_url(){
        $first_bit = $this->uri->segment(1);
        $second_bit = $this->uri->segment(2);
        $target_base_url = base_url().$first_bit."/".$second_bit;
        return $target_base_url;
    }

    function _generate_mysql_query($use_limit) {
        $mysql_query = "SELECT * FROM magazines WHERE status = 1";

        if($use_limit==TRUE){
            $limit = $this->get_limit();
            $offset = $this->get_offset();
            $mysql_query.= " limit ".$offset.", ".$limit;
        }

        return $mysql_query;
    }

    function get_limit() {
        $limit = 8;
        return $limit;
    }

    function get_offset() {
        $offset = $this->uri->segment(3);
        if (!is_numeric($offset)) {
            $offset = 0;
        }
        return $offset;
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
            redirect('magazines/create/' . $update_id);
        }

        $config['upload_path'] = './assets/pdf/magazines/';
        $config['allowed_types'] = 'pdf';
        //$config['max_size'] = 30000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));

            $data['headline'] = "Upload Error";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_magazine";
            $this->load->module('templates');
            $this->templates->admin($data);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];

            $update_data['fileName'] = $file_name;
            $this->_update($update_id, $update_data);

            $data['headline'] = "Upload Successfully";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_success";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
    }



    function delete_file($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $fileName = $data['fileName'];
        $img_path_1 = './assets/pdf/magazines/' . $fileName;


        if (file_exists($img_path_1)) {
            unlink($img_path_1);
        }


        unset($data);
        $data['fileName'] = "";
        $this->_update($update_id, $data);
        $flash_msg = "The File was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('magazines/create/' . $update_id);
    }


    function upload_file($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['headline'] = "Upload Magazine";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "upload_magazine";
        $this->load->module('templates');
        $this->templates->admin($data);
    }


    function _get_magazineLink(){

        $query = $this->mdl_magazines->_get_magazineLink();
        $num_rows = $query->num_rows();

        if($num_rows>0){

            foreach ($query->result() as $row) 
            {
                $title = $row->title;
            }
        } else {
            $title = '';
        }

        return $title;
    }


    function create() {
        $this->load->library('session');
        $this->load->module('author_type');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {

            $this->form_validation->set_rules('title', 'Title of Magazines', 'Trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Magazines details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('magazines/create/' . $update_id);
                } else {
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Magazines Details was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('magazines/create/' . $update_id);
                }
            } else {

                $flash_msg = validation_errors();
                $value = '<div class="alert alert-danger" role="alert"><strong>' . $flash_msg . '</strong></div>';
                $this->session->set_flashdata('post', $value);
                redirect('magazines/create/' . $update_id);

            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Magazines";
        } else {
            $data['headline'] = "Update Magazines";
        }

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
        $data['title'] = $this->input->post('title', TRUE);
        $data['publishOn'] = time();
        $data['status'] = 1;
        return $data;
    }

    function fetch_data_from_db($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['fileName'] = $row->fileName;
            $data['title'] = $row->title;
            $data['publishOn'] = $row->publishOn;
            $data['status'] = $row->status;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function get($order_by) {
        $query = $this->mdl_magazines->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_magazines->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_magazines->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_magazines->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_magazines->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_magazines->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_magazines->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_magazines->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_magazines->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_magazines->_custom_query($mysql_query);
        return $query;
    }

    

}
