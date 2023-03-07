<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Donationlist extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function hosteldonation()
    {


        $data['page_title'] = 'Privacy Policy';
        $data['page_keywords'] = 'Privacy Policy of Police Media';
        $data['page_description'] = 'Privacy Policy of Police Media';

        $data['navactive'] = 1;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "hosteldonation";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function firstpratibha()
    {


        $data['page_title'] = 'Privacy Policy';
        $data['page_keywords'] = 'Privacy Policy of Police Media';
        $data['page_description'] = 'Privacy Policy of Police Media';

        $data['navactive'] = 1;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "firstpratibha";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function secondpratibha()
    {


        $data['page_title'] = 'Privacy Policy';
        $data['page_keywords'] = 'Privacy Policy of Police Media';
        $data['page_description'] = 'Privacy Policy of Police Media';

        $data['navactive'] = 1;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "secondpratibha";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function fourthpratibha()
    {


        $data['page_title'] = 'Privacy Policy';
        $data['page_keywords'] = 'Privacy Policy of Police Media';
        $data['page_description'] = 'Privacy Policy of Police Media';

        $data['navactive'] = 1;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "fourthpratibha";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function groupmarriage()
    {


        $data['page_title'] = 'Privacy Policy';
        $data['page_keywords'] = 'Privacy Policy of Police Media';
        $data['page_description'] = 'Privacy Policy of Police Media';

        $data['navactive'] = 1;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "groupmarriage";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function firstsouvenir()
    {


        $data['page_title'] = 'Privacy Policy';
        $data['page_keywords'] = 'Privacy Policy of Police Media';
        $data['page_description'] = 'Privacy Policy of Police Media';

        $data['navactive'] = 1;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "firstsouvenir";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function bigdonation()
    {


        $data['page_title'] = 'Privacy Policy';
        $data['page_keywords'] = 'Privacy Policy of Police Media';
        $data['page_description'] = 'Privacy Policy of Police Media';

        $data['navactive'] = 1;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "bigdonation";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }



    function index()
    {
        $this->hosteldonation();
    }
}
