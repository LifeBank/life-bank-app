<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'basecontroller.php';

class Home extends Basecontroller {

    public function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('user_id'))
            redirect('/');
    }

    public function init() {      

        $locations = $this->rest->get('locations/all', array(), 'json');
        $bloodgroups = $this->rest->get('bloodgroups/all', array(), 'json');

        $this->data['locations'] = $locations;
        $this->data['bloodgroups'] = $bloodgroups;
    }

    public function index() {
        $this->init();
        $this->load_view();
    }

    public function update() {
        $this->init();

        $first_name = $this->input->post("first_name");
        $last_name = $this->input->post("last_name");
        $phone_number = $this->input->post("phone_number");
        $location = $this->input->post("location");
        $blood_group = $this->input->post("blood_group");
        $id = $this->session->userdata('user_id');

        $user = compact("first_name", "last_name", "phone_number", "location", "blood_group", "id");
        $result = $this->rest->post('user/update', $user, 'json');

        if ($result->status) {
            redirect("user/home");
        } else {
            $this->data['errors'] = $result->errors;
            $this->load_view();
        }
    }

    protected function load_view() {
        $this->data['content'] = $this->load->view(get_prefix() . 'user/home', $this->data, TRUE);
        $this->load->view(get_layout(), $this->data);
    }

}

