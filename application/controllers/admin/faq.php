<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'basecontroller.php';

class Faq extends Basecontroller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['page'] = "faq";

       

        $result = $this->rest->get('faq/list');
        if (isset($result->status) && $result->status) {
            $this->data['faqs'] = $result->faqs;
        } else {
            $this->data['faqs'] = array();
        }

        $this->data['content'] = $this->load->view('admin/faq', $this->data, TRUE);
        $this->load->view('layout/admin', $this->data);
    }

    public function delete($faq_id = 0) {
        $faq_id = (int) $faq_id;
        if (!$faq_id) {
            redirect('admin/faq');
        }

        $this->rest->get('faq/delete', array("faq_id" => $faq_id));
        $this->session->set_flashdata('message', 'FAQ successfully deleted.');
        redirect("admin/faq");
    }

    public function submit() {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('faq', 'FAQ', 'trim|required');

        $title = $this->input->post("title");
        $faq = $this->input->post("faq");

        if ($this->form_validation->run() == FALSE) {
            $result = set_response("error", validation_errors());
        } else {
            $location = compact("title", "faq");
            $result = $this->rest->post('faq/add', $location, 'json');
            //var_dump($result);
            if (isset($result->status) && $result->status) {
                if (isset($result->status) && $result->status) {
                    $result = set_response("success", "");
                    $this->session->set_flashdata("message", "FAQ added successfully");
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
