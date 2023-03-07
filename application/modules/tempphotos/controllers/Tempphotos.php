<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tempphotos extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_tempphotos');
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
    }




    function delete_image($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $temp_img = $data['temp_img'];
        $img_path = './assets/images/tempimages/' . $temp_img;

        if (file_exists($img_path)) {
            unlink($img_path);
        }

        unset($data);
        $this->_delete($update_id);
        $flash_msg = "The Photo image was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('tempphotos/manage/');
    }


    function _generate_thumbnail($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/tempimages/' . $file_name;
        $config['new_image'] = './assets/images/tempimages/' . $file_name;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 600;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }


    function do_upload() {

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == 'Cancel') {
            redirect('tempphotos/manage/');
        }

        $config['upload_path'] = './assets/images/tempimages/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000;
        $config['max_width'] = 6000;
        $config['max_height'] = 6000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));

            $data['headline'] = "Upload Error";
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->admin($data);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];
            $this->_generate_thumbnail($file_name);

            $update_data['temp_img'] = $file_name;
            $this->_insert($update_data);

            $data['headline'] = "Upload Successfully";
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_success";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
    }


    function upload_image() {

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['headline'] = "Upload Image";
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "upload_image";
        $this->load->module('templates');
        $this->templates->admin($data);
    }




    function fetch_data_from_db($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['temp_img'] = $row->temp_img;

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
        $query = $this->mdl_tempphotos->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_tempphotos->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_tempphotos->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_tempphotos->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_tempphotos->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_tempphotos->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_tempphotos->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_tempphotos->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_tempphotos->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_tempphotos->_custom_query($mysql_query);
        return $query;
    }

}
