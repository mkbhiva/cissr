<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Forauthors extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_forauthors');
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }

    function index(){
        redirect('forauthors/editorial','refresh');
    }


    function sguidelines(){
        $data['flash'] = $this->session->flashdata('post');
        $data['navactive'] = 2;
        $data['view_file'] = "sguidelines";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function submitpaper(){
        $data['flash'] = $this->session->flashdata('post');
        $data['navactive'] = 9;
        $data['view_file'] = "submitpaper";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function checkpaper(){
        $data['flash'] = $this->session->flashdata('post');
        $data['navactive'] = 2;
        $data['view_file'] = "checkpaper";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }



    function get($order_by) {
        $query = $this->mdl_forauthors->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_forauthors->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_forauthors->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_forauthors->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_forauthors->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_forauthors->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_forauthors->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_forauthors->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_forauthors->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_forauthors->_custom_query($mysql_query);
        return $query;
    }

    

}
