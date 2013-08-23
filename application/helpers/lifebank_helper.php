<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('uri_params')) {

    function uri_params() {
        $url = parse_url($_SERVER['REQUEST_URI']);
        $params = array();
        foreach (explode('&', $url['query']) as $p) {
            list($k, $v) = explode('=', $p);
            $params[$k] = $v;
        }
        return $params;
    }

}

if (!function_exists('get_layout')) {

    function get_layout($is_home = false) {
        // $ci = & get_instance();
        if (is_mobile()) {
            return 'layout/mobile';
        } else {
            if ($is_home)
                return 'layout/home';
            return 'layout/main';
        }
    }

}


if (!function_exists('get_prefix')) {

    function get_prefix() {
        if (is_mobile()) {
            return 'mobile/';
        } else {
            return '/';
        }
    }

}


if (!function_exists('is_mobile')) {

    function is_mobile() {
        /* Assume a responsive template */
        
        return false;
        $CI = &get_instance();

        if ($CI->input->cookie('load-web'))
            return false;

        $CI->load->library('user_agent');
        $isIpad = (bool) strpos($_SERVER['HTTP_USER_AGENT'], 'iPad');

        if ($isIpad)
            return false;

        if ($CI->agent->is_mobile()) {
            return true;
        } else
            return false;
    }

}


if (!function_exists('redirect_to_last_url')) {

    function redirect_to_last_url() {
        $CI = & get_instance();
        if ($CI->session->userdata('last_url')) {
            $url = $CI->config->item('base_url') . $CI->session->userdata('last_url');
            $CI->session->unset_userdata('last_url');
            redirect($url);
            exit();
        } else {
            redirect("home");
        }

        return false;
    }

}
?>
