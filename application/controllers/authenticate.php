<?php

/**
 * Description of Authenticate
 *
 * @author kayfun
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'basecontroller.php';

class Authenticate extends Basecontroller {

    public function __construct() {
        parent::__construct();

        if ($this->router->fetch_method() == 'twitter' || $this->router->fetch_method() == 'twitter_callback') {
            if ($this->session->userdata('signup_data')) {                
                //redirect('user/signup');
            }
            $this->load->library('Twitteroauth');
        }
    }

    public function index() {
        
    }

    public function twitter() {
        session_start();
        $code = $this->twitteroauth->apponly_request(array(
            'without_bearer' => true,
            'method' => 'POST',
            'url' => $this->twitteroauth->url('oauth/request_token', ''),
            'params' => array(
                'oauth_callback' => $this->data['base'] . 'authenticate/twitter_callback',
            ),
        ));

        if ($code != 200) {
            echo $code;
            /**
             * @todo Show error page 
             */
        } else {
            $response = $this->twitteroauth->extract_params($this->twitteroauth->response['response']);

            $this->session->set_userdata('oauth', $response);
            $url = $this->twitteroauth->url('oauth/authorize', '') . "?oauth_token={$response['oauth_token']}";
            redirect($url);
        }
    }

    public function twitter_callback() {
        $params = uri_params();
        $oauth = $this->session->userdata('oauth');
        if ($params['oauth_token'] !== $oauth['oauth_token']) {
            $this->session->unset_userdata('oauth');

            /**
             * @todo show error "The oauth token you started with doesn\'t match the one you\'ve been redirected with. do you have multiple tabs open?" and exit
             */
        }

        if (!isset($params['oauth_verifier'])) {
            $this->session->unset_userdata('oauth');

            /**
             * @todo show error "The oauth verifier is missing so we cannot continue. did you deny the appliction access?" and exit
             */
        }

        $this->twitteroauth->reconfigure(array_merge($this->twitteroauth->config, array(
            'token' => $oauth['oauth_token'],
            'secret' => $oauth['oauth_token_secret'],
        )));

        $code = $this->twitteroauth->user_request(array(
            'method' => 'POST',
            'url' => $this->twitteroauth->url('oauth/access_token', ''),
            'params' => array(
                'oauth_verifier' => trim($params['oauth_verifier']),
            )
        ));

        if ($code == 200) {
            $oauth_creds = $this->twitteroauth->extract_params($this->twitteroauth->response['response']);
            $this->twitteroauth->reconfigure(array_merge($this->twitteroauth->config, array(
                'token' => $oauth_creds['oauth_token'],
                'secret' => $oauth_creds['oauth_token_secret'],
            )));

            $result = $this->twitteroauth->user_request(array(
                'method' => 'GET',
                'url' => $this->twitteroauth->url('1.1/users/show'),
                'params' => array(
                    "user_id" => $oauth_creds['user_id'],
                    "screen_name" => $oauth_creds['screen_name']
                )
            ));

            $result = $this->twitteroauth->response['response'];
            $result = json_decode($result);

            $username = $result->screen_name;
            $full_name = $result->name;
            $image_path = $result->profile_image_url;

            $signup_data = compact("username", "full_name", "image_path");
            $this->session->set_userdata('signup_data', $signup_data);

            $result = $this->rest->get('user/get_with_username', array('username' => $username), 'json');
            if (isset($result->status) && !$result->status) {
                redirect("user/signup");
            } else {
                $this->session->set_userdata("user_id", $result->user->id);
                redirect("user/home");
            }
        } else {
            echo $code;
        }
    }

}

?>
