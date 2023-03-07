<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notifications extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_notifications');
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }


    function delete_notification($update_id){
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

         if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $data = $this->fetch_data_from_db($update_id);
        $fileName = $data['notifi_file'];
        $img_path_1 = './assets/pdf/notifications/' . $fileName;

        if(!$fileName==''){
            if (file_exists($img_path_1)) {
                unlink($img_path_1);
            }
        }

        $this->_delete($update_id);
        $flash_msg = "The Notifications was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('notifications/manage');   
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
            redirect('notifications/create/' . $update_id);
        }

        $config['upload_path'] = './assets/pdf/notifications/';
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
        $img_path_1 = './assets/pdf/notifications/' . $fileName;


        if (file_exists($img_path_1)) {
            unlink($img_path_1);
        }


        unset($data);
        $data['notifi_file'] = "";
        $this->_update($update_id, $data);
        $flash_msg = "The File was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('notifications/create/' . $update_id);
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
        $query = $this->mdl_notifications->_get_notifications_list($limit, $offset);
        return $query;
    }


    function listing() {

        $data['query'] = $this->mdl_notifications->_get_notifications_list($limit=NULL, $offset=NULL);
    
        $data['flash'] = $this->session->flashdata('post');
        $data['navactive'] = 0;
        $data['view_module'] = "notifications";
        $data['view_file'] = "category";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function index(){
        redirect('notifications/listing','refresh');
    }



    function _get_notifications_by_string($string){
        $query = $this->mdl_notifications->_get_notifications_by_string($string);
        return $query;
    }


    function _get_related_notifications($cat_id){
        $query = $this->mdl_notifications->_get_related_notifications($cat_id);
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

        $data['update_id'] = $update_id;

        $data['page_title'] = $data['notifi_title'];
        $data['page_description'] = character_limiter($data['notifi_desc'],220);

        $data['flash'] = $this->session->flashdata('research');
        $data['navactive'] = 0;
        $data['view_module'] = "notifications";
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function vieww($update_id) {

        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);

        $data['update_id'] = $update_id;

        $data['page_title'] = $data['notifi_title'];
        $data['page_keywords'] = $data['research_keywords'];
        $data['page_description'] = character_limiter($data['notifi_desc'],220);

        $data['flash'] = $this->session->flashdata('research');
        $data['navactive'] = 6;
        $data['view_module'] = "notifications";
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

            $this->form_validation->set_rules('notifi_title', 'Notification Title', 'Trim|required|max_length[260]');
            $this->form_validation->set_rules('notifi_desc', 'Notification Description', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                $data['notifi_desc'] = $this->_get_string_replaced($data['notifi_desc']);
                $enc_text = $this->site_security->generate_random_string(6).$update_id;
                

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Notification details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('flashtxt', $value);
                    redirect('notifications/create/' . $update_id);
                } else {
                    $data['notifi_url'] = url_title($data['notifi_title']).'-'.$enc_text;
                    $data['notifi_date'] = time();
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Notification was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('flashtxt', $value);
                    redirect('notifications/create/' . $update_id);
                }
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Notification";
        } else {
            $data['headline'] = "Update Notification details";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('flashtxt');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }


    function _get_string_replaced($notifi_desc){

        //$replace_str = array('div1' => '<div xss="removed">', 'span1' => '<span xss=removed>', 'span2' => '<span xss="removed">', 'div_open' => '<div>', 'div_close' => '</div>', 'blockq_open' => '<blockquote>', 'blockq_close' => '</blockquote>', 'span_open' => '<span>', 'span_close' => '</span>');
        //$notifi_desc = str_replace($replace_str, '', $notifi_desc);
        //$notifi_desc = str_replace('img src', 'span', $notifi_desc);
        //$notifi_desc = str_replace('&lt;', '<', $notifi_desc);
        //$notifi_desc = str_replace('&gt;', '>', $notifi_desc);
        //$notifi_desc = str_replace('&gt;', '>', $notifi_desc);
        //$notifi_desc = str_replace('width="560"', 'width="100%"', $notifi_desc);
        //$notifi_desc = str_replace('iframe', 'div', $notifi_desc);
        return $notifi_desc;
    }

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['query'] = $this->get('notifi_date');

        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function fetch_data_from_post() {
        $data['notifi_title'] = strip_tags($this->input->post('notifi_title', TRUE));
        $data['notifi_desc'] = $this->input->post('notifi_desc', TRUE);
        $data['notifi_status'] = $this->input->post('notifi_status', TRUE);
        return $data;
    }

    function fetch_data_from_db($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['notifi_title'] = $row->notifi_title;
            $data['notifi_url'] = $row->notifi_url;
            $data['notifi_desc'] = $row->notifi_desc;
            $data['notifi_status'] = $row->notifi_status;
            $data['notifi_file'] = $row->notifi_file;
            $data['notifi_date'] = $row->notifi_date;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function get($order_by) {
        $query = $this->mdl_notifications->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_notifications->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_notifications->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_notifications->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_notifications->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_notifications->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_notifications->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_notifications->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_notifications->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_notifications->_custom_query($mysql_query);
        return $query;
    }

    function research_check($str) {
        $notifi_url = url_title($str);
        $mysql_query = "Select * from notifications where notifi_title='$str' and notifi_url='$notifi_url'";
        $update_id = $this->uri->segment(3);
        if (is_numeric($update_id)) {
            $mysql_query.=" and id!=$update_id";
        }

        $query = $this->_custom_query($mysql_query);
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            $this->form_validation->set_message('research_check', 'The Notification title that you submitted is not available');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
