<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once APPPATH . "/third_party/tmhoauth/tmhOAuth.php";

class Twitteroauth extends tmhOAuth {

    public function __construct() {
        $this->ci = & get_instance();

        $config = array(
            // change the values below to ones for your application
            'consumer_key' => $this->ci->config->item('twitter_consumer_key'),
            'consumer_secret' => $this->ci->config->item('twitter_consumer_secret'),
            'token' => $this->ci->config->item('twitter_token'),
            'secret' => $this->ci->config->item('twitter_secret'),
            'user_agent' => 'tmhOAuth ' . parent::VERSION 
        );
        
        parent::__construct($config);
    }

}