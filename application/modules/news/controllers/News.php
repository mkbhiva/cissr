<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends MX_Controller {

    function __construct() {
        parent::__construct();
    }
    
    function article(){
        $post_url = $this->uri->segment(3);
        $this->load->module('posts');
        $post_id = $this->posts->_get_post_id_from_post_url($post_url);
        $this->posts->view($post_id);
    }
    
    function articles(){
        $cat_url = $this->uri->segment(3);
        $this->load->module('post_categories');
        $cat_id = $this->post_categories->_get_cat_id_from_cat_url($cat_url);
        $this->post_categories->view($cat_id);
    }

}
