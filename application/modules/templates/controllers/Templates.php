<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Templates extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function _draw_breadcrumbs($data) {
        $this->load->view('breadcrumbs_public_bootstrap', $data);
    }

    function test() {
        $data = "";
        $this->admin($data);
    }
    
    function login($data) {
        if (!isset($data['view_module'])) {
            $data['view_module'] = $this->uri->segment(1);
        }
        $this->load->view('login_page', $data);
    }


    function public_bootstrap($data) {
        $this->load->module('site_settings');

        if (!isset($data['view_module'])) {
            $data['view_module'] = $this->uri->segment(1);
        }

        $data['our_company'] = $this->site_settings->_get_company();
        $data['our_telnum'] = $this->site_settings->_get_our_telnum();
        $data['our_email'] = $this->site_settings->_get_our_email();

        $this->load->view('public_bootstrap', $data);
    }

    function jqm($data) {
        if (!isset($data['view_module'])) {
            $data['view_module'] = $this->uri->segment(1);
        }
        $this->load->view('public_jqm', $data);
    }

    function admin($data) {
        if (!isset($data['view_module'])) {
            $data['view_module'] = $this->uri->segment(1);
        }
        $this->load->view('admin', $data);
    }

}
