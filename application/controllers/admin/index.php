<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'basecontroller.php';

class Index extends Basecontroller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['content'] = "";
        $this->load->view('layout/admin', $this->data);
    }

}

