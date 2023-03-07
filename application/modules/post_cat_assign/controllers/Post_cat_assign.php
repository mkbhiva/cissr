<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post_cat_assign extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_post_cat_assign');
    }



    function delete($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $post_id = $row->post_id;
        }
        $this->_delete($update_id);

        $flash_msg = "The Option was successfully deleted.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        
        redirect('post_cat_assign/update/'.$post_id);
    }


    function auto_assign_cat_id($post_id){

        $data['post_id'] = $post_id;
        $data['cat_id'] = 2;

        $query = $this->get_where_custom('post_id', $post_id);
        $num_rows = $query->num_rows();

        if($num_rows>0){
            foreach ($query->result() as $row) {
                $id = $row->id;
            }
            $this->_update($id, $data);
        } else {
            $this->_insert($data);
        } 
        
    }

    function submit($post_id) {
        if (!is_numeric($post_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);
        $cat_id = $this->input->post('cat_id', TRUE);

        if ($submit == 'Submit') {
            if ($cat_id != "") {
                $data['post_id'] = $post_id;
                $data['cat_id'] = $cat_id;
                $this->_insert($data);

                $this->load->module('post_categories');
                $cat_title = $this->post_categories->_get_cat_title($cat_id);
                $flash_msg = "The post was successfully assigned to the " . $cat_title . " category.";
                $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                $this->session->set_flashdata('post', $value);
            }
        }
        redirect('post_cat_assign/update/' . $post_id);
    }

    function update($post_id) {
        if (!is_numeric($post_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $this->load->module('post_categories');
        $sub_categories = $this->post_categories->_get_all_sub_cats_for_dropdown();

        $query = $this->get_where_custom('post_id', $post_id);
        $data['query'] = $query;
        $data['num_rows'] = $query->num_rows();
        foreach ($query->result() as $row) {
            $cat_title = $this->post_categories->_get_cat_title($row->cat_id);
            $parent_cat_title = $this->post_categories->_get_parent_cat_title($row->cat_id);
            $assigned_categories[$row->cat_id] = $parent_cat_title . " > " . $cat_title;
        }

        if (!isset($assigned_categories)) {
            $assigned_categories = "";
        }else{
            $sub_categories = array_diff($sub_categories, $assigned_categories);
        }

        $data['options'] = $sub_categories;
        $data['cat_id'] = $this->input->post('cat_id', TRUE);
        $data['headline'] = "Category Assign";
        $data['post_id'] = $post_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "update";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function get($order_by) {
        $query = $this->mdl_post_cat_assign->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_post_cat_assign->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_post_cat_assign->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_post_cat_assign->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_post_cat_assign->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_post_cat_assign->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_post_cat_assign->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_post_cat_assign->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_post_cat_assign->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_post_cat_assign->_custom_query($mysql_query);
        return $query;
    }

}
