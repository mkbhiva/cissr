<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Webpages extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_webpages');
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }

    function delete($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Yes - Delete Page") {
            $this->_process_delete($update_id);

            $flash_msg = "The Page was successfully deleted.";
            $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
            $this->session->set_flashdata('post', $value);
            redirect('webpages/manage/' . $update_id);
        }
    }

    function _process_delete($update_id) {
        $this->_delete($update_id);
    }

    function deleteconf($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }elseif ($update_id<3) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['headline'] = "Delete Page";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "deleteconf";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function create() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {

            $this->form_validation->set_rules('page_title', 'Page Title', 'Trim|required|max_length[250]');
            $this->form_validation->set_rules('page_content', 'Post Content', 'trim|required|max_length[250]');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();
                $data['page_url'] = url_title($data['page_title']);

                if (is_numeric($update_id)) {
                        if($update_id<3){
                            unset($data['page_url']);
                        }
                    $this->_update($update_id, $data);
                    $flash_msg = "The Page details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('webpages/create/' . $update_id);
                } else {
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Page was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('webpages/create/' . $update_id);
                }
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Create New Page";
        } else {
            $data['headline'] = "Update Page details";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function fetch_data_from_post() {
        $data['page_title'] = $this->input->post('page_title', TRUE);
        $data['page_keywords'] = $this->input->post('page_keywords', TRUE);
        $data['page_description'] = $this->input->post('page_description', TRUE);
        $data['page_content'] = $this->input->post('page_content', TRUE);

        return $data;
    }

    function fetch_data_from_db($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['page_title'] = $row->page_title;
            $data['page_keywords'] = $row->page_keywords;
            $data['page_description'] = $row->page_description;
            $data['page_content'] = $row->page_content;
            $data['page_url'] = $row->page_url;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['query'] = $this->get('page_url');

        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function get($order_by) {
        $query = $this->mdl_webpages->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_webpages->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_webpages->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_webpages->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_webpages->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_webpages->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_webpages->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_webpages->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_webpages->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_webpages->_custom_query($mysql_query);
        return $query;
    }

}
