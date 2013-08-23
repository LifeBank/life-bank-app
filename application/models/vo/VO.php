<?php

class VO {

    protected $CI = null;
    protected $errors = array();

    public function __construct() {
        $this->CI = & get_instance();
    }

    public function getId() {
        return $this->id;
    }

    public function getErrors() {
        return $this->errors;
    }

    public function addError($error) {
        $this->errors[] = $error;
    }

    public function isActive() {
        return $this->active;
    }

}

?>