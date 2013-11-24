<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'basecontroller.php';

class Hospital extends Basecontroller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['page'] = "hospital";

        $result = $this->rest->get('hospital/list');
        if (isset($result->status) && $result->status) {
            $this->data['hospitals'] = $result->hospitals;
        } else {
            $this->data['hospitals'] = array();
        }


        $this->data['content'] = $this->load->view('admin/hospital', $this->data, TRUE);
        $this->load->view('layout/admin', $this->data);
    }

    public function locations($hospital_id) {
        $hospital_id = (int) $hospital_id;
        $result = $this->rest->get('hospital/get_locations', array("hospital_id" => $hospital_id));

        if (isset($result->status) && $result->status) {
            $this->data['locations'] = $result->locations;
            $this->data['hospital'] = $result->hospital;
            $this->data['all_locations'] = $result->all_locations;
        } else {
            $this->data['error'] = "An error occured";
        }
        $this->load->view('admin/hospital_location', $this->data);
    }

    public function broadcast($hospital_id) {
        $hospital_id = (int) $hospital_id;
        $result = $this->rest->get('hospital/get', array("hospital_id" => $hospital_id));

        if (isset($result->status) && $result->status) {
            $this->data['hospital'] = $result->hospital;
        } else {
            $this->data['error'] = "An error occured";
        }
        $this->load->view('admin/hospital_broadcast', $this->data);
    }

    public function submit_location() {
        $hospital_id = (int) $this->input->post("hospital_id");
        $location_id = (int) $this->input->post("location_id");

        $this->rest->post('hospital/add_location', array("location_id" => $location_id, "hospital_id" => $hospital_id));
    }

    public function submit_broadcast() {
        $hospital_id = (int) $this->input->post("hospital_id");
        $message = $this->input->post("message");

        $this->rest->post('hospital/broadcast', array("message" => $message, "hospital_id" => $hospital_id));
    }

    public function delete_location($hospital_id, $location_id) {
        $this->rest->post('hospital/delete_location', array("location_id" => (int) $location_id, "hospital_id" => (int) $hospital_id));

        $this->session->set_flashdata('message', 'Hospital location deleted successfully');
        redirect('/admin/hospital');
    }

    public function delete($hospital_id = 0) {
        $hospital_id = (int) $hospital_id;
        if (!$hospital_id) {
            redirect('admin/hospital');
        }

        $this->rest->get('hospital/delete', array("hospital_id" => $hospital_id));
        $this->session->set_flashdata('message', 'Hospital deleted successfully');
        redirect("admin/hospital");
    }

    public function submit() {
        $this->form_validation->set_rules('hospital_name', 'Hospital Name', 'trim|required');
        $this->form_validation->set_rules('address', 'Hospital Address', 'trim|required');

        $hospital_name = $this->input->post("hospital_name");
        $address = $this->input->post("address");
        $phone_numbers = $this->input->post("phone_numbers");

        if ($this->form_validation->run() == FALSE) {
            $result = set_response("error", validation_errors());
        } else {
            $hospital = compact("hospital_name", "address", "phone_numbers");
            $result = $this->rest->post('hospital/add', $hospital, 'json');
            //var_dump($result);
            if (isset($result->status) && $result->status) {
                if (isset($result->status) && $result->status) {
                    $result = set_response("success", "");
                    $this->session->set_flashdata("message", "Hospital added successfully");
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
