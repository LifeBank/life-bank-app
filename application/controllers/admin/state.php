<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'basecontroller.php';

class State extends Basecontroller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {        
        $this->data['page'] = "state";

        $result = $this->rest->get('state/all', array(), 'json');
        if(isset($result->status) && $result->status) {
            $this->data['states'] = $result->states;
        } else {
            $this->data['states'] = array();
        }
        $this->data['content'] = $this->load->view('admin/state', $this->data, TRUE);
        $this->load->view('layout/admin', $this->data);
    }

}
