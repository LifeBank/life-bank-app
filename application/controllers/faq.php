<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'basecontroller.php';

class Faq extends Basecontroller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['content'] = $this->load->view(get_prefix() . 'faq', $this->data, TRUE);
        $this->load->view(get_layout(), $this->data);
    }

}
