<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teams extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_teams');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
    }


    function get_block_name()
    {
        $query = $this->mdl_teams->get_block_name();
        return $query;
    }

    function get_team_by_location_ntype($location, $team_type, $team_sub_type)
    {
        $query = $this->mdl_teams->get_team_by_location_ntype($location, $team_type, $team_sub_type);
        return $query;
    }

    function get_team_by_type($team_type, $team_sub_type)
    {

        $query = $this->mdl_teams->get_team_by_type($team_type, $team_sub_type);
        return $query;
    }

    function get_team_by_type_hp($team_type, $team_sub_type)
    {

        $query = $this->mdl_teams->get_team_by_type_hp($team_type, $team_sub_type);
        return $query;
    }


    function _get_single_author($update_id)
    {

        $query = $this->mdl_teams->_get_single_author($update_id);
        return $query;
    }


    function _get_dropdown_options()
    {

        $options[''] = 'Please select ..';
        $query = $this->get('id');

        foreach ($query->result() as $row) {
            $options[$row->id] = $row->team_name;
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
        $team_img = $data['team_img'];
        $img_path_1 = './assets/images/teams/raw/' . $team_img;
        $img_path_2 = './assets/images/teams/thumb/' . $team_img;
        $img_path_3 = './assets/images/teams/main/' . $team_img;

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
        $data['team_img'] = "";
        $this->_update($update_id, $data);
        $flash_msg = "The Team Member image was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('teams/create/' . $update_id);
    }



    function _generate_main($file_name)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/teams/raw/' . $file_name;
        $config['new_image'] = './assets/images/teams/main/' . $file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 200;
        $config['height'] = 210;

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
            redirect('teams/create/' . $update_id);
        }

        $config['file_name']        = time();
        $config['upload_path'] = './assets/images/teams/raw/';
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



            $update_data['team_img'] = $file_name;
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
        $this->load->library('session');
        $this->load->module('team_type');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {

            $this->form_validation->set_rules('team_name', 'Team Member Name', 'Trim|required|max_length[260]');
            $this->form_validation->set_rules('team_location', 'Team Member Description', 'trim|required');
            $this->form_validation->set_rules('team_type', 'Team Member Type', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Team Member details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('teams/create/' . $update_id);
                } else {
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Team Member was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('teams/create/' . $update_id);
                }
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Team Member";
            $data['team_img'] = "";
        } else {
            $data['headline'] = "Update Team Member details";
        }

        $data['options'] = $this->team_type->_get_dropdown_options($update_id);
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

    function fetch_data_from_post()
    {
        $data['team_name'] = strip_tags($this->input->post('team_name', TRUE));
        $data['team_location'] = $this->input->post('team_location', TRUE);
        $data['team_postName'] = $this->input->post('team_postName', TRUE);
        $data['team_phone'] = $this->input->post('team_phone', TRUE);
        $data['team_type'] = strip_tags($this->input->post('team_type', TRUE));
        $data['team_subType'] = strip_tags($this->input->post('team_subType', TRUE));
        $data['team_year'] = strip_tags($this->input->post('team_year', TRUE));
        $data['team_status'] = strip_tags($this->input->post('team_status', TRUE));
        $data['team_position'] = strip_tags($this->input->post('team_position', TRUE));
        return $data;
    }

    function fetch_data_from_db($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['team_name'] = $row->team_name;
            $data['team_location'] = $row->team_location;
            $data['team_postName'] = $row->team_postName;
            $data['team_phone'] = $row->team_phone;
            $data['team_type'] = $row->team_type;
            $data['team_subType'] = $row->team_subType;
            $data['team_img'] = $row->team_img;
            $data['team_year'] = $row->team_year;
            $data['team_position'] = $row->team_position;
            $data['team_status'] = $row->team_status;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function get($order_by)
    {
        $query = $this->mdl_teams->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        $query = $this->mdl_teams->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $query = $this->mdl_teams->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $query = $this->mdl_teams->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->mdl_teams->_insert($data);
    }

    function _update($id, $data)
    {
        $this->mdl_teams->_update($id, $data);
    }

    function _delete($id)
    {
        $this->mdl_teams->_delete($id);
    }

    function count_where($column, $value)
    {
        $count = $this->mdl_teams->count_where($column, $value);
        return $count;
    }

    function get_max()
    {
        $max_id = $this->mdl_teams->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $query = $this->mdl_teams->_custom_query($mysql_query);
        return $query;
    }
}
