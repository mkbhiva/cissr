<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Photogallery extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_photogallery');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
    }


    function _get_list($limit, $offset)
    {
        $query = $this->mdl_photogallery->_get_list($limit, $offset);
        return $query;
    }


    function delete_image($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $tphoto = $data['tphoto'];
        $img_path_1 = './assets/images/testimonial/' . $tphoto;


        if (file_exists($img_path_1)) {
            unlink($img_path_1);
        }



        unset($data);
        $data['tphoto'] = "";
        $this->_update($update_id, $data);
        $flash_msg = "The Photo was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('testimonials/create/' . $update_id);
    }


    function _generate_thumbnail($file_name)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/testimonial/' . $file_name;
        $config['new_image'] = './assets/images/testimonial/' . $file_name;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 200;
        $config['height'] = 200;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
        $this->image_lib->clear();
    }



    function do_upload($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == 'Cancel') {
            redirect('testimonials/create/' . $update_id);
        }

        $config['upload_path'] = './assets/images/testimonial/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 5000;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));

            $data['headline'] = "Upload Error";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->admin($data);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];
            $this->_generate_thumbnail($file_name);


            $update_data['tphoto'] = $file_name;
            $this->_update($update_id, $update_data);

            $data['headline'] = "Upload Successfully";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('post');
            $data['view_file'] = "upload_success";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
    }


    function upload_image($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['headline'] = "Upload Image";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "upload_image";
        $this->load->module('templates');
        $this->templates->admin($data);
    }


    function _get_testimonialsLink()
    {

        $query = $this->mdl_photogallery->_get_testimonialsLink();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {

            foreach ($query->result() as $row) {
                $tplace = $row->tplace;
            }
        } else {
            $tplace = '';
        }

        return $tplace;
    }


    function create()
    {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {

            $this->form_validation->set_rules('tname', 'Testimonials Name', 'Trim|required');
            $this->form_validation->set_rules('tplace', 'Testimonials Place', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Testimonials details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('testimonials/create/' . $update_id);
                } else {
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Testimonials Details was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('testimonials/create/' . $update_id);
                }
            } else {

                $flash_msg = validation_errors();
                $value = '<div class="alert alert-danger" role="alert"><strong>' . $flash_msg . '</strong></div>';
                $this->session->set_flashdata('post', $value);
                redirect('testimonials/create/' . $update_id);
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Testimonials";
            $data['tphoto'] = "";
        } else {
            $data['headline'] = "Update Testimonials";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function manage()
    {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['query'] = $this->get('id');

        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function index()
    {
        $data['navactive'] = 8;
        $mysql_query = "Select * from testimonials where tstatus = 1 ORDER BY id desc";
        $data['query'] = $this->_custom_query($mysql_query);
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function photos1()
    {
        $this->load->helper('url');
        $data['navactive'] = 8;
        $mysql_query = "Select * from testimonials where tstatus = 1 ORDER BY id desc";
        $data['query'] = $this->_custom_query($mysql_query);
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "photos1";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function photos2()
    {
        $data['navactive'] = 8;
        $mysql_query = "Select * from testimonials where tstatus = 1 ORDER BY id desc";
        $data['query'] = $this->_custom_query($mysql_query);
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "photos2";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function photos3()
    {
        $data['navactive'] = 8;
        $mysql_query = "Select * from testimonials where tstatus = 1 ORDER BY id desc";
        $data['query'] = $this->_custom_query($mysql_query);
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "photos3";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function photos4()
    {
        $data['navactive'] = 8;
        $mysql_query = "Select * from testimonials where tstatus = 1 ORDER BY id desc";
        $data['query'] = $this->_custom_query($mysql_query);
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "photos4";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function change_title_case($string)
    {
        $new_string = strip_tags($string);
        $new_string = strtolower($new_string);
        $new_string = ucwords($new_string);
        return $new_string;
    }

    function fetch_data_from_post()
    {
        $data['tname'] = $this->change_title_case($this->input->post('tname', TRUE));
        $data['tplace'] = $this->change_title_case($this->input->post('tplace', TRUE));
        $data['tdesc'] = $this->input->post('tdesc', TRUE);
        $data['tdate'] = time();
        $data['tstatus'] = $this->input->post('tstatus', TRUE);
        return $data;
    }

    function fetch_data_from_db($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['tname'] = $row->tname;
            $data['tplace'] = $row->tplace;
            $data['tdesc'] = $row->tdesc;
            $data['tdate'] = $row->tdate;
            $data['tphoto'] = $row->tphoto;
            $data['tstatus'] = $row->tstatus;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function get($order_by)
    {
        $query = $this->mdl_photogallery->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        $query = $this->mdl_photogallery->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $query = $this->mdl_photogallery->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $query = $this->mdl_photogallery->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->mdl_photogallery->_insert($data);
    }

    function _update($id, $data)
    {
        $this->mdl_photogallery->_update($id, $data);
    }

    function _delete($id)
    {
        $this->mdl_photogallery->_delete($id);
    }

    function count_where($column, $value)
    {
        $count = $this->mdl_photogallery->count_where($column, $value);
        return $count;
    }

    function get_max()
    {
        $max_id = $this->mdl_photogallery->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $query = $this->mdl_photogallery->_custom_query($mysql_query);
        return $query;
    }
}
