<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Videogallery extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_videogallery');
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }


    function _get_hp_latest_vdo($limit, $offset){
        $query = $this->mdl_videogallery->_get_hp_latest_vdo($limit, $offset);
        return $query;
    }


    function view_cat() {

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
        $data['view_module'] = "videogallery";
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
        $mysql_query = "SELECT * FROM videogallery WHERE status = 1";

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


    function album($update_id){

        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $data = $this->fetch_data_from_db($update_id);
        $data['page_title'] = $data['htitle'];
        $data['page_keywords'] = "";
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "album";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function view($update_id){

        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $data = $this->fetch_data_from_db($update_id);

        $data['page_title'] = $data['htitle'];
        $data['page_keywords'] = $data['etitle'];
        $data['page_description'] = character_limiter($data['description'],220);

        $data['flash'] = $this->session->flashdata('post');
        $data['view_module'] = "videogallery";
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);

    }


    function create() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);


        if ($submit == "Submit") {

            $this->form_validation->set_rules('htitle', 'Hindi Title', 'Trim|required|max_length[250]');
            $this->form_validation->set_rules('etitle', 'English Title', 'Trim|required|max_length[250]');
            $this->form_validation->set_rules('vlink', 'Video Code', 'Trim|required|max_length[250]');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();
                $data['vurl'] = url_title($data['etitle']);
                $data['vimg'] = $this->get_thumbnail_img_from_video_url($data['vlink']);

                if(!$data['vimg']==''){

                }
                                                                                    
                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Video details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('videogallery/create/' . $update_id);
                } else {
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Video was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('videogallery/create/' . $update_id);
                }
            } else {

                    $flash_msg = validation_errors();
                    $value = '<div class="alert alert-danger" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('videogallery/create/' . $update_id);

            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Video";
            $data['vimg'] = "";
        } else {
            $data['headline'] = "Update Video details";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function get_thumbnail_img_from_video_url($vlink_code=NULL){

        $image_url = 'https://img.youtube.com/vi/'.$vlink_code.'/maxresdefault.jpg';
        @$rawImage = file_get_contents($image_url);

        if($rawImage){
            $image_name = $vlink_code.'.jpg';
            file_put_contents("assets/images/gallery/vgallery/thumb/".$image_name, $rawImage);
        } else {
            $image_name = '';
        }

        return $image_name;

    }


    function fetch_data_from_post() {
        $data['htitle'] = $this->input->post('htitle', TRUE);
        $data['etitle'] = $this->input->post('etitle', TRUE);
        $data['description'] = $this->input->post('description', TRUE);
        $data['vlink'] = $this->input->post('vlink', TRUE);
        $data['status'] = $this->input->post('status', TRUE);

        return $data;
    }

    function fetch_data_from_db($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['htitle'] = $row->htitle;
            $data['etitle'] = $row->etitle;
            $data['vurl'] = $row->vurl;
            $data['vimg'] = $row->vimg;
            $data['vlink'] = $row->vlink;
            $data['description'] = $row->description;
            $data['status'] = $row->status;

        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }


    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['query'] = $this->get('id desc');

        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }



    function get($order_by) {
        $query = $this->mdl_videogallery->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_videogallery->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_videogallery->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_videogallery->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_videogallery->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_videogallery->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_videogallery->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_videogallery->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_videogallery->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_videogallery->_custom_query($mysql_query);
        return $query;
    }

}
