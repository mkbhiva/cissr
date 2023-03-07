<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Members extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_members');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
    }


    function get_block_name()
    {
        $query = $this->mdl_members->get_block_name();
        return $query;
    }

    function get_member_by_location_ntype($location, $member_phone)
    {
        $query = $this->mdl_members->get_member_by_location_ntype($location, $member_phone);
        return $query;
    }

    function get_member_by_type($update_id)
    {

        $query = $this->mdl_members->get_member_by_type($update_id);
        return $query;
    }


    function _get_single_author($update_id)
    {

        $query = $this->mdl_members->_get_single_author($update_id);
        return $query;
    }


    function _get_dropdown_options()
    {

        $options[''] = 'Please select ..';
        $query = $this->get('id');

        foreach ($query->result() as $row) {
            $options[$row->id] = $row->member_name;
        }
        return $options;
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
        $member_img = $data['member_img'];
        $img_path_1 = './assets/images/members/raw/' . $member_img;
        $img_path_2 = './assets/images/members/thumb/' . $member_img;
        $img_path_3 = './assets/images/members/main/' . $member_img;

        if (file_exists($img_path_1)) {
            unlink($img_path_1);
        }

        if (file_exists($img_path_2)) {
            unlink($img_path_2);
        }

        if (file_exists($img_path_3)) {
            unlink($img_path_3);
        }


        unset($data);
        $data['member_img'] = "";
        $this->_update($update_id, $data);
        $flash_msg = "The Member image was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('members/create/' . $update_id);
    }



    function _generate_main($file_name)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/members/raw/' . $file_name;
        $config['new_image'] = './assets/images/members/main/' . $file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 300;
        $config['height'] = 300;

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
            redirect('members/create/' . $update_id);
        }

        $config['file_name']        = time();
        $config['upload_path'] = './assets/images/members/raw/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 3000;
        $config['max_width'] = 2500;
        $config['max_height'] = 2500;

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
            $this->_generate_main($file_name);

            $update_data['member_img'] = $file_name;
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

    function create()
    {
        $this->load->module('timedate');
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {

            $this->form_validation->set_rules('member_name', 'Member Name', 'Trim|required|max_length[260]');
            $this->form_validation->set_rules('member_location', 'Member Description', 'trim|required');
            $this->form_validation->set_rules('member_phone', 'Member Phone', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                if (is_numeric($update_id)) {

                    $data['member_join'] = $this->timedate->make_timestamp_from_datepicker($data['member_join']);

                    $data['member_valid'] = $this->timedate->make_timestamp_from_datepicker($data['member_valid']);

                    $this->_update($update_id, $data);
                    $flash_msg = "The Member details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('members/create/' . $update_id);
                } else {
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Member was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('members/create/' . $update_id);
                }
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Member";
            $data['member_img'] = "";
        } else {
            $data['headline'] = "Update Member details";
        }

        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "create";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function lifetime()
    {

        $data['query'] = $this->get_where_custom('member_lifelong', 1);

        $data['view_file'] = "lifetime";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

    function general()
    {

        $mysql_query = "select * from members where member_lifelong = 0 AND member_status = 1 order by id desc";
        $data['query'] = $this->_custom_query($mysql_query);

        $data['view_file'] = "general";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
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

    function fetch_data_from_post()
    {
        $data['member_name'] = strip_tags($this->input->post('member_name', TRUE));
        $data['member_phone'] = strip_tags($this->input->post('member_phone', TRUE));
        $data['member_address'] = strip_tags($this->input->post('member_address', TRUE));
        $data['member_location'] = strip_tags($this->input->post('member_location', TRUE));
        $data['member_lifelong'] = $this->input->post('member_lifelong', TRUE);
        $data['member_join'] = $this->input->post('member_join', TRUE);
        $data['member_valid'] = $this->input->post('member_valid', TRUE);
        $data['member_status'] = $this->input->post('member_status', TRUE);

        return $data;
    }

    function fetch_data_from_db($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['member_name'] = $row->member_name;
            $data['member_phone'] = $row->member_phone;
            $data['member_address'] = $row->member_address;
            $data['member_location'] = $row->member_location;
            $data['member_lifelong'] = $row->member_lifelong;
            $data['member_img'] = $row->member_img;
            $data['member_join'] = $row->member_join;
            $data['member_valid'] = $row->member_valid;
            $data['member_status'] = $row->member_status;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function get($order_by)
    {
        $query = $this->mdl_members->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        $query = $this->mdl_members->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $query = $this->mdl_members->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $query = $this->mdl_members->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->mdl_members->_insert($data);
    }

    function _update($id, $data)
    {
        $this->mdl_members->_update($id, $data);
    }

    function _delete($id)
    {
        $this->mdl_members->_delete($id);
    }

    function count_where($column, $value)
    {
        $count = $this->mdl_members->count_where($column, $value);
        return $count;
    }

    function get_max()
    {
        $max_id = $this->mdl_members->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $query = $this->mdl_members->_custom_query($mysql_query);
        return $query;
    }
}
