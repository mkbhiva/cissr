<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aboutus extends MX_Controller {

    function __construct() {
        parent::__construct();
    }


    function privacypolicy(){


        $data['page_title'] = 'Privacy Policy';
        $data['page_keywords'] = 'Privacy Policy of Police Media';
        $data['page_description'] = 'Privacy Policy of Police Media';

        $data['navactive'] = 2;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "privacypolicy";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function ourcenters(){


        $data['page_title'] = 'Privacy Policy';
        $data['page_keywords'] = 'Privacy Policy of Police Media';
        $data['page_description'] = 'Privacy Policy of Police Media';

        $data['navactive'] = 1;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "ourcenters";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function termsconditions(){


        $data['page_title'] = 'Terms & Conditions';
        $data['page_keywords'] = 'about pinaaki, about pinaki';
        $data['page_description'] = 'The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions. ';

        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "termsconditions";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

	
	function index(){


        $data['page_title'] = 'About Us';
        $data['page_keywords'] = 'inner Treatment';
        $data['page_description'] = '';

        $data['navactive'] = 1;
	 	$data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "aboutus";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
	}


    function advait(){


        $data['page_title'] = 'Advait';
        $data['page_keywords'] = 'inner Treatment';
        $data['page_description'] = '';

        $data['navactive'] = 1;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "advait";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }
   

}
