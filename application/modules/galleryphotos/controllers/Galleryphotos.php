<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Galleryphotos extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_galleryphotos');
    }


    


    function fetch_data_from_db($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['photo_img'] = $row->photo_img;
            $data['gallery_id'] = $row->gallery_id;

        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }


    function delete_image() {

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $gallery_id = $this->uri->segment(3);
        $update_id = $this->uri->segment(4);

        $data = $this->fetch_data_from_db($update_id);
        $photo_img = $data['photo_img'];
        $img_path1 = './assets/images/gallery/galleryphotos/raw/' . $photo_img;
        $img_path2 = './assets/images/gallery/galleryphotos/main/' . $photo_img;
        $img_path3 = './assets/images/gallery/galleryphotos/thumb/' . $photo_img;

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
        $flash_msg = "The Photo was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('galleryphotos/addphoto/' . $gallery_id);
    }


    function _generate_thumbnail($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/gallery/galleryphotos/raw/' . $file_name;
        $config['new_image'] = './assets/images/gallery/galleryphotos/thumb/' . $file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 80;
        $config['height'] = 65;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }


    function _generate_main($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/gallery/galleryphotos/raw/' . $file_name;
        $config['new_image'] = './assets/images/gallery/galleryphotos/main/' . $file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 850;
        $config['height'] = 565;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
        $this->image_lib->clear();
        $this->_generate_thumbnail($file_name);
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
            redirect('webgallery/create/' . $update_id);
        }

        $config['upload_path'] = './assets/images/gallery/galleryphotos/raw/';
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
            $this->_generate_main($file_name);

            $update_data['photo_img'] = $file_name;
            $update_data['gallery_id'] = $update_id;
            $this->_insert($update_data);

            $data['headline'] = "Upload Successfully";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_success";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
    }


    function addphoto($gallery_id) {

        if (!is_numeric($gallery_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('web_products');
        $this->site_security->_make_sure_is_admin();

        $mysql_query = "select * from galleryphotos where gallery_id=$gallery_id ORDER BY id DESC";
        $data['query'] = $this->_custom_query($mysql_query);
        $data['num_rows'] = $data['query']->num_rows();


        $data['headline'] = "Add Photos";
        $data['update_id'] = $gallery_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "addphotos";
        $this->load->module('templates');
        $this->templates->admin($data);
    }


    function get_footer_gallery(){
        $query = $this->mdl_galleryphotos->get_footer_gallery();
        return $query;
    }


    function get($order_by) {
        $query = $this->mdl_galleryphotos->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->mdl_galleryphotos->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $query = $this->mdl_galleryphotos->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $query = $this->mdl_galleryphotos->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->mdl_galleryphotos->_insert($data);
    }

    function _update($id, $data) {
        $this->mdl_galleryphotos->_update($id, $data);
    }

    function _delete($id) {
        $this->mdl_galleryphotos->_delete($id);
    }

    function count_where($column, $value) {
        $count = $this->mdl_galleryphotos->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $max_id = $this->mdl_galleryphotos->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $query = $this->mdl_galleryphotos->_custom_query($mysql_query);
        return $query;
    }

}
