<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'basecontroller.php';

class Login extends Basecontroller {

    public function __construct() {
        parent::__construct();
    }

    public function init() {
        
    }

    public function index() {
        $this->init();
        $this->load_view();
    }

    protected function load_view() {
        $this->data['content'] = $this->load->view(get_prefix() . 'user/login', $this->data, TRUE);
        $this->load->view(get_layout(), $this->data);
    }

    public function submit() {
        $this->init();

        $email = $this->input->post("email");
        $password = $this->input->post('password');

        $login = compact("email", "password");
        $result = $this->rest->post('user/login', $login, 'json');

        if (isset($result->status) && $result->status) {
            $this->session->set_userdata("user_id", $result->user->id);
            redirect("user/home");
        } else {
            
            $this->data['errors'] = (isset($result->errors)) ? $result->errors : array("An error occured");
            $this->load_view();
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('/');
    }

}

