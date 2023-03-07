<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adsbanners extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_adsbanners');
    }


    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['query'] = $this->get('id desc');

        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function _get_banners($place, $limit, $offset){
        $query = $this->mdl_adsbanners->_get_banners($place, $limit, $offset);
        return $query;
    }


    function fetch_data_from_db($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['fileName'] = $row->fileName;
            $data['place'] = $row->place;
            $data['status'] = $row->status;

        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }


    function update_status($place, $update_id){

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();


        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $sdata = $this->fetch_data_from_db($update_id);

        if($sdata['status'] == 1){

            $data['status'] = 0;

        } else {

            $data['status'] = 1;
        }


        $this->_update($update_id, $data);
        $flash_msg = "The Status was updated successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('adsbanners/addphoto/' . $place);

    }


    function delete_image() {

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $place = $this->uri->segment(3);
        $update_id = $this->uri->segment(4);

        $data = $this->fetch_data_from_db($update_id);
        $fileName = $data['fileName'];
        $img_path1 = './assets/images/banners/raw/' . $fileName;
        $img_path2 = './assets/images/banners/large/' . $fileName;
        $img_path3 = './assets/images/banners/small/' . $fileName;

        if (file_exists($img_path1)) {
            unlink($img_path1);
        }

        if (file_exists($img_path2)) {
            unlink($img_path2);
        }

        if (file_exists($img_path3)) {
            unlink($img_path3);
        }

        $this->_delete($update_id);
        $flash_msg = "The Banner was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('adsbanners/addphoto/' . $place);
    }


    function _generate_small($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/banners/raw/' . $file_name;
        $config['new_image'] = './assets/images/banners/small/' . $file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 203;
        $config['height'] = 25;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }


    function _generate_large($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/banners/raw/' . $file_name;
        $config['new_image'] = './assets/images/banners/large/' . $file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 729;
        $config['height'] = 90;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
        $this->image_lib->clear();
        $this->_generate_small($file_name);
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
            redirect('adsbanners/addphoto/' . $update_id);
        }

        $config['upload_path'] = './assets/images/banners/raw/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000;
        $config['max_width'] = 4000;
        $config['max_height'] = 4000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));

            $data['headline'] = "Upload Error";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "addphotos";
            $this->load->module('templates');
            $this->templates->admin($data);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];
            $this->_generate_large($file_name);

            $update_data['fileName'] = $file_name;
            $update_data['place'] = $update_id;
            $update_data['status'] = 1;
            $this->_insert($update_data);

            $data['headline'] = "Upload Successfully";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_success";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
    }


    function addphoto($place) {

        if (!is_numeric($place)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $mysql_query = "select * from adsbanners where place=$place";
        $data['query'] = $this->_custom_query($mysql_query);
        $data['num_rows'] = $data['query']->num_rows();

        $data['headline'] = "Add Banners for Middle Area";
        if($place == 1){
            $data['headline'] = "Add Banners for Front Area";
        }

        
        $data['update_id'] = $place;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "addphotos";
        $this->load->module('templates');
        $this->templates->admin($data);
    }


    function get_footer_gallery(){
        $query = $this->mdl_adsbanners->get_footer_gallery();
        return $query;
    }


    function get($order_by) {
        $query = $this->mdl_adsbanners->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_adsbanners->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_adsbanners->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_adsbanners->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_adsbanners->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_adsbanners->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_adsbanners->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_adsbanners->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_adsbanners->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_adsbanners->_custom_query($mysql_query);
        return $query;
    }

}
