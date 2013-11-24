<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'basecontroller.php';

class Index extends Basecontroller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $result = $this->rest->get('user/count');
        if (isset($result->status) && $result->status) {
            $this->data['lifebankers_count'] = $result->count;
        } else {
            $this->data['lifebankers_count'] = 0;
        }

        $l_result = $this->rest->get('user/random');
        if (isset($l_result->status) && $l_result->status) {
            $this->data['lifebankers'] = $l_result->users;
        } else {
            $this->data['lifebankers'] = array();
        }

        $this->data['content'] = $this->load->view(get_prefix() . 'index', $this->data, TRUE);

        $this->load->view(get_layout(), $this->data);
    }

}
