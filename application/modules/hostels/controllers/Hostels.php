<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hostels extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
    }


    function boys()
    {
        $this->load->module('hostelstat');

        $update_id = 1;
        $data['hstatic'] = $this->hostelstat->fetch_data_from_db($update_id);

        $mysql_query = "select * from hostelstudents where hosType = 1 AND hostStudStatus = 1 order by hosRoom asc";
        $data['query'] = $this->hostelstat->_custom_query($mysql_query);

        $data['navactive'] = 8;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "boyview";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function girls()
    {

        $this->load->module('hostelstat');

        $update_id = 2;
        $data['hstatic'] = $this->hostelstat->fetch_data_from_db($update_id);

        $mysql_query = "select * from hostelstudents where hosType = 2 AND hostStudStatus = 1 order by hosRoom asc";
        $data['query'] = $this->hostelstat->_custom_query($mysql_query);

        $data['navactive'] = 8;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "girlview";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }
}
