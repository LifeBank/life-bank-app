<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'basecontroller.php';

class Login extends Basecontroller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->setPageData();
        $this->load->view('hospital/login', $this->data);
    }

    private function setPageData() {
        $this->data['title'] = "Login";
    }

    public function submit() {

        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            redirect("/hospital/login", "location");
        }

        $this->load->library('MY_Form_validation');

        $data = $this->data;
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $error_occured = false;

        if ($this->form_validation->run() == FALSE) {
            $error_occured = true;
        } else {
            $identity = $this->input->post("email");
            $password = $this->input->post("password");

            if (true) {
                $this->form_validation->set_error("Invalid email and password combination");
                $error_occured = true;
            }
        }


        if ($error_occured) {
            $this->data['validator'] = true;

            $this->setPageData();
            $this->load->view('hospital/login', $this->data);
        } else {
            $this->session->set_userdata('hospital_admin', 1);
            redirect("/hospital/user", "location");
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect("admin/login");
    }

}

