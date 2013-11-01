<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'basecontroller.php';

class Signup extends Basecontroller {

    public function __construct() {
        parent::__construct();
    }

    public function init() {
        $this->data['signup_data'] = $this->session->userdata("signup_data");
        $full_name = $this->data['signup_data']['full_name'];
        $full_name = explode(" ", $full_name);

        $this->data['signup_data']['first_name'] = $full_name[0];
        if (isset($full_name[1]))
            $this->data['signup_data']['last_name'] = $full_name[1];

        $locations = $this->rest->get('location/all', array(), 'json');
        $bloodgroups = $this->rest->get('bloodgroups/all', array(), 'json');

        $this->data['locations'] = $locations;
        $this->data['bloodgroups'] = $bloodgroups;
    }

    public function index() {
        if (!$this->session->userdata('signup_data')) {
            redirect('authenticate/twitter');
        }

        $this->init();
        $this->load_view();
    }

    protected function load_view() {

        $this->data['content'] = $this->load->view(get_prefix() . 'user/signup', $this->data, TRUE);
        $this->load->view(get_layout(), $this->data);
    }

    public function submit() {
        $this->init();

        $email = $this->input->post("email");
        // $password = $this->input->post('password');
        $first_name = $this->input->post("first_name");
        $last_name = $this->input->post("last_name");
        $phone_number = $this->input->post("phone_number");
        //$user_hospitals = $this->input->post("user_hospitals");

        $location_id = $this->input->post("location_id");
        $blood_group = $this->input->post("blood_group");
        $image_path = $this->data['signup_data']['image_path'];
        $username = $this->data['signup_data']['username'];

        $user = compact("email", "first_name", "last_name", "phone_number", "location_id", "blood_group", "image_path", "username");
        $result = $this->rest->post('user/registration', $user, 'json');

        if (isset($result->status) && $result->status) {
            $this->session->unset_userdata("signup_data");
            $result = $this->rest->get('user/get_with_username', array('username' => $username), 'json');
            if (isset($result->status) && $result->status) {
                $this->session->set_userdata("user_id", $result->user->id);
                redirect("user/home");
            } else {
                redirect("/");
            }
        } else {
            if (isset($result->errors)) {
                $this->data['errors'] = $result->errors;
            }
            $this->load_view();
        }
    }

}
