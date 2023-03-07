<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ourevents extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_ourevents');
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }


    function index(){
        redirect('ourevents/events','refresh');
    }


    function _generate_mysql_query_for_upcomming($update_id, $limit, $offset) {
        $currentDate = time();
        $offset_value = " OFFSET ".$offset;
        $mysql_query = "SELECT * FROM ourevents WHERE event_status=1 AND event_dated > '$currentDate' ORDER BY event_dated ASC";

        if($offset==NULL){
            $mysql_query.= " LIMIT ".$limit;
        } else {
            $mysql_query.= " LIMIT ".$limit.$offset_value;
        }

        return $mysql_query;
    }


    function events() {
        $update_id = 1;

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
        $data['page_title'] = "Our Events";
        $data['page_keywords'] = "Innter Treatment Events";
        $data['page_description'] = "Innter Treatment Events";
        $data['update_id'] = $update_id;
        $data['query'] = $this->_custom_query($mysql_query);
        $data['flash'] = $this->session->flashdata('post');
        $data['navactive'] = 2;
        $data['view_module'] = "ourevents";
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
        $currentDate = time();
        $mysql_query = "SELECT * FROM ourevents WHERE event_status=1 AND event_dated < '$currentDate' ORDER BY event_dated DESC";
        if($use_limit==TRUE){
            $limit = $this->get_limit();
            $offset = $this->get_offset();
            $mysql_query.= " limit ".$offset.", ".$limit;
        }
        return $mysql_query;
    }

    function get_limit() {
        $limit = 6;
        return $limit;
    }

    function get_offset() {
        $offset = $this->uri->segment(4);
        if (!is_numeric($offset)) {
            $offset = 0;
        }
        return $offset;
    }


    function _get_posts_by_string($string){
        $query = $this->mdl_ourevents->_get_posts_by_string($string);
        return $query;
    }


    function _get_related_posts($cat_id){
        $query = $this->mdl_ourevents->_get_related_posts($cat_id);
        return $query;
    }


    function _get_hp_random_posts($limit, $offset){
        $query = $this->mdl_ourevents->_get_hp_random_posts($limit, $offset);
        return $query;
    }


    function _get_posts_by_cat_id_n_limit_offset($limit, $offset, $cat_id){
        $query = $this->mdl_ourevents->_get_posts_by_cat_id_n_limit_offset($limit, $offset, $cat_id);
        return $query;
    }


    function _get_hp_latest_buddha_posts($limit, $offset){
        $query = $this->mdl_ourevents->_get_hp_latest_buddha_posts($limit, $offset);
        return $query;
    }



    function _get_hp_latest_posts($limit, $offset){
        $query = $this->mdl_ourevents->_get_hp_latest_posts($limit, $offset);
        return $query;
    }

    function _draw_hot_news_hp() {
        $mysql_query = "select * from posts order by event_dated desc limit 0,4";
        $data['query'] = $this->_custom_query($mysql_query);

        $this->load->view('hot_news_hp', $data);
    }

    function _get_post_id_from_post_url($event_url) {
        $query = $this->get_where_custom('event_url', $event_url);
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
        $breadcrumbs_data['current_page_title'] = $data['name'];
        $breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($update_id);
        $data['breadcrumbs_data'] = $breadcrumbs_data;

        $data['cat_segments'] = $this->site_settings->_get_posts_segments();
        $data['post_segments'] = $this->site_settings->_get_post_segments();

        $data['page_title'] = $data['name'];
        $data['page_keywords'] = $data['event_time'];
        $data['page_description'] = character_limiter($data['eventdesc'],220);

        $data['flash'] = $this->session->flashdata('post');
        $data['navactive'] = 2;
        $data['view_file'] = "viewevent";
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
        $event_image = $data['event_image'];
        $img_path_1 = './assets/images/eventsimg/raw/' . $event_image;
        $img_path_2 = './assets/images/eventsimg/thumb/' . $event_image;
        $img_path_3 = './assets/images/eventsimg/main/' . $event_image;
        $img_path_4 = './assets/images/eventsimg/large/' . $event_image;
        $img_path_5 = './assets/images/eventsimg/medium/' . $event_image;
        $img_path_6 = './assets/images/eventsimg/small/' . $event_image;
        $img_path_7 = './assets/images/eventsimg/xlarge/' . $event_image;

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
        $data['event_image'] = "";
        $this->_update($update_id, $data);
        $flash_msg = "The Event image was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('ourevents/create/' . $update_id);
    }


    function _generate_xlarge($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/eventsimg/raw/' . $file_name;
        $config['new_image'] = './assets/images/eventsimg/xlarge/' . $file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 628;
        $config['height'] = 257;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
        $this->image_lib->clear();
    }


    function _generate_small($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/eventsimg/raw/' . $file_name;
        $config['new_image'] = './assets/images/eventsimg/small/' . $file_name;
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
        $config['source_image'] = './assets/images/eventsimg/raw/' . $file_name;
        $config['new_image'] = './assets/images/eventsimg/medium/' . $file_name;
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
        $config['source_image'] = './assets/images/eventsimg/raw/' . $file_name;
        $config['new_image'] = './assets/images/eventsimg/large/' . $file_name;
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
        $config['source_image'] = './assets/images/eventsimg/raw/' . $file_name;
        $config['new_image'] = './assets/images/eventsimg/main/' . $file_name;
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
        $config['source_image'] = './assets/images/eventsimg/raw/' . $file_name;
        $config['new_image'] = './assets/images/eventsimg/thumb/' . $file_name;
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
            redirect('ourevents/create/' . $update_id);
        }

        $config['upload_path'] = './assets/images/eventsimg/raw/';
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



            $update_data['event_image'] = $file_name;
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
            redirect('ourevents/create/' . $update_id);
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
                    redirect('ourevents/upload_video/' . $update_id);
                }
            } else {
                $flash_msg = validation_errors();
                $value = '<div class="alert alert-danger" role="alert">' . $flash_msg . '</div>';
                $this->session->set_flashdata('post', $value);
                redirect('ourevents/upload_video/' . $update_id);
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
        $this->load->module('timedate');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {

            $this->form_validation->set_rules('name', 'Event Name', 'Trim|required|max_length[260]');
            $this->form_validation->set_rules('event_location', 'Event Location', 'Trim|required|max_length[260]|alpha_numeric_spaces');
            $this->form_validation->set_rules('eventdesc', 'Event Description', 'trim|required');
            $this->form_validation->set_rules('event_time', 'Event Time', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                $data['eventdesc'] = $this->_get_string_replaced($data['eventdesc']);
                $data['event_dated'] = $this->timedate->make_timestamp_from_datepicker_us($data['event_dated']);
                
                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Event details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('ourevents/create/' . $update_id);
                } else {
                    $enc_text = $this->site_security->generate_random_string(6).$update_id;
                    $data['event_url'] = url_title($data['name']).'-'.$enc_text;
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Event was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('ourevents/create/' . $update_id);
                }
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Event";
            $data['event_image'] = "";
        } else {
            $data['headline'] = "Update Event details";
        }

        if($data['event_dated']>0){
            $data['event_dated'] = $this->timedate->get_nice_date($data['event_dated'], 'datepicker_us');
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }


    function _get_string_replaced($eventdesc){

        //$replace_str = array('div1' => '<div xss="removed">', 'span1' => '<span xss=removed>', 'span2' => '<span xss="removed">', 'div_open' => '<div>', 'div_close' => '</div>', 'blockq_open' => '<blockquote>', 'blockq_close' => '</blockquote>', 'span_open' => '<span>', 'span_close' => '</span>');
        //$eventdesc = str_replace($replace_str, '', $eventdesc);
        $eventdesc = str_replace('img src', 'span', $eventdesc);
        $eventdesc = str_replace('&lt;', '<', $eventdesc);
        $eventdesc = str_replace('&gt;', '>', $eventdesc);
        $eventdesc = str_replace('&gt;', '>', $eventdesc);
        $eventdesc = str_replace('width="560"', 'width="100%"', $eventdesc);
        $eventdesc = str_replace('iframe', 'div', $eventdesc);
        return $eventdesc;
    }

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['query'] = $this->get('event_dated');

        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function fetch_data_from_post() {
        $data['name'] = strip_tags($this->input->post('name', TRUE));
        $data['eventdesc'] = $this->input->post('eventdesc', TRUE);
        $data['event_location'] = $this->input->post('event_location', TRUE);
        $data['event_dated'] = $this->input->post('event_dated', TRUE);
        $data['event_time'] = $this->input->post('event_time', TRUE);
        $data['event_status'] = $this->input->post('event_status', TRUE);
        return $data;
    }

    function fetch_data_from_db($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['name'] = $row->name;
            $data['event_url'] = $row->event_url;
            $data['eventdesc'] = $row->eventdesc;
            $data['event_image'] = $row->event_image;
            $data['event_status'] = $row->event_status;
            $data['event_dated'] = $row->event_dated;
            $data['event_time'] = $row->event_time;
            $data['event_location'] = $row->event_location;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function get($order_by) {
        $query = $this->mdl_ourevents->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_ourevents->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_ourevents->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_ourevents->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_ourevents->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_ourevents->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_ourevents->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_ourevents->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_ourevents->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_ourevents->_custom_query($mysql_query);
        return $query;
    }

    function post_check($str) {
        $event_url = url_title($str);
        $mysql_query = "Select * from posts where name='$str' and event_url='$event_url'";
        $update_id = $this->uri->segment(3);
        if (is_numeric($update_id)) {
            $mysql_query.=" and id!=$update_id";
        }

        $query = $this->_custom_query($mysql_query);
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            $this->form_validation->set_message('post_check', 'The Event title that you submitted is not available');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
