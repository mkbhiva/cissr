<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Posts extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_posts');
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }


    function _get_posts_by_string($string){
        $query = $this->mdl_posts->_get_posts_by_string($string);
        return $query;
    }


    function _get_related_posts($cat_id){
        $query = $this->mdl_posts->_get_related_posts($cat_id);
        return $query;
    }


    function _get_hp_random_posts($limit, $offset){
        $query = $this->mdl_posts->_get_hp_random_posts($limit, $offset);
        return $query;
    }


    function _get_posts_by_cat_id_n_limit_offset($limit, $offset, $cat_id){
        $query = $this->mdl_posts->_get_posts_by_cat_id_n_limit_offset($limit, $offset, $cat_id);
        return $query;
    }


    function _get_hp_latest_buddha_posts($limit, $offset){
        $query = $this->mdl_posts->_get_hp_latest_buddha_posts($limit, $offset);
        return $query;
    }



    function _get_hp_latest_posts($limit, $offset){
        $query = $this->mdl_posts->_get_hp_latest_posts($limit, $offset);
        return $query;
    }

    function _draw_hot_news_hp() {
        $mysql_query = "select * from posts order by post_date desc limit 0,4";
        $data['query'] = $this->_custom_query($mysql_query);

        $this->load->view('hot_news_hp', $data);
    }

    function _get_post_id_from_post_url($post_url) {
        $query = $this->get_where_custom('post_url', $post_url);
        foreach ($query->result() as $row) {
            $post_id = $row->id;
        }

        if (!isset($post_id)) {
            $post_id = 0;
        }

        return $post_id;
    }

    function view($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->module('site_settings');
        $this->load->module('post_cat_assign');
        $this->load->module('post_categories');

        $cat_assign_query = $this->post_cat_assign->get_where_custom('post_id', $update_id);
        foreach ($cat_assign_query->result() as $row) {
            $cat_id = $row->cat_id;
        }

        $data1 = $this->post_categories->fetch_data_from_db($cat_id);

        $data2 = $this->fetch_data_from_db($update_id);
        $data = array_merge($data1, $data2);

        $data['update_id'] = $update_id;

        $breadcrumbs_data['template'] = 'public_bootstrap';
        $breadcrumbs_data['current_page_title'] = $data['post_title'];
        $breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($update_id);
        $data['breadcrumbs_data'] = $breadcrumbs_data;

        $data['cat_segments'] = $this->site_settings->_get_posts_segments();
        $data['post_segments'] = $this->site_settings->_get_post_segments();

        $data['page_title'] = $data['post_title'];
        $data['page_keywords'] = $data['post_keywords'];
        $data['page_description'] = character_limiter($data['post_desc'],220);

        $data['flash'] = $this->session->flashdata('post');
        $data['navactive'] = 5;
        $data['view_module'] = "posts";
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function _generate_breadcrumbs_array($update_id) {
        $homepage_url = base_url();
        $breadcrumbs_array[$homepage_url] = 'Home';
        $sub_cat_id = $this->_get_sub_cat_id($update_id);
        $this->load->module('post_categories');
        $sub_cat_title = $this->post_categories->_get_cat_title($sub_cat_id);
        $sub_cat_url = $this->post_categories->_get_full_cat_url($sub_cat_id);
        $breadcrumbs_array[$sub_cat_url] = $sub_cat_title;
        return $breadcrumbs_array;
    }

    function _get_sub_cat_id($update_id) {
        if (!isset($_SERVER['HTTP_REFERER'])) {
            $refer_url = '';
        } else {
            $refer_url = $_SERVER['HTTP_REFERER'];
        }

        $this->load->module('site_settings');
        $this->load->module('post_cat_assign');
        $this->load->module('post_categories');
        $posts_segments = $this->site_settings->_get_posts_segments();
        $ditch_this = base_url() . $posts_segments;
        $cat_url = str_replace($ditch_this, '', $refer_url);
        $sub_cat_id = $this->post_categories->_get_cat_id_from_cat_url($cat_url);
        if ($sub_cat_id > 0) {
            return $sub_cat_id;
        } else {
            //$sub_cat_id = $this->_get_best_sub_cat_id($update_id);
            $query = $this->post_cat_assign->get_where_custom('post_id', $update_id);
            foreach ($query->result() as $row) {
                $sub_cat_id = $row->cat_id;
            }
            return $sub_cat_id;
        }
    }

    function _get_best_sub_cat_id($update_id) {
        $query = $this->post_cat_assign->get_where_custom('post_id', $update_id);
        foreach ($query->result() as $row) {
            $postential_sub_cats[] = $row->cat_id;
        }
        
        $num_sub_cats_for_post = count($postential_sub_cats);
        if($num_sub_cats_for_post==1){
            $sub_cat_id = $postential_sub_cats['0'];
            return $sub_cat_id;
        }else{
            foreach($postential_sub_cats as $key => $value){
                $sub_cat_id = $value;
                $num_posts_in_sub_cat = $this->post_cat_assign->count_where('cat_id', $sub_cat_id);
                $num_posts_count[$sub_cat_id] = $num_posts_in_sub_cat;
            }
            $sub_cat_id = $this->get_best_array_key($num_posts_count);
            return $sub_cat_id;
        }
        
    }
    
    function get_best_array_key($target_array){
        foreach ($target_array as $key => $value) {
            if(!isset($key_with_highest_value)){
                $key_with_highest_value = $key;
            }elseif ($value > $target_array[$key_with_highest_value]) {
                $key_with_highest_value = $key;
            }
        }
        return $key_with_highest_value;
    }

    function delete_image($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $post_img = $data['post_img'];
        $img_path_1 = './assets/images/blog/raw/' . $post_img;
        $img_path_2 = './assets/images/blog/thumb/' . $post_img;
        $img_path_3 = './assets/images/blog/main/' . $post_img;
        $img_path_4 = './assets/images/blog/large/' . $post_img;
        $img_path_5 = './assets/images/blog/medium/' . $post_img;
        $img_path_6 = './assets/images/blog/small/' . $post_img;
        $img_path_7 = './assets/images/blog/xlarge/' . $post_img;

        if (file_exists($img_path_1)) {
            unlink($img_path_1);
        }

        if (file_exists($img_path_2)) {
            unlink($img_path_2);
        }

        if (file_exists($img_path_3)) {
            unlink($img_path_3);
        }

        if (file_exists($img_path_4)) {
            unlink($img_path_4);
        }

        if (file_exists($img_path_5)) {
            unlink($img_path_5);
        }

        if (file_exists($img_path_6)) {
            unlink($img_path_6);
        }

        if (file_exists($img_path_7)) {
            unlink($img_path_7);
        }


        unset($data);
        $data['post_img'] = "";
        $this->_update($update_id, $data);
        $flash_msg = "The Blog image was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('posts/create/' . $update_id);
    }


    function _generate_xlarge($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/blog/raw/' . $file_name;
        $config['new_image'] = './assets/images/blog/xlarge/' . $file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 458;
        $config['height'] = 305;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
        $this->image_lib->clear();
    }


    function _generate_small($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/blog/raw/' . $file_name;
        $config['new_image'] = './assets/images/blog/small/' . $file_name;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 223;
        $config['height'] = 148;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
        $this->image_lib->clear();
        $this->_generate_xlarge($file_name);
    }


    function _generate_medium($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/blog/raw/' . $file_name;
        $config['new_image'] = './assets/images/blog/medium/' . $file_name;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 287;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
        $this->image_lib->clear();
        $this->_generate_small($file_name);
    }

    function _generate_large($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/blog/raw/' . $file_name;
        $config['new_image'] = './assets/images/blog/large/' . $file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 350;
        $config['height'] = 211;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
        $this->image_lib->clear();
        $this->_generate_medium($file_name);
    }

    function _generate_main($file_name) {

        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/blog/raw/' . $file_name;
        $config['new_image'] = './assets/images/blog/main/' . $file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 1094;
        $config['height'] = 446;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
        $this->image_lib->clear();
        $this->_generate_large($file_name);
    }

    function _generate_thumbnail($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/blog/raw/' . $file_name;
        $config['new_image'] = './assets/images/blog/thumb/' . $file_name;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 100;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
        $this->image_lib->clear();
        $this->_generate_main($file_name);
        
        
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
            redirect('posts/create/' . $update_id);
        }

        $config['upload_path'] = './assets/images/blog/raw/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));

            $data['headline'] = "Upload Error";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->admin($data);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];
            $this->_generate_thumbnail($file_name);
            //$this->_generate_main($file_name);



            $update_data['post_img'] = $file_name;
            $this->_update($update_id, $update_data);

            $data['headline'] = "Upload Successfully";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_success";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
    }

    function upload_video($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);

        if($submit == "Cancel"){
            redirect('posts/create/' . $update_id);
        }

        if ($submit == "Submit") {

            $this->form_validation->set_rules('post_video', 'Video', 'Trim|required|max_length[260]|min_length[5]');

            if ($this->form_validation->run() == TRUE) {
                $data['post_video'] = $this->input->post('post_video', TRUE);

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Video were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('posts/upload_video/' . $update_id);
                }
            } else {
                $flash_msg = validation_errors();
                $value = '<div class="alert alert-danger" role="alert">' . $flash_msg . '</div>';
                $this->session->set_flashdata('post', $value);
                redirect('posts/upload_video/' . $update_id);
            }
        }

         if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add Video Code";
        } else {
            $data['headline'] = "Update Video Code";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "upload_video";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function upload_image($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['headline'] = "Upload Image";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "upload_image";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function create() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('authors');
        $this->load->module('site_security');
        $this->load->module('post_cat_assign');
        $this->site_security->_make_sure_is_admin();
        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {

            $this->form_validation->set_rules('post_title', 'Blog Title', 'Trim|required|max_length[260]');
            $this->form_validation->set_rules('post_title_en', 'English Title', 'Trim|required|max_length[260]|alpha_numeric_spaces');
            $this->form_validation->set_rules('post_desc', 'Blog Description', 'trim|required');
            $this->form_validation->set_rules('post_desc_hn', 'Blog Description', 'trim');
            $this->form_validation->set_rules('post_keywords', 'Blog Keywords', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                $data['post_desc'] = $this->_get_string_replaced($data['post_desc']);
                $data['post_desc_hn'] = $this->_get_string_replaced($data['post_desc_hn']);
                

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $this->post_cat_assign->auto_assign_cat_id($update_id);
                    $flash_msg = "The Blog details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('posts/create/' . $update_id);
                } else {
                    $enc_text = $this->site_security->generate_random_string(6).$update_id;
                    $data['post_url'] = url_title($data['post_title_en']).'-'.$enc_text;
                    $data['post_date'] = time();
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $this->post_cat_assign->auto_assign_cat_id($update_id);
                    $flash_msg = "The Blog was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('posts/create/' . $update_id);
                }
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Post";
            $data['post_img'] = "";
        } else {
            $data['headline'] = "Update Blog details";
        }

        $data['options'] = $this->authors->_get_dropdown_options($update_id);
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }


    function _get_string_replaced($post_desc){

        //$replace_str = array('div1' => '<div xss="removed">', 'span1' => '<span xss=removed>', 'span2' => '<span xss="removed">', 'div_open' => '<div>', 'div_close' => '</div>', 'blockq_open' => '<blockquote>', 'blockq_close' => '</blockquote>', 'span_open' => '<span>', 'span_close' => '</span>');
        //$post_desc = str_replace($replace_str, '', $post_desc);
        $post_desc = str_replace('img src', 'span', $post_desc);
        $post_desc = str_replace('&lt;', '<', $post_desc);
        $post_desc = str_replace('&gt;', '>', $post_desc);
        $post_desc = str_replace('&gt;', '>', $post_desc);
        $post_desc = str_replace('width="560"', 'width="100%"', $post_desc);
        $post_desc = str_replace('iframe', 'div', $post_desc);
        return $post_desc;
    }

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['query'] = $this->get('post_date');

        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function fetch_data_from_post() {
        $data['post_title'] = strip_tags($this->input->post('post_title', TRUE));
        $data['post_title_en'] = strip_tags($this->input->post('post_title_en', TRUE));
        $data['post_desc'] = $this->input->post('post_desc', TRUE);
        $data['post_desc_hn'] = $this->input->post('post_desc_hn', TRUE);
        $data['post_keywords'] = strip_tags($this->input->post('post_keywords', TRUE));
        $data['post_author'] = $this->input->post('post_author', TRUE);
        $data['post_status'] = $this->input->post('post_status', TRUE);
        return $data;
    }

    function fetch_data_from_db($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['post_title'] = $row->post_title;
            $data['post_url'] = $row->post_url;
            $data['post_title_en'] = $row->post_title_en;
            $data['post_desc'] = $row->post_desc;
            $data['post_desc_hn'] = $row->post_desc_hn;
            $data['post_keywords'] = $row->post_keywords;
            $data['post_img'] = $row->post_img;
            $data['post_video'] = $row->post_video;
            $data['post_status'] = $row->post_status;
            $data['post_author'] = $row->post_author;
            $data['post_date'] = $row->post_date;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function get($order_by) {
        $query = $this->mdl_posts->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_posts->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_posts->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_posts->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_posts->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_posts->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_posts->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_posts->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_posts->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_posts->_custom_query($mysql_query);
        return $query;
    }

    function post_check($str) {
        $post_url = url_title($str);
        $mysql_query = "Select * from posts where post_title='$str' and post_url='$post_url'";
        $update_id = $this->uri->segment(3);
        if (is_numeric($update_id)) {
            $mysql_query.=" and id!=$update_id";
        }

        $query = $this->_custom_query($mysql_query);
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            $this->form_validation->set_message('post_check', 'The Blog title that you submitted is not available');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
