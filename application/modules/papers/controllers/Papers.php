<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Papers extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_papers');
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }


    function index(){
        redirect('papers/submitPaper','refresh');
    }


    function view_details($update_id){

        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $count = $this->count_where('id', $update_id);

        if($count < 1){
            redirect('papers/manage','refresh');
        }

        $data = $this->fetch_data_from_db($update_id);

        $data['view_file'] = "view_details";
        $this->load->module('templates');
        $this->templates->admin($data);

    }


    function success(){
        $this->load->library('session');
        $this->load->module('site_settings');
        $data['our_company'] = $this->site_settings->_get_company();
        $data['our_address'] = $this->site_settings->_get_our_address();
        $data['our_telnum'] = $this->site_settings->_get_our_telnum();
        $data['our_email'] = $this->site_settings->_get_our_email();

        $data['flash'] = $this->session->flashdata('post');
        $data['navactive'] = 2;
        $data['view_file'] = "papersuccess";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);

    }



    function submitPaper(){

        $this->load->module('site_settings');
        $this->load->module('site_security');
        
        //$number1 = $this->site_security->generate_random_number(1);
        //$number2 = $this->site_security->generate_random_number(1);

        $this->load->library('session');
        $submit = $this->input->post('submitThePaper', TRUE);
        $data = $this->fetch_data_from_post();
        $data['our_company'] = $this->site_settings->_get_company();
        $data['our_address'] = $this->site_settings->_get_our_address();
        $data['our_telnum'] = $this->site_settings->_get_our_telnum();
        $data['our_email'] = $this->site_settings->_get_our_email();


        if ($submit == "Submit Paper") {
            $this->form_validation->set_rules('authorName', 'Name', 'trim|required');
            $this->form_validation->set_rules('authorEmail', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('authorMobile', 'Mobile', 'trim|required|numeric|min_length[8]');
            $this->form_validation->set_rules('authorCountry', 'Country', 'trim|required');
            $this->form_validation->set_rules('authorInst', 'Institute Name', 'trim|required');
            $this->form_validation->set_rules('authorCourse', 'Course', 'trim|required');
            $this->form_validation->set_rules('authorYear', 'Year', 'trim|required|max_length[20]');
            $this->form_validation->set_rules('coAuthorName', 'Name', 'trim');
            $this->form_validation->set_rules('coAuthorEmail', 'Email', 'trim|valid_email');
            $this->form_validation->set_rules('coAuthorMobile', 'Mobile', 'trim|numeric|min_length[8]');
            $this->form_validation->set_rules('coAuthorCountry', 'Country', 'trim|max_length[20]');
            $this->form_validation->set_rules('coAuthorInst', 'Institute Name', 'trim|max_length[130]');
            $this->form_validation->set_rules('coAuthorCourse', 'Course', 'trim|max_length[60]');
            $this->form_validation->set_rules('coAuthorYear', 'Year', 'trim|max_length[60]');
            $this->form_validation->set_rules('paperTitle', 'Paper Title', 'trim|required');
            $this->form_validation->set_rules('paperMsg', 'Remark', 'trim|max_length[600]');
            if ($this->form_validation->run() == TRUE) {
                
                $config['upload_path'] = './assets/pdf/papers/';
                $config['allowed_types'] = 'pdf|doc|docx';
                $config['max_size'] = 30000;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('userfile')) {
                    $data['error'] = $this->upload->display_errors('<span style="font-size:12px; color:red;">', '</span>');
                    $data['navactive'] = 2;
                    $data['view_file'] = "paperform";
                    $this->load->module('templates');
                    $this->templates->public_bootstrap($data);
                } else {
                    unset($data);
                    $data = $this->fetch_data_from_post();
                    $sdata = array('upload_data' => $this->upload->data());
                    $upload_data = $sdata['upload_data'];
                    $file_name = $upload_data['file_name'];
                    $data['fileName'] = $file_name;

                    $data['paperRef'] = $this->site_security->generate_random_caps_string(8);
                    $this->_insert($data);
                    $value = $data['paperRef'];
                    $this->session->set_flashdata('post', $value);
                    redirect('papers/success');
                }

               
            } else {
                
                $data['navactive'] = 2;
                $data['view_file'] = "paperform";
                $this->load->module('templates');
                $this->templates->public_bootstrap($data);
            }

        } else {

            
            $data['navactive'] = 2;
            $data['view_file'] = "paperform";
            $this->load->module('templates');
            $this->templates->public_bootstrap($data);
        }

    }



    function magList() {

        $this->load->module('site_settings');
        $this->load->module('custom_pagination');
        
        $query = $this->get_where_custom('status', '1');
        $total_posts = $query->num_rows();

        $use_limit = TRUE;
        $mysql_query = $this->_generate_mysql_query($use_limit);
        $pagination_data['template'] = 'public_bootstrap';
        $pagination_data['target_base_url'] = $this->get_target_pagination_base_url();
        $pagination_data['total_rows'] = $total_posts;
        $pagination_data['offset_segment'] = 3;
        $pagination_data['limit'] = $this->get_limit();
        $pagination_data['offset'] = $this->get_offset();


        $data['pagination'] = $this->custom_pagination->_generate_pagination($pagination_data);
        $data['showing_statement'] = $this->custom_pagination-> get_showing_statement($pagination_data);

        $data['query'] = $this->_custom_query($mysql_query);

        $data['flash'] = $this->session->flashdata('post');
        $data['view_module'] = "papers";
        $data['view_file'] = "view_cat";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }
    
    function get_target_pagination_base_url(){
        $first_bit = $this->uri->segment(1);
        $second_bit = $this->uri->segment(2);
        $target_base_url = base_url().$first_bit."/".$second_bit;
        return $target_base_url;
    }

    function _generate_mysql_query($use_limit) {
        $mysql_query = "SELECT * FROM papers WHERE status = 1";

        if($use_limit==TRUE){
            $limit = $this->get_limit();
            $offset = $this->get_offset();
            $mysql_query.= " limit ".$offset.", ".$limit;
        }

        return $mysql_query;
    }

    function get_limit() {
        $limit = 8;
        return $limit;
    }

    function get_offset() {
        $offset = $this->uri->segment(3);
        if (!is_numeric($offset)) {
            $offset = 0;
        }
        return $offset;
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
            redirect('papers/create/' . $update_id);
        }

        $config['upload_path'] = './assets/pdf/papers/';
        $config['allowed_types'] = 'pdf';
        //$config['max_size'] = 30000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));

            $data['headline'] = "Upload Error";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_magazine";
            $this->load->module('templates');
            $this->templates->admin($data);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];

            $update_data['fileName'] = $file_name;
            $this->_update($update_id, $update_data);

            $data['headline'] = "Upload Successfully";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_success";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
    }



    function delete_file($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $fileName = $data['fileName'];
        $img_path_1 = './assets/pdf/papers/' . $fileName;


        if (file_exists($img_path_1)) {
            unlink($img_path_1);
        }


        unset($data);
        $data['fileName'] = "";
        $this->_update($update_id, $data);
        $flash_msg = "The File was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('papers/create/' . $update_id);
    }


    function upload_file($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['headline'] = "Upload Paper";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "upload_magazine";
        $this->load->module('templates');
        $this->templates->admin($data);
    }


    function _get_magazineLink(){

        $query = $this->mdl_papers->_get_magazineLink();
        $num_rows = $query->num_rows();

        if($num_rows>0){

            foreach ($query->result() as $row) 
            {
                $title = $row->title;
            }
        } else {
            $title = '';
        }

        return $title;
    }


    function submit() {
        $this->load->library('session');
        $submit = $this->input->post('submit', TRUE);


        if ($submit == "Submit Paper") {

            $this->form_validation->set_rules('title', 'Title of Papers', 'Trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Papers details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('papers/create/' . $update_id);
                } else {
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Papers Details was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('papers/create/' . $update_id);
                }
            } else {

                $flash_msg = validation_errors();
                $value = '<div class="alert alert-danger" role="alert"><strong>' . $flash_msg . '</strong></div>';
                $this->session->set_flashdata('post', $value);
                redirect('papers/create/' . $update_id);

            }
        }


        $data = $this->fetch_data_from_post();


        $data['headline'] = "Update Papers";

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['query'] = $this->get('id');

        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function fetch_data_from_post() {
        $data['authorName'] = $this->input->post('authorName', TRUE);
        $data['authorEmail'] = $this->input->post('authorEmail', TRUE);
        $data['authorMobile'] = $this->input->post('authorMobile', TRUE);
        $data['authorCountry'] = $this->input->post('authorCountry', TRUE);
        $data['authorInst'] = $this->input->post('authorInst', TRUE);
        $data['authorCourse'] = $this->input->post('authorCourse', TRUE);
        $data['authorYear'] = $this->input->post('authorYear', TRUE);
        $data['coAuthorName'] = $this->input->post('coAuthorName', TRUE);
        $data['coAuthorEmail'] = $this->input->post('coAuthorEmail', TRUE);
        $data['coAuthorMobile'] = $this->input->post('coAuthorMobile', TRUE);
        $data['coAuthorCountry'] = $this->input->post('coAuthorCountry', TRUE);
        $data['coAuthorInst'] = $this->input->post('coAuthorInst', TRUE);
        $data['coAuthorCourse'] = $this->input->post('coAuthorCourse', TRUE);
        $data['coAuthorYear'] = $this->input->post('coAuthorYear', TRUE);
        $data['paperTitle'] = $this->input->post('paperTitle', TRUE);
        $data['paperMsg'] = $this->input->post('paperMsg', TRUE);
        $data['paperSubDate'] = time();
        return $data;
    }

    function fetch_data_from_db($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {

            $data['paperRef'] = $row->paperRef;
            $data['paperSubDate'] = $row->paperSubDate;
            $data['authorName'] = $row->authorName;
            $data['authorEmail'] = $row->authorEmail;
            $data['authorMobile'] = $row->authorMobile;
            $data['authorCountry'] = $row->authorCountry;
            $data['authorInst'] = $row->authorInst;
            $data['authorCourse'] = $row->authorCourse;
            $data['authorYear'] = $row->authorYear;
            $data['coAuthorName'] = $row->coAuthorName;
            $data['coAuthorEmail'] = $row->coAuthorEmail;
            $data['coAuthorMobile'] = $row->coAuthorMobile;
            $data['coAuthorCountry'] = $row->coAuthorCountry;
            $data['coAuthorInst'] = $row->coAuthorInst;
            $data['coAuthorCourse'] = $row->coAuthorCourse;
            $data['coAuthorYear'] = $row->coAuthorYear;
            $data['paperTitle'] = $row->paperTitle;
            $data['paperMsg'] = $row->paperMsg;
            $data['fileName'] = $row->fileName;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function get($order_by) {
        $query = $this->mdl_papers->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_papers->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_papers->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_papers->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_papers->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_papers->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_papers->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_papers->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_papers->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_papers->_custom_query($mysql_query);
        return $query;
    }

    

}
