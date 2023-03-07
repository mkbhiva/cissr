<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post_categories extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_post_categories');
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }


    function _get_hp_cat_post_qnty(){
        $query = $this->mdl_post_categories->_get_hp_cat_post_qnty();
        return $query;
    }

    function _get_full_cat_url($update_id) {
        $this->load->module('site_settings');
        $posts_segments = $this->site_settings->_get_posts_segments();
        $data = $this->fetch_data_from_db($update_id);
        $cat_url = $data['cat_url'];
        $full_cat_url = base_url() . $posts_segments . $cat_url;
        return $full_cat_url;
    }

    function view($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        if($update_id == 0){
            $update_id = 6;
        }

        $this->load->module('site_settings');
        $this->load->module('custom_pagination');
        $data = $this->fetch_data_from_db($update_id);
        

        $use_limit = FALSE;
        $mysql_query = $this->_generate_mysql_query($update_id,$use_limit);
        $query = $this->_custom_query($mysql_query);
        $total_posts = $query->num_rows();
        
        $use_limit = TRUE;
        $mysql_query = $this->_generate_mysql_query($update_id,$use_limit);
        $pagination_data['template'] = 'public_bootstrap';
        $pagination_data['target_base_url'] = $this->get_target_pagination_base_url();
        $pagination_data['total_rows'] = $total_posts;
        $pagination_data['offset_segment'] = 4;
        $pagination_data['limit'] = $this->get_limit();
        $pagination_data['offset'] = $this->get_offset();
        
        $data['pagination'] = $this->custom_pagination->_generate_pagination($pagination_data);
        $data['showing_statement'] = $this->custom_pagination-> get_showing_statement($pagination_data);
        $data['post_segments'] = $this->site_settings->_get_post_segments();
        $data['cat_segments'] = $this->site_settings->_get_posts_segments();
        $data['page_title'] = $data['cat_title'];
        $data['page_keywords'] = $data['cat_title'];
        $data['page_description'] = character_limiter($data['cat_title'],220);
        $data['update_id'] = $update_id;
        $data['query'] = $this->_custom_query($mysql_query);
        $data['flash'] = $this->session->flashdata('post');
        $data['navactive'] = 5;
        $data['view_module'] = "post_categories";
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }
    
    function get_target_pagination_base_url(){
        $first_bit = $this->uri->segment(1);
        $second_bit = $this->uri->segment(2);
        $third_bit = $this->uri->segment(3);
        $target_base_url = base_url().$first_bit."/".$second_bit."/".$third_bit;
        return $target_base_url;
    }

    function _generate_mysql_query($update_id, $use_limit) {
        $mysql_query = "SELECT posts.* FROM post_cat_assign LEFT JOIN posts on post_cat_assign.post_id = posts.id WHERE post_cat_assign.cat_id=$update_id and posts.post_status=1 ORDER BY posts.post_date DESC";
        if($use_limit==TRUE){
            $limit = $this->get_limit();
            $offset = $this->get_offset();
            $mysql_query.= " limit ".$offset.", ".$limit;
        }
        return $mysql_query;
    }

    function get_limit() {
        $limit = 9;
        return $limit;
    }

    function get_offset() {
        $offset = $this->uri->segment(4);
        if (!is_numeric($offset)) {
            $offset = 0;
        }
        return $offset;
    }

    function _get_cat_id_from_cat_url($cat_url) {
        $query = $this->get_where_custom('cat_url', $cat_url);
        foreach ($query->result() as $row) {
            $cat_id = $row->id;
        }

        if (!isset($cat_id)) {
            $cat_id = 0;
        }

        return $cat_id;
    }

    function _draw_top_nav() {
        $mysql_query = "select * from post_categories where parent_cat_id=0 order by priority";
        $query = $this->_custom_query($mysql_query);
        foreach ($query->result() as $row) {
            $parent_categories[$row->id] = $row->cat_title;
        }

        $this->load->module('site_settings');
        $post_segments = $this->site_settings->_get_posts_segments();
        $data['target_url_start'] = base_url() . $post_segments;
        $data['parent_categories'] = $parent_categories;
        $this->load->view('top_nav', $data);
    }

    function _get_parent_cat_title($update_id) {
        $data = $this->fetch_data_from_db($update_id);
        $parent_cat_id = $data['parent_cat_id'];
        $parent_cat_title = $this->_get_cat_title($parent_cat_id);
        return $parent_cat_title;
    }

    function _get_all_sub_cats_for_dropdown() {
        $mysql_query = "select * from post_categories where parent_cat_id!=0 order by parent_cat_id, cat_title";
        $query = $this->_custom_query($mysql_query);

        foreach ($query->result() as $row) {
            $parent_cat_id = $this->_get_cat_title($row->parent_cat_id);
            $sub_categories[$row->id] = $parent_cat_id . " > " . $row->cat_title;
        }
        if (!isset($sub_categories)) {
            $sub_categories = "";
        }
        return $sub_categories;
    }

    function sort() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $number = $this->input->post('number', TRUE);
        for ($i = 1; $i <= $number; $i++) {
            $update_id = $_POST['order' . $i];
            $data['priority'] = $i;
            $this->_update($update_id, $data);
        }
    }

    function _draw_sortable_list($parent_cat_id) {
        $mysql_query = "select * from post_categories where parent_cat_id=$parent_cat_id order by priority";
        $data['query'] = $this->_custom_query($mysql_query);
        $this->load->view('sortable_list', $data);
    }

    function _count_sub_cats($update_id) {
        $query = $this->get_where_custom('parent_cat_id', $update_id);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function _get_cat_title($update_id) {
        $data = $this->fetch_data_from_db($update_id);
        $cat_title = $data['cat_title'];
        return $cat_title;
    }

    function _get_dropdown_options($update_id) {
        if (!is_numeric($update_id)) {
            $update_id = 0;
        }

        $options[''] = 'Please select ..';
        $mysql_query = "select * from post_categories where parent_cat_id=0 and id!=$update_id";
        $query = $this->_custom_query($mysql_query);

        foreach ($query->result() as $row) {
            $options[$row->id] = $row->cat_title;
        }
        return $options;
    }

    function create() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {

            $this->form_validation->set_rules('cat_title', 'Category Title', 'Trim|required|max_length[60]');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();
                $data['cat_url'] = url_title($data['cat_title']);

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Category details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('post_categories/create/' . $update_id);
                } else {
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Category was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('post_categories/create/' . $update_id);
                }
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Category";
        } else {
            $data['headline'] = "Update Category";
        }

        $data['options'] = $this->_get_dropdown_options($update_id);
        $data['num_dropdown_options'] = count($data['options']);
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function fetch_data_from_post() {
        $data['cat_title'] = $this->input->post('cat_title', TRUE);
        $data['parent_cat_id'] = $this->input->post('parent_cat_id', TRUE);

        return $data;
    }

    function fetch_data_from_db($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['cat_title'] = $row->cat_title;
            $data['cat_url'] = $row->cat_url;
            $data['parent_cat_id'] = $row->parent_cat_id;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $parent_cat_id = $this->uri->segment(3);
        if (!is_numeric($parent_cat_id)) {
            $parent_cat_id = 0;
        }
        $data['query'] = $this->get_where_custom('parent_cat_id', $parent_cat_id);

        $data['sort_this'] = TRUE;
        $data['parent_cat_id'] = $parent_cat_id;
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function get($order_by) {
        $query = $this->mdl_post_categories->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_post_categories->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_post_categories->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_post_categories->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_post_categories->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_post_categories->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_post_categories->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_post_categories->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_post_categories->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_post_categories->_custom_query($mysql_query);
        return $query;
    }

}
