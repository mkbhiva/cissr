<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post_comments extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_post_comments');
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }


    function create() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {

            $this->form_validation->set_rules('status', 'Status', 'Trim|numeric');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();
                
                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Comment details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('post_comments/create/' . $update_id);
                }
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        }


        $data['headline'] = "Update Comment details";

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


    function post_comment($update_id){


    $this->load->library('session');
    $this->load->module('posts');
    $this->load->module('site_captcha');

        
        $submit = $this->input->post('submit', TRUE);
        $seg_post_url = $this->input->post('seg_post_url', TRUE);
        $post_id = $this->posts->_get_post_id_from_post_url($seg_post_url);
        

        if ($submit == "Submit Comment") {

            $this->form_validation->set_rules('comment_name', 'Name', 'Trim|required|min_length[4]|max_length[40]');
            $this->form_validation->set_rules('comment_email', 'Email ID', 'Trim|required|min_length[5]|max_length[60]|valid_email');
            $this->form_validation->set_rules('comment_place', 'Place', 'Trim|required|min_length[5]|max_length[60]');
            $this->form_validation->set_rules('comment_text', 'Comment Text', 'Trim|required|min_length[5]|max_length[300]');

            if ($this->form_validation->run() == TRUE) {

                $data = $this->fetch_data_from_post();

                        $data['post_id'] = $post_id;
                        $data['comment_date'] = time();
                        $data['status'] = 0;

                        $this->_insert($data);
                        $flash_msg = "Your Comment has been submitted for approval.";
                        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                        $this->session->set_flashdata('flash_msg', $value);
                        redirect(site_url('news/article/'.$seg_post_url));
                    
                } else {
                    $flash_msg = validation_errors();
                    $value = '<div class="alert alert-danger" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('flash_msg', $value);
                    redirect(site_url('news/article/'.$seg_post_url));
                }   // validation
        }

        $data['comment_query'] = $this->get_with_double_condition('post_id', $update_id, 'status', 1);
        $data['flash_msg'] = $this->session->flashdata('flash_msg');
        $this->load->view('draw_post_comments', $data);
    }




    function fetch_data_from_post() {
        $data['post_id'] = $this->input->post('post_id', TRUE);
        $data['comment_name'] = $this->input->post('comment_name', TRUE);
        $data['comment_email'] = $this->input->post('comment_email', TRUE);
        $data['comment_place'] = $this->input->post('comment_place', TRUE);
        $data['comment_text'] = $this->input->post('comment_text', TRUE);
        $data['status'] = $this->input->post('status', TRUE);;

        return $data;
    }

    function fetch_data_from_db($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['post_id'] = $row->post_id;
            $data['comment_name'] = $row->comment_name;
            $data['comment_email'] = $row->comment_email;
            $data['comment_place'] = $row->comment_place;
            $data['comment_text'] = $row->comment_text;
            $data['comment_date'] = $row->comment_date;
            $data['status'] = $row->status;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }


    function get_with_double_condition($col1, $value1, $col2, $value2) {
        $query = $this->mdl_post_comments->get_with_double_condition($col1, $value1, $col2, $value2) ;
        return $query;
    }


    function get($order_by) {
        $query = $this->mdl_post_comments->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_post_comments->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_post_comments->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_post_comments->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_post_comments->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_post_comments->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_post_comments->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_post_comments->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_post_comments->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_post_comments->_custom_query($mysql_query);
        return $query;
    }

}
