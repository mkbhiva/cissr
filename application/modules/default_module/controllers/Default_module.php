<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Default_module extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->module('timedate');
        $first_bit = trim($this->uri->segment(1));

        $this->load->module('webpages');
        $query = $this->webpages->get_where_custom('page_url', $first_bit);
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            foreach ($query->result() as $row) {
                $data['page_title'] = $row->page_title;
                $data['page_keywords'] = $row->page_keywords;
                $data['page_description'] = $row->page_description;
                $data['page_content'] = $row->page_content;
                $data['page_url'] = $row->page_url;
                
            }
        } else {
            $this->load->module('site_settings');
            $data['page_url'] = 'not_found_page';
            $data['page_content'] = $this->site_settings->_get_page_not_found_msg();
        }

        $current_time = now();

        $data['header_date'] = $this->timedate->get_nice_date($current_time, 'full');
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
        
    }

}
