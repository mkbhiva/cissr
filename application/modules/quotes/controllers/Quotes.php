<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quotes extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_quotes');
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }


    function _get_quotesLink(){

        $query = $this->mdl_quotes->_get_quotesLink();
        $num_rows = $query->num_rows();

        if($num_rows>0){

            foreach ($query->result() as $row) 
            {
                $quote_desc = $row->quote_desc;
            }
        } else {
            $quote_desc = '';
        }

        return $quote_desc;
    }


    function create() {
        $this->load->library('session');
        $this->load->module('author_type');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {

            $this->form_validation->set_rules('quote_text', 'Main Quotes', 'Trim|required');
            $this->form_validation->set_rules('quote_desc', 'Quote Description', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Quotes details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('quotes/create/' . $update_id);
                } else {
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Quotes Details was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('quotes/create/' . $update_id);
                }
            } else {

                $flash_msg = validation_errors();
                $value = '<div class="alert alert-danger" role="alert"><strong>' . $flash_msg . '</strong></div>';
                $this->session->set_flashdata('post', $value);
                redirect('quotes/create/' . $update_id);

            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Quotes";
        } else {
            $data['headline'] = "Update Quotes";
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

    function index() {

        $data['query_past'] = $this->get_with_limit(10, 1, 'id desc');
        $data['query'] = $this->get_with_limit(1, 0, 'id desc');
        $data['navactive'] = 7;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function fetch_data_from_post() {
        $data['quote_text'] = strip_tags($this->input->post('quote_text', TRUE));
        $data['quote_desc'] = $this->input->post('quote_desc', TRUE);
        $data['quote_created'] = time();
        $data['quote_status'] = 1;
        return $data;
    }

    function fetch_data_from_db($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['quote_text'] = $row->quote_text;
            $data['quote_desc'] = $row->quote_desc;
            $data['quote_created'] = $row->quote_created;
            $data['quote_status'] = $row->quote_status;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function get($order_by) {
        $query = $this->mdl_quotes->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_quotes->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_quotes->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_quotes->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_quotes->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_quotes->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_quotes->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_quotes->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_quotes->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_quotes->_custom_query($mysql_query);
        return $query;
    }

    

}
