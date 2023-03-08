<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site_settings extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function _get_company()
    {
        $company = "SSR Foundation";
        return $company;
    }

    function _get_our_address()
    {
        $our_address = " <br> <b> Correspondence Add: </b> C-72, New Ashok Nagar near MCD School, New Delhi-110096";

        $our_address .= " <br> <!--- <b>Permanent Add:</b> New Area Hamidganj
        Daltonganj, Palamu, Jharkhand-822101 --->";
        return $our_address;
    }

    function _get_our_telnum()
    {
        $telnum = "805-235-1466";
        return $telnum;
    }

    function _get_our_email()
    {
        $our_email = "info@theadvocatesleague.in";
        return $our_email;
    }

    function _get_post_segments()
    {
        $segments = "blog/article/";
        return $segments;
    }

    function _get_posts_segments()
    {
        $segments = "blog/articles/";
        return $segments;
    }

    function _get_page_not_found_msg()
    {
        $msg = "<h1>This page not found at our website !!!</h1>";
        $msg .= "<p>Please check your link is not proper.</p>";
        return $msg;
    }
}
