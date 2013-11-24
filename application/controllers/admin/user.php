<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'basecontroller.php';

class User extends Basecontroller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['page'] = "user";

        $result = $this->rest->get('user/list');
        if (isset($result->status) && $result->status) {
            $this->data['users'] = $result->users;
        } else {
            $this->data['users'] = array();
        }

        $this->data['content'] = $this->load->view('admin/user', $this->data, TRUE);
        $this->load->view('layout/admin', $this->data);
    }

}
