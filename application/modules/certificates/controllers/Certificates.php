<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Certificates extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
    }


    function index()
    {
        redirect('certificates/serchCertificates', 'refresh');
    }


    function view_details($update_id)
    {

        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $count = $this->count_where('id', $update_id);

        if ($count < 1) {
            redirect('certificates/manage', 'refresh');
        }

        $data = $this->fetch_data_from_db($update_id);

        $data['view_file'] = "view_details";
        $this->load->module('templates');
        $this->templates->admin($data);
    }


    function success()
    {
        $this->load->library('session');
        $this->load->module('site_settings');
        $data['our_company'] = $this->site_settings->_get_company();
        $data['our_address'] = $this->site_settings->_get_our_address();
        $data['our_telnum'] = $this->site_settings->_get_our_telnum();
        $data['our_email'] = $this->site_settings->_get_our_email();

        $data['flash'] = $this->session->flashdata('post');
        $data['navactive'] = 2;
        $data['view_file'] = "papersuccess";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }



    function serchCertificates()
    {

        $this->load->module('site_settings');
        $this->load->module('site_security');
        $this->load->helper('directory');
        $this->load->library('session');

        $submit = $this->input->post('search', TRUE);
        $data = $this->fetch_data_from_post();
        $data['our_company'] = $this->site_settings->_get_company();
        $data['our_address'] = $this->site_settings->_get_our_address();
        $data['our_telnum'] = $this->site_settings->_get_our_telnum();
        $data['our_email'] = $this->site_settings->_get_our_email();

        $downLoadFile = '';
        $flash_msg = [];

        if ($submit == "Submit Certificate") {
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('mnumber', 'Mobile No.', 'trim|required|max_length[50]');

            if ($this->form_validation->run() == TRUE) {

                $fname = strip_tags($this->input->post('fname', TRUE));
                $mnumber = strip_tags($this->input->post('mnumber', TRUE));
                $file_name = $fname . $mnumber . ".pdf";

                $map = directory_map('./assets/pdf/certificates/');

                if (in_array($file_name, $map, True)) {
                    foreach ($map as $item) {
                        if ($file_name == $item) {
                            $downLoadFile = $item;
                            $this->session->set_flashdata('firstName', $fname);
                            $flash_msg = array("Certificate found! Click on given button to download.");
                        }
                    }
                } else {
                    $flash_msg = array("Certificate not found! Contact to TAL Support.");
                }
            } else {
                //$flash_msg = validation_errors();
                // $value = '<div class="contact-form-error alert alert-danger d-none mt-4" id="contactError">' . $flash_msg . '</div>';
                // $this->session->set_flashdata('post', $value);
                // //redirect('certificates/serchCertificates');
            }
        }

        $data['downloadFile'] = $downLoadFile;
        $data['navactive'] = 2;
        $data['flash'] = $flash_msg;
        $data['view_file'] = "downCertificate";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }





    function submit()
    {
        $this->load->library('session');
        $submit = $this->input->post('submit', TRUE);


        if ($submit == "Submit Paper") {

            $this->form_validation->set_rules('title', 'Title of Papers', 'Trim|required');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->fetch_data_from_post();

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The Papers details were successfully updated.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('certificates/create/' . $update_id);
                } else {
                    $this->_insert($data);
                    $update_id = $this->get_max();
                    $flash_msg = "The Papers Details was successfully added.";
                    $value = '<div class="alert alert-success" role="alert">' . $flash_msg . '</div>';
                    $this->session->set_flashdata('post', $value);
                    redirect('certificates/create/' . $update_id);
                }
            } else {

                $flash_msg = validation_errors();
                $value = '<div class="alert alert-danger" role="alert"><strong>' . $flash_msg . '</strong></div>';
                $this->session->set_flashdata('post', $value);
                redirect('certificates/create/' . $update_id);
            }
        }


        $data = $this->fetch_data_from_post();


        $data['headline'] = "Update Papers";

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
        $data['fname'] = $this->input->post('fname', TRUE);
        $data['mnumber'] = $this->input->post('mnumber', TRUE);
        return $data;
    }

    function fetch_data_from_db($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {

            $data['paperRef'] = $row->paperRef;
            $data['paperSubDate'] = $row->paperSubDate;
            $data['authorName'] = $row->authorName;
            $data['authorEmail'] = $row->authorEmail;
            $data['authorMobile'] = $row->authorMobile;
            $data['authorCountry'] = $row->authorCountry;
            $data['authorInst'] = $row->authorInst;
            $data['authorCourse'] = $row->authorCourse;
            $data['authorYear'] = $row->authorYear;
            $data['coAuthorName'] = $row->coAuthorName;
            $data['coAuthorEmail'] = $row->coAuthorEmail;
            $data['coAuthorMobile'] = $row->coAuthorMobile;
            $data['coAuthorCountry'] = $row->coAuthorCountry;
            $data['coAuthorInst'] = $row->coAuthorInst;
            $data['coAuthorCourse'] = $row->coAuthorCourse;
            $data['coAuthorYear'] = $row->coAuthorYear;
            $data['paperTitle'] = $row->paperTitle;
            $data['paperMsg'] = $row->paperMsg;
            $data['fileName'] = $row->fileName;
        }

        if (!isset($data)) {
            $data = "";
        }
        return $data;
    }

    function get($order_by)
    {
        $query = $this->mdl_papers->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        $query = $this->mdl_papers->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $query = $this->mdl_papers->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $query = $this->mdl_papers->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->mdl_papers->_insert($data);
    }

    function _update($id, $data)
    {
        $this->mdl_papers->_update($id, $data);
    }

    function _delete($id)
    {
        $this->mdl_papers->_delete($id);
    }

    function count_where($column, $value)
    {
        $count = $this->mdl_papers->count_where($column, $value);
        return $count;
    }

    function get_max()
    {
        $max_id = $this->mdl_papers->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $query = $this->mdl_papers->_custom_query($mysql_query);
        return $query;
    }
}
