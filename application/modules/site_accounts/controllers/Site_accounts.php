<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site_accounts extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_site_accounts');
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }

    function update_pword() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {

            $this->form_validation->set_rules('pword', 'Password', 'Trim|required|min_length[7]|max_length[35]');
            $this->form_validation->set_rules('repeat_pword', 'Repeat Password', 'Trim|required|matches[pword]');
            if ($this->form_validation->run() == TRUE) {
                $pword = $this->input->post('pword', TRUE);
                $this->load->module('site_security');
                $data['pword'] = $this->site_security->_hashing_string($pword);

                $this->_update($update_id, $data);
                $flash_msg = "The Account Password was successfully updated.";
                $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                $this->session->set_flashdata('post', $value);
                redirect('site_accounts/create/' . $update_id);
            }
        }

        $data['headline'] = "Update Account Password";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "update_pword";
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

            $this->form_validation->set_rules('username', 'Username', 'Trim|required');
            $this->form_validation->set_rules('firstname', 'First Name', 'Trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Account details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('site_accounts/create/' . $update_id);
                } else {
                    $data['date_made'] = time();
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Account was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('site_accounts/create/' . $update_id);
                }
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Account";
        } else {
            $data['headline'] = "Update Account details";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function fetch_data_from_post() {
        $data['username'] = $this->input->post('username', TRUE);
        $data['firstname'] = $this->input->post('firstname', TRUE);
        $data['lastname'] = $this->input->post('lastname', TRUE);
        $data['company'] = $this->input->post('company', TRUE);
        $data['address1'] = $this->input->post('address1', TRUE);
        $data['address2'] = $this->input->post('address2', TRUE);
        $data['town'] = $this->input->post('town', TRUE);
        $data['country'] = $this->input->post('country', TRUE);
        $data['postcode'] = $this->input->post('postcode', TRUE);
        $data['telnum'] = $this->input->post('telnum', TRUE);
        $data['email'] = $this->input->post('email', TRUE);

        return $data;
    }

    function fetch_data_from_db($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['username'] = $row->username;
            $data['firstname'] = $row->firstname;
            $data['lastname'] = $row->lastname;
            $data['company'] = $row->company;
            $data['address1'] = $row->address1;
            $data['address2'] = $row->address2;
            $data['town'] = $row->town;
            $data['country'] = $row->country;
            $data['postcode'] = $row->postcode;
            $data['telnum'] = $row->telnum;
            $data['email'] = $row->email;
            $data['date_made'] = $row->date_made;
            $data['pword'] = $row->pword;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['query'] = $this->get('username');

        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function get($order_by) {
        $query = $this->mdl_site_accounts->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_site_accounts->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_site_accounts->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_site_accounts->get_where_custom($col, $value);
        return $query;
    }
    
    function get_with_double_condition($col1, $value1, $col2, $value2) {
        $query = $this->mdl_site_accounts->get_with_double_condition($col1, $value1, $col2, $value2) ;
        return $query;
    }

    function _insert($data) {
        $this->mdl_site_accounts->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_site_accounts->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_site_accounts->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_site_accounts->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_site_accounts->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_site_accounts->_custom_query($mysql_query);
        return $query;
    }

}
