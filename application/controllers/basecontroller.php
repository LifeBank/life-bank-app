<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Basecontroller extends CI_Controller {

    protected $data = array();
    protected $content_data = array();

    public function __construct() {
        parent::__construct();

        $this->data['styles'] = array(
            'utopia-white.css',
            'utopia-responsive.css',
            'validationEngine.jquery.css',
            'ie.css'
        );
        $this->data['scripts'] = array(
            'jquery.min.js',
            'jquery.cookie.js',
            'utopia.js',
            'header.js?v1',
            'sidebar.js',
            'tables.js',
            'jquery.datatable.js',
            'form.js',
            'ajax_response.js'
            
        );
        $this->data['base'] = $this->config->item('base_url');
    }

    protected function addExtraScripts($scripts = array()) {
        $this->data['scripts'] = array_merge($this->data['scripts'], $scripts);
    }

    protected function addExtraStyles($styles = array()) {
        $this->data['styles'] = array_merge($this->data['styles'], $styles);
    }

}

