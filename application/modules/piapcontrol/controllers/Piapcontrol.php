<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Piapcontrol extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }

   function index() {
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
                $this->_in_you_go();
            }else{
                echo validation_errors();
            }
        }
    }
    
    function _in_you_go() {
        $this->session->set_userdata('is_admin', '1');
        redirect('dashboard/home');
    }
    
    function logout() {
        unset($_SESSION['is_admin']);
        redirect(base_url());
    }
    
    function username_check($str) {
        $this->load->module('site_accounts');
        $this->load->module('site_security');

        $error_msg = "You did not enter a correct username or/and password.";
        $pword = $this->input->post('pword', TRUE);
        
        $result = $this->site_security->_check_admin_login_details($str, $pword);
        
        if ($result==FALSE) {
            $this->form_validation->set_message('username_check', $error_msg);
            return FALSE;
        }else{
            return TRUE;
        }
    }

}
