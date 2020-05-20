<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $data = array(
            'title' => 'Login'
        );
        $this->load->view('auth/auth_login', $data);
    }
}

/* End of file: Auth.php */
