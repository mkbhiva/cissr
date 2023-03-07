<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site_security extends MX_Controller {

    function __construct() {
        parent::__construct();
    }
    
    function _check_admin_login_details($username, $pword) {

        $target_username = "admin";
        $target_pass = "pass";
        if(($username == $target_username) && ($pword == $target_pass)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    function generate_random_caps_string($length){
        $characters = '23456789ABCDEFGHJKMNPQRSTUVWXYZ';
        $randomString = '';
        for($i = 0; $i < $length; $i++){
            $randomString .= $characters[rand(0, strlen($characters)-1)];
        }
        return $randomString;
    }

    function generate_random_string($length){
        $characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ';
        $randomString = '';
        for($i = 0; $i < $length; $i++){
            $randomString .= $characters[rand(0, strlen($characters)-1)];
        }
        return $randomString;
    }

    function generate_random_number($length){
        $characters = '0123456789';
        $randomString = '';
        for($i = 0; $i < $length; $i++){
            $randomString .= $characters[rand(0, strlen($characters)-1)];
        }
        return $randomString;
    }
    
    function _hashing_string($str) {
        $hashed_string = password_hash($str, PASSWORD_BCRYPT, array('cost' => 11));
        return $hashed_string;
    }

    
    function _verify_hash($plain_text_str, $hashed_string) {
        $result = password_verify($plain_text_str, $hashed_string);
        return $result;  //True or False
    }
            
    

    function _make_sure_is_admin(){
        $is_admin = $this->session->userdata('is_admin');
        
        if($is_admin==1){
            return TRUE;
        }else{
            redirect('site_security/not_allowed');
        }
    }
    
    function not_allowed(){
        echo "You are not allowed to be here.";
    }

}
