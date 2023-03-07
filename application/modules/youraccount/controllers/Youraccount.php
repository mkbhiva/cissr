<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Youraccount extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }
    
    function welcome() {
        $data = "";
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function login() {
        $data['username'] = $this->input->post('username', TRUE);
        $this->load->module('templates');
        $this->templates->login($data);
    }

    function submit_login() {
        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Submit") {
            $this->form_validation->set_rules('username', 'Username or Email Address', 'Trim|callback_username_check');
            $this->form_validation->set_rules('pword', 'Password', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $col1 = "username";
                $value1 = $this->input->post('username', TRUE);
                $col2 = "email";
                $value2 = $this->input->post('username', TRUE);
                $query = $this->site_accounts->get_with_double_condition($col1, $value1, $col2, $value2);
                foreach ($query->result() as $row) {
                    $user_id = $row->id;
                }
                $this->_in_you_go($user_id);
            }else{
                echo validation_errors();
            }
        }
    }

    function _in_you_go($user_id) {
        echo "you are welcome to private area $user_id";
    }

    function username_check($str) {
        $this->load->module('site_accounts');
        $this->load->module('site_security');

        $error_msg = "You did not enter a correct username or/and password.";

        $col1 = "username";
        $value1 = $str;
        $col2 = "email";
        $value2 = $str;

        $query = $this->site_accounts->get_with_double_condition($col1, $value1, $col2, $value2);
        $num_rows = $query->num_rows();

        if ($num_rows < 1) {
            $this->form_validation->set_message('username_check', $error_msg);
            return FALSE;
        }

        foreach ($query->result() as $row) {
            $pword_on_table = $row->pword;
        }

        $pword = $this->input->post('pword', TRUE);
        $result = $this->site_security->_verify_hash($pword, $pword_on_table);

        if ($result == TRUE) {
            return TRUE;
        } else {
            $this->form_validation->set_message('username_check', $error_msg);
            return FALSE;
        }
    }

}
