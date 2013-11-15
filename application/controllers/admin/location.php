<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'basecontroller.php';

class Location extends Basecontroller {

    public function __construct() {
        parent::__construct();
    }

    public function index($state_id = 1) {
        $this->data['page'] = "location";

        $state_id = (int) $state_id;
        $state_id = ( $state_id ) ? $state_id : 1;


        $result = $this->rest->get('location/list', array("state_id" => $state_id), 'json');
        if (isset($result->status) && $result->status) {
            $this->data['locations'] = $result->locations;
            $this->data['state'] = $result->state;
        } else {
            $this->data['locations'] = array();
        }


        $this->data['content'] = $this->load->view('admin/location', $this->data, TRUE);
        $this->load->view('layout/admin', $this->data);
    }

    public function delete($location_id = 0) {
        $location_id = (int) $location_id;
        if (!$location_id) {
            redirect('admin/location');
        }

        $this->rest->get('location/delete', array("location_id" => $location_id));
        $this->session->set_flashdata('message', 'Location successfully deleted.');
        redirect("admin/location");
    }

    public function submit() {
        $this->form_validation->set_rules('location', 'Location', 'trim|required');
        $this->form_validation->set_rules('short_name', 'Short Name', 'trim|required');

        $state_id = $this->input->post("state_id");
        $parent_id = $this->input->post("parent_id");
        $location = $this->input->post("location");
        $short_name = $this->input->post("short_name");

        if ($this->form_validation->run() == FALSE) {
            $result = set_response("error", validation_errors());
        } else {
            $location = compact("state_id", "parent_id", "location", "created_by", "short_name");
            $result = $this->rest->post('location/add', $location, 'json');
            //var_dump($result);
            if (isset($result->status) && $result->status) {
                if (isset($result->status) && $result->status) {
                    $result = set_response("success", "");
                    $this->session->set_flashdata("message", "Location added successfully");
                } else {
                    $this->form_validation->set_error("An error occured");
                    $result = set_response("error", validation_errors());
                }
            } else {
                if (isset($result->errors)) {
                    foreach ($result->errors as $error) {
                        $this->form_validation->set_error($error);
                    }
                } else {
                    $this->form_validation->set_error("An error occured");
                }
                $result = set_response("error", validation_errors());
            }
        }

        echo $result;
    }

}
