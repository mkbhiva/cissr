<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Researches extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_researches');
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }


    
    function updateVol($update_id){

        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        $this->load->module('rvolumes');

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {
            $this->form_validation->set_rules('research_volume', 'Volume', 'Trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data['research_volume'] = $this->input->post('research_volume', TRUE);
                $this->_update($update_id, $data);
                $flash_msg = "The Volume were successfully updated.";
                $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                $this->session->set_flashdata('post', $value);
                redirect('researches/updateVol/' . $update_id);

            } else {
                $flash_msg = validation_errors();
                $value = '<div class="alert alert-danger" role="alert"><strong>' . $flash_msg . '</strong></div>';
                $this->session->set_flashdata('post', $value);
                redirect('researches/updateVol/' . $update_id);
            }

        }

        $sdata = $this->fetch_data_from_db($update_id);
        $data['research_volume'] = $sdata['research_volume'];
        $data['options'] = $this->rvolumes->get_volume_options();
        $data['headline'] = "Update Volume";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "updateVol";
        $this->load->module('templates');
        $this->templates->admin($data);


    }


    function delete_research($update_id){
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

         if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $data = $this->fetch_data_from_db($update_id);
        $fileName = $data['research_file'];

        if(!$fileName==''){
            $img_path_1 = './assets/pdf/researches/' . $fileName;

            if (file_exists($img_path_1)) {
                unlink($img_path_1);
            }
        }

        $this->_delete($update_id);
        $flash_msg = "The Research was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('researches/manage');   
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
            redirect('researches/create/' . $update_id);
        }

        $config['upload_path'] = './assets/pdf/researches/';
        $config['allowed_types'] = 'pdf';
        //$config['max_size'] = 30000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));

            $data['headline'] = "Upload Error";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_file";
            $this->load->module('templates');
            $this->templates->admin($data);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];

            $update_data['research_file'] = $file_name;
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
        $fileName = $data['research_file'];
        $img_path_1 = './assets/pdf/researches/' . $fileName;


        if (file_exists($img_path_1)) {
            unlink($img_path_1);
        }


        unset($data);
        $data['research_file'] = "";
        $this->_update($update_id, $data);
        $flash_msg = "The File was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('researches/create/' . $update_id);
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
        $data['view_file'] = "upload_file";
        $this->load->module('templates');
        $this->templates->admin($data);
    }


    function volumes($volUrl){
        $this->load->module('rvolumes');
        $query_vol = $this->rvolumes->get_where_custom('volUrl', $volUrl);
        $num_rows = $query_vol->num_rows();

        if($num_rows<1){
            echo "Something went wrong!!!!!";
            die();
        }

        foreach ($query_vol->result() as $row) {
            $vol_id = $row->id;
            $vol_title = $row->volumeNo.' '.$row->issueNo;
        }


        $data['query'] = $this->mdl_researches->_get_researches_list($vol_id, $limit=NULL, $offset=NULL);
    
        $data['flash'] = $this->session->flashdata('post');
        $data['navactive'] = 6;
        $data['vol_title'] = $vol_title;
        $data['view_module'] = "researches";
        $data['view_file'] = "volumes";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function listing() {
        $this->load->module('rvolumes');
        $query_vol = $this->rvolumes->get_latest_on_volumex1();

        foreach ($query_vol->result() as $row) {
            $vol_id = $row->id;
            $vol_title = $row->volumeNo.' '.$row->issueNo;
        }


        $data['query'] = $this->mdl_researches->_get_researches_list($vol_id, $limit=NULL, $offset=NULL);
    
        $data['flash'] = $this->session->flashdata('post');
        $data['navactive'] = 6;
        $data['vol_title'] = $vol_title;
        $data['view_module'] = "researches";
        $data['view_file'] = "category";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function index(){
        redirect('researches/listing','refresh');
    }



    function _get_researches_by_string($string){
        $query = $this->mdl_researches->_get_researches_by_string($string);
        return $query;
    }


    function _get_related_researches($cat_id){
        $query = $this->mdl_researches->_get_related_researches($cat_id);
        return $query;
    }


    function _get_research_id_from_research_url($research_url) {
        $query = $this->get_where_custom('research_url', $research_url);
        foreach ($query->result() as $row) {
            $research_id = $row->id;
        }

        if (!isset($research_id)) {
            $research_id = 0;
        }

        return $research_id;
    }

    function view() {

        $this->load->module('site_settings');
        $research_url = $this->uri->segment(3);
        $research_id = $this->_get_research_id_from_research_url($research_url);

        if($research_id>0){
            $update_id = $research_id;
        } else {
            redirect('site_security/not_allowed');
        }

        $data = $this->fetch_data_from_db($update_id);

        $data['update_id'] = $update_id;

        $data['page_title'] = $data['research_title'];
        $data['page_keywords'] = $data['research_keywords'];
        $data['page_description'] = character_limiter($data['research_desc'],220);

        $data['flash'] = $this->session->flashdata('research');
        $data['navactive'] = 6;
        $data['view_module'] = "researches";
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function vieww($update_id) {

        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);

        $data['update_id'] = $update_id;

        $data['page_title'] = $data['research_title'];
        $data['page_keywords'] = $data['research_keywords'];
        $data['page_description'] = character_limiter($data['research_desc'],220);

        $data['flash'] = $this->session->flashdata('research');
        $data['navactive'] = 6;
        $data['view_module'] = "researches";
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
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

    

    function create() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        $update_id = $this->uri->segment(3);

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {

            $this->form_validation->set_rules('research_title', 'Research Title', 'Trim|required|max_length[260]');
            $this->form_validation->set_rules('research_desc', 'Research Description', 'trim|required');
            $this->form_validation->set_rules('research_keywords', 'Research Keywords', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                $enc_text = $this->site_security->generate_random_string(6).$update_id;
                $data['research_desc'] = $this->_get_string_replaced($data['research_desc']);
                $data['research_url'] = url_title($data['research_title']).'-'.$enc_text;
                $data['research_volume'] = '';

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Research details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('flashtxt', $value);
                    redirect('researches/create/' . $update_id);
                } else {
                    
                    $data['research_date'] = time();
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Research was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('flashtxt', $value);
                    redirect('researches/create/' . $update_id);
                }
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Research";
        } else {
            $data['headline'] = "Update Research details";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('flashtxt');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }


    function _get_string_replaced($research_desc){

        //$replace_str = array('div1' => '<div xss="removed">', 'span1' => '<span xss=removed>', 'span2' => '<span xss="removed">', 'div_open' => '<div>', 'div_close' => '</div>', 'blockq_open' => '<blockquote>', 'blockq_close' => '</blockquote>', 'span_open' => '<span>', 'span_close' => '</span>');
        //$research_desc = str_replace($replace_str, '', $research_desc);
        $research_desc = str_replace('img src', 'span', $research_desc);
        $research_desc = str_replace('&lt;', '<', $research_desc);
        $research_desc = str_replace('&gt;', '>', $research_desc);
        $research_desc = str_replace('&gt;', '>', $research_desc);
        $research_desc = str_replace('width="560"', 'width="100%"', $research_desc);
        $research_desc = str_replace('iframe', 'div', $research_desc);
        return $research_desc;
    }

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['query'] = $this->get('research_date');

        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function fetch_data_from_post() {
        $data['research_title'] = strip_tags($this->input->post('research_title', TRUE));
        $data['research_desc'] = $this->input->post('research_desc', TRUE);
        $data['research_keywords'] = strip_tags($this->input->post('research_keywords', TRUE));
        $data['research_author'] = $this->input->post('research_author', TRUE);
        $data['research_coauthor'] = $this->input->post('research_coauthor', TRUE);
        $data['research_volume'] = $this->input->post('research_volume', TRUE);
        $data['research_pages'] = $this->input->post('research_pages', TRUE);
        $data['research_status'] = $this->input->post('research_status', TRUE);
        return $data;
    }

    function fetch_data_from_db($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['research_title'] = $row->research_title;
            $data['research_url'] = $row->research_url;
            $data['research_desc'] = $row->research_desc;
            $data['research_keywords'] = $row->research_keywords;
            $data['research_coauthor'] = $row->research_coauthor;
            $data['research_status'] = $row->research_status;
            $data['research_author'] = $row->research_author;
            $data['research_volume'] = $row->research_volume;
            $data['research_pages'] = $row->research_pages;
            $data['research_file'] = $row->research_file;
            $data['research_date'] = $row->research_date;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function get($order_by) {
        $query = $this->mdl_researches->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_researches->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_researches->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_researches->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_researches->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_researches->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_researches->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_researches->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_researches->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_researches->_custom_query($mysql_query);
        return $query;
    }

    function research_check($str) {
        $research_url = url_title($str);
        $mysql_query = "Select * from researches where research_title='$str' and research_url='$research_url'";
        $update_id = $this->uri->segment(3);
        if (is_numeric($update_id)) {
            $mysql_query.=" and id!=$update_id";
        }

        $query = $this->_custom_query($mysql_query);
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            $this->form_validation->set_message('research_check', 'The Research title that you submitted is not available');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
