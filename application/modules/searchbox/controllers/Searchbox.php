<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Searchbox extends MX_Controller {

    function __construct() {
        parent::__construct();
    }


    function index(){

        $this->load->module('posts');
        $this->load->module('site_settings');
        $this->load->module('custom_pagination');

        $search_string = strip_tags($this->input->get('searchinput', TRUE)); 
        $res = preg_replace("/[\/\&%#\$]/", " ", $search_string);
        $res = preg_replace("/[\"\']/", " ", $search_string);
        $stringxss = $this->security->xss_clean($res);

        $query = $this->posts->_get_posts_by_string($stringxss);
        $total_posts = $query->num_rows();

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
        $data['page_title'] = "";
        $data['page_keywords'] = "";
        $data['page_description'] = character_limiter("",220);
        $data['query'] = $query;
        $data['search_string'] = $search_string;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_module'] = "searchbox";
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function get_limit() {
        $limit = 8;
        return $limit;
    }

    function get_offset() {
        $offset = $this->uri->segment(4);
        if (!is_numeric($offset)) {
            $offset = 0;
        }
        return $offset;
    }

    function get_target_pagination_base_url(){
        $first_bit = $this->uri->segment(1);
        $second_bit = $this->uri->segment(2);
        $third_bit = $this->uri->segment(3);
        $target_base_url = base_url().$first_bit."/".$second_bit."/".$third_bit;
        return $target_base_url;
    }

}
