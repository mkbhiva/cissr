<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contactus extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI = & $this;
        $this->load->library('session');
    }


    function thankyou(){
        $data['flash'] = $this->session->flashdata('post');
        $data['view_file'] = "thankyou";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }


    function send_email($formdata) {
        $config['protocol'] = 'smtp';
        $config['smtp_crypto'] = 'ssl';
        $config['charset'] = 'utf-8';
        $config['smtp_host'] = 'mail.theadvocatesleague.in';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'info@theadvocatesleague.in';
        $config['smtp_pass'] = 'taladmin@123';
        $config['mailtype'] = 'html';

        $from_name = $formdata['from_name'];
        $from_telnum = $formdata['from_telnum'];
        $from_email = $formdata['from_email'];
        $from_message = $formdata['from_message'];


        $this->email->initialize($config);

        $this->email->set_newline("\r\n");
        $this->email->from('info@theadvocatesleague.in', 'TAL - The Advocates League');
        $this->email->to($from_email);
        $this->email->bcc('info@theadvocatesleague.in');

        $this->email->subject('theadvocatesleague.in thankful to you - '.$from_name);
        $email_message = '<h2>Hi '.$from_name.',</h2>';
        $email_message .= '<h4>Thank you very much for contacting us.</h4>';
        $email_message .= 'Your details with theadvocatesleague.in are :<br/>';
        $email_message .= 'Your Name - '.$from_name.'<br/>';
        $email_message .= 'Your Contact - '.$from_telnum.'<br/>';
        $email_message .= 'Your Email Address - '.$from_email.'<br/>';
        $email_message .= 'Your Message - '.$from_message.'<br/><br/>';
        $email_message .= 'Our TAL Team will contact you soon.<br/><br/>';
        $email_message .= 'With Regards,<br/><br/>';
        $email_message .= '<strong>TAL Team</strong><br/>';

        $this->email->message($email_message);

        if($this->email->send()){
            $flash_msg = "Contact form was successfully submitted. We will be in touch with you shortly.";
            $value = '<div class="contact-form-success alert alert-success d-none mt-4" id="contactSuccess">' . $flash_msg . '</div>';
            $this->session->set_flashdata('post', $value);
            redirect('contactus/index','refresh');
         } else {
            $flash_msg = "We are facing some problem with email sending.";
            $value = '<div class="contact-form-error alert alert-danger d-none mt-4" id="contactError">' . $flash_msg . '</div>';
            $this->session->set_flashdata('post', $value);
            redirect('contactus/index','refresh');
         }
    }


    function submit(){

        $submit = $this->input->post('c_send', TRUE);


        if ($submit == "Send Message") {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('c_name', 'Your Name', 'Trim|required|min_length[3]|max_length[65]');
            $this->form_validation->set_rules('c_telnum', 'Contact Number', 'Trim|required|numeric|min_length[10]|max_length[15]');
            $this->form_validation->set_rules('c_email', 'Email', 'Trim|required|valid_email');
            $this->form_validation->set_rules('c_message', 'Message', 'Trim|required|max_length[450]');


            if ($this->form_validation->run() == TRUE) {

                $formdata['from_name']= $this->input->post('c_name',TRUE);
                $formdata['from_telnum']= $this->input->post('c_telnum',TRUE);
                $formdata['from_email']= $this->input->post('c_email',TRUE);
                $formdata['from_message']= $this->input->post('c_message',TRUE);
                $this->send_email($formdata);

            } else {
                $flash_msg = validation_errors();
                //$flash_msg = 'Not Send, Getting some errors.  Please send again.';
                $value = '<div class="contact-form-error alert alert-danger d-none mt-4" id="contactError">' . $flash_msg . '</div>';
                $this->session->set_flashdata('post', $value);
                $this->index();
            }
        }
        
    }


    function fetch_data_from_post() {
        $data['c_name'] = $this->input->post('c_name', TRUE);
        $data['c_telnum'] = $this->input->post('c_telnum', TRUE);
        $data['c_email'] = $this->input->post('c_email', TRUE);
        $data['c_message'] = $this->input->post('c_message', TRUE);

        return $data;
    }
    
    function index() {
        $this->load->module('site_settings');
        $data = $this->fetch_data_from_post();
        $data['our_company'] = $this->site_settings->_get_company();
        $data['our_address'] = $this->site_settings->_get_our_address();
        $data['our_telnum'] = $this->site_settings->_get_our_telnum();
        $data['our_email'] = $this->site_settings->_get_our_email();
        $data['flash'] = $this->session->flashdata('post');
        $data['navactive'] = 7;
        $data['view_file'] = "contactus";
        $this->load->module('templates');
        $this->templates->public_bootstrap($data);
    }

}
