<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * MY_Form_validation Class
 *
 * Extends Form_Validation library
 *
 * Allows for custom error messages to be added to the error array
 *
 * Note that this update should be used with the
 * form_validation library introduced in CI 1.7.0
 */
class MY_Form_validation extends CI_Form_validation {

    public function __construct() {
        parent::__construct();
    }

    // --------------------------------------------------------------------

    /**
     * Set Error
     *
     * @access  public
     * @param   string
     * @return  bool
     */
    public function set_error($error = '') {
        if (empty($error)) {
            return FALSE;
        } else {
            $CI = & get_instance();

            $CI->form_validation->_error_array['custom_error'] = $error;

            return TRUE;
        }
    }

}

?>