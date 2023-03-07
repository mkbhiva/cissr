<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Volumes extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_volumes');
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }


    function get_volume_options(){
        $options[''] = 'Please select ..';
        $mysql_query = "select * from volumes where volumeStatus=1 ORDER BY id DESC";
        $query = $this->_custom_query($mysql_query);

        foreach ($query->result() as $row) {
            $options[$row->volumeNo.', '.$row->issueNo] = $row->volumeNo.', '.$row->issueNo;
        }

        return $options;
    }


    function get_latest_on_volumex1(){

        $query = $this->mdl_volumes->get_latest_on_volumex1();
        return $query;

    }


    function delete_notification($update_id){
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

         if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $data = $this->fetch_data_from_db($update_id);
        $fileName = $data['notifi_file'];
        $img_path_1 = './assets/pdf/volumes/' . $fileName;

        if(!$fileName==''){
            if (file_exists($img_path_1)) {
                unlink($img_path_1);
            }
        }

        $this->_delete($update_id);
        $flash_msg = "The Volumes was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('volumes/manage');   
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
            redirect('volumes/create/' . $update_id);
        }

        $config['upload_path'] = './assets/pdf/volumes/';
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

            $update_data['notifi_file'] = $file_name;
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
        $fileName = $data['notifi_file'];
        $img_path_1 = './assets/pdf/volumes/' . $fileName;


        if (file_exists($img_path_1)) {
            unlink($img_path_1);
        }


        unset($data);
        $data['notifi_file'] = "";
        $this->_update($update_id, $data);
        $flash_msg = "The File was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('volumes/create/' . $update_id);
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


    function _get_notifications_list($limit, $offset)
    {
        $query = $this->mdl_volumes->_get_notifications_list($limit, $offset);
        return $query;
    }


    function listing() {

        $data['query'] = $this->mdl_volumes->_get_notifications_list($limit=NULL, $offset=NULL);
    
        $data['flash'] = $this->session->flashdata('post');
        $data['navactive'] = 0;
        $data['view_module'] = "volumes";
        $data['view_file'] = "category";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function index(){
        redirect('volumes/listing','refresh');
    }



    function _get_notifications_by_string($string){
        $query = $this->mdl_volumes->_get_notifications_by_string($string);
        return $query;
    }


    function _get_related_notifications($cat_id){
        $query = $this->mdl_volumes->_get_related_notifications($cat_id);
        return $query;
    }


    function _get_research_id_from_research_url($notifi_url) {
        $query = $this->get_where_custom('notifi_url', $notifi_url);
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
        $notifi_url = $this->uri->segment(3);
        $research_id = $this->_get_research_id_from_research_url($notifi_url);

        if($research_id>0){
            $update_id = $research_id;
        } else {
            redirect('site_security/not_allowed');
        }

        $data = $this->fetch_data_from_db($update_id);
        $volumeStatus = $data['volumeStatus'];
        
        if($volumeStatus==0){
           redirect('site_security/not_allowed'); 
        }
        
        $data['update_id'] = $update_id;

        $data['page_title'] = $data['volumeNo'];
        $data['page_description'] = character_limiter($data['issueNo'],220);

        $data['flash'] = $this->session->flashdata('research');
        $data['navactive'] = 0;
        $data['view_module'] = "volumes";
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function vieww($update_id) {

        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);

        $data['update_id'] = $update_id;

        $data['page_title'] = $data['volumeNo'];
        $data['page_keywords'] = $data['research_keywords'];
        $data['page_description'] = character_limiter($data['issueNo'],220);

        $data['flash'] = $this->session->flashdata('research');
        $data['navactive'] = 6;
        $data['view_module'] = "volumes";
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

            $this->form_validation->set_rules('volumeNo', 'Volume Title', 'Trim|required|max_length[260]');
            $this->form_validation->set_rules('issueNo', 'Issue No.', 'callback_issue_check');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();


                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Volume details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('flashtxt', $value);
                    redirect('volumes/create/' . $update_id);
                } else {
                    $data['volumeDate'] = time();
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Volume was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('flashtxt', $value);
                    redirect('volumes/create/' . $update_id);
                }
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Volume";
        } else {
            $data['headline'] = "Update Volume details";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('flashtxt');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }


  
    function _get_string_replaced($issueNo){

        //$replace_str = array('div1' => '<div xss="removed">', 'span1' => '<span xss=removed>', 'span2' => '<span xss="removed">', 'div_open' => '<div>', 'div_close' => '</div>', 'blockq_open' => '<blockquote>', 'blockq_close' => '</blockquote>', 'span_open' => '<span>', 'span_close' => '</span>');
        //$issueNo = str_replace($replace_str, '', $issueNo);
        //$issueNo = str_replace('img src', 'span', $issueNo);
        //$issueNo = str_replace('&lt;', '<', $issueNo);
        //$issueNo = str_replace('&gt;', '>', $issueNo);
        //$issueNo = str_replace('&gt;', '>', $issueNo);
        //$issueNo = str_replace('width="560"', 'width="100%"', $issueNo);
        //$issueNo = str_replace('iframe', 'div', $issueNo);
        return $issueNo;
    }

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['query'] = $this->get('volumeDate');

        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function fetch_data_from_post() {
        $data['volumeNo'] = strip_tags($this->input->post('volumeNo', TRUE));
        $data['issueNo'] = $this->input->post('issueNo', TRUE);
        $data['volumeStatus'] = $this->input->post('volumeStatus', TRUE);
        return $data;
    }

    function fetch_data_from_db($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['volumeNo'] = $row->volumeNo;
            $data['issueNo'] = $row->issueNo;
            $data['volumeStatus'] = $row->volumeStatus;
            $data['volumeDate'] = $row->volumeDate;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function get($order_by) {
        $query = $this->mdl_volumes->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_volumes->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_volumes->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_volumes->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_volumes->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_volumes->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_volumes->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_volumes->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_volumes->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_volumes->_custom_query($mysql_query);
        return $query;
    }

    function issue_check($str) {

        $volumeNo = strip_tags($this->input->post('volumeNo', TRUE));
        //$issueNo= $this->input->post('issueNo', TRUE);

        $mysql_query = "Select * from volumes where volumeNo='$volumeNo' and issueNo='$str'";
        $update_id = $this->uri->segment(3);
        if (is_numeric($update_id)) {
            $mysql_query.=" and id!=$update_id";
        }

        $query = $this->_custom_query($mysql_query);
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            $this->form_validation->set_message('issue_check', 'This Issue No. already exist in this Volume.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
