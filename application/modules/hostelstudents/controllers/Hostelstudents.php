<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hostelstudents extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdlhostelstudents');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
    }


    function studentapply()
    {

        $this->load->module('timedate');
        $this->load->library('session');

        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit Application") {

            $this->form_validation->set_rules('hosStudName', 'Name', 'Trim|max_length[80]|required');
            $this->form_validation->set_rules('hostStudMobile', 'Mobile', 'Trim|exact_length[10]|numeric|required');
            $this->form_validation->set_rules('hostStudEmail', 'Email ID', 'Trim|required');
            $this->form_validation->set_rules('hosStudAdd', 'Full Address', 'trim|max_length[250]|required');
            $this->form_validation->set_rules('hostStudCity', 'City', 'trim|max_length[40]|required');
            $this->form_validation->set_rules('hostStudPin', 'Pin code', 'trim|numeric|exact_length[6]|required');
            $this->form_validation->set_rules('hostStudPrep', 'Preparation For', 'trim|max_length[200]|required');
            $this->form_validation->set_rules('hostStudReqTime', 'Required Days', 'trim|numeric|max_length[350]|required');

            if ($this->form_validation->run() == TRUE) {
                $data['hosStudName'] = $this->input->post('hosStudName', TRUE);
                $data['hostStudMobile'] = $this->input->post('hostStudMobile', TRUE);
                $data['hostStudEmail'] = $this->input->post('hostStudEmail', TRUE);
                $data['hosStudSex'] = $this->input->post('hosStudSex', TRUE);
                $data['hosStudAdd'] = $this->input->post('hosStudAdd', TRUE);
                $data['hostStudCity'] = $this->input->post('hostStudCity', TRUE);
                $data['hostStudPin'] = $this->input->post('hostStudPin', TRUE);
                $data['hostStudReqTime'] = $this->input->post('hostStudReqTime', TRUE);
                $data['hostStudCurrent'] = $this->input->post('hostStudCurrent', TRUE);
                $data['hostStudPrep'] = $this->input->post('hostStudPrep', TRUE);

                $data['hostStudIn'] = now();
                $data['hostStudOut'] = now();

                $data['hosRoom'] = 5555;
                $data['hostStudStatus'] = 0;
                $data['hostStudCurrent'] = 'Student';
                $data['hosType'] = 2;
                if ($data['hosStudSex'] == 'Male' || $data['hosStudSex'] == 'Other') {
                    $data['hosType'] = 1;
                }

                $this->_insert($data);
                $flash_msg = "Your application submitted successfully.";
                $value = '<div style="color:green"><strong>' . $flash_msg . '</strong></div>';
                $this->session->set_flashdata('post', $value);
                redirect('hostelstudents/formsuccess');
            } else {

                $flash_msg = validation_errors();
                $value = '<div style="color:red"><strong>' . $flash_msg . '</strong></div>';
                $this->session->set_flashdata('post', $value);
                //redirect('hostelstudents/apply');
            }
        }

        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "hostelapply";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function formsuccess()
    {
        $data['flash'] = $this->session->flashdata('post');
        $this->session->sess_destroy();

        $data['view_file'] = "hostelapplysuccess";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function _get_list($limit, $offset)
    {
        $query = $this->Mdlhostelstudents->_get_list($limit, $offset);
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
        $notice_file = $data['notice_file'];
        $img_path_1 = './assets/notices/raw/' . $notice_file;


        if (file_exists($img_path_1)) {
            unlink($img_path_1);
        }



        unset($data);
        $data['notice_file'] = "";
        $this->_update($update_id, $data);
        $flash_msg = "The Photo was deleted successfully.";
        $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
        $this->session->set_flashdata('post', $value);
        redirect('hostelstudents/create/' . $update_id);
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
            redirect('hostelstudents/create/' . $update_id);
        }

        $config['file_name']        = time();
        $config['upload_path'] = './assets/notices/raw/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
        $config['max_size'] = 50000;


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


            $update_data['notice_file'] = $file_name;
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


    function _get_noticesLink()
    {

        $query = $this->Mdlhostelstudents->_get_noticesLink();
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
        $this->load->module('timedate');
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit") {

            $this->form_validation->set_rules('hosStudName', 'Name', 'Trim|required');
            $this->form_validation->set_rules('hostStudMobile', 'Mobile', 'Trim|required');
            $this->form_validation->set_rules('hosStudAdd', 'Address', 'trim|required');
            $this->form_validation->set_rules('hostStudCity', 'City', 'trim|required');
            $this->form_validation->set_rules('hostStudPrep', 'Preparation', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                $data['hostStudIn'] = $this->timedate->make_timestamp_from_datepicker($data['hostStudIn']);

                $data['hostStudOut'] = $this->timedate->make_timestamp_from_datepicker($data['hostStudOut']);

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The student details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('hostelstudents/create/' . $update_id);
                } else {
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The student details was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('hostelstudents/create/' . $update_id);
                }
            } else {

                $flash_msg = validation_errors();
                $value = '<div class="alert alert-danger" role="alert"><strong>' . $flash_msg . '</strong></div>';
                $this->session->set_flashdata('post', $value);
                redirect('hostelstudents/create/' . $update_id);
            }
        }


        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['headline'] = "Add New Student";
            $data['notice_file'] = "";
        } else {
            $data['headline'] = "Update Student";
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
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "view";
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
        $data['hosType'] = $this->input->post('hosType', TRUE);
        $data['hosRoom'] = $this->input->post('hosRoom', TRUE);
        $data['hosStudName'] = $this->input->post('hosStudName', TRUE);
        $data['hostStudMobile'] = $this->input->post('hostStudMobile', TRUE);
        $data['hostStudEmail'] = $this->input->post('hostStudEmail', TRUE);
        $data['hosStudSex'] = $this->input->post('hosStudSex', TRUE);
        $data['hosStudAdd'] = $this->input->post('hosStudAdd', TRUE);
        $data['hostStudCity'] = $this->input->post('hostStudCity', TRUE);
        $data['hostStudPin'] = $this->input->post('hostStudPin', TRUE);
        $data['hostStudReqTime'] = $this->input->post('hostStudReqTime', TRUE);
        $data['hostStudIn'] = $this->input->post('hostStudIn', TRUE);
        $data['hostStudOut'] = $this->input->post('hostStudOut', TRUE);
        $data['hostStudCurrent'] = $this->input->post('hostStudCurrent', TRUE);
        $data['hostStudPrep'] = $this->input->post('hostStudPrep', TRUE);
        $data['hostStudStatus'] = $this->input->post('hostStudStatus', TRUE);
        return $data;
    }

    function fetch_data_from_db($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['hosType'] = $row->hosType;
            $data['hosRoom'] = $row->hosRoom;
            $data['hosStudName'] = $row->hosStudName;
            $data['hostStudMobile'] = $row->hostStudMobile;
            $data['hostStudEmail'] = $row->hostStudEmail;
            $data['hosStudSex'] = $row->hosStudSex;
            $data['hosStudAdd'] = $row->hosStudAdd;
            $data['hostStudCity'] = $row->hostStudCity;
            $data['hostStudPin'] = $row->hostStudPin;
            $data['hostStudReqTime'] = $row->hostStudReqTime;
            $data['hostStudIn'] = $row->hostStudIn;
            $data['hostStudOut'] = $row->hostStudOut;
            $data['hostStudCurrent'] = $row->hostStudCurrent;
            $data['hostStudPrep'] = $row->hostStudPrep;
            $data['hostStudStatus'] = $row->hostStudStatus;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function get($order_by)
    {
        $query = $this->Mdlhostelstudents->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        $query = $this->Mdlhostelstudents->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $query = $this->Mdlhostelstudents->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $query = $this->Mdlhostelstudents->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->Mdlhostelstudents->_insert($data);
    }

    function _update($id, $data)
    {
        $this->Mdlhostelstudents->_update($id, $data);
    }

    function _delete($id)
    {
        $this->Mdlhostelstudents->_delete($id);
    }

    function count_where($column, $value)
    {
        $count = $this->Mdlhostelstudents->count_where($column, $value);
        return $count;
    }

    function get_max()
    {
        $max_id = $this->Mdlhostelstudents->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $query = $this->Mdlhostelstudents->_custom_query($mysql_query);
        return $query;
    }
}
