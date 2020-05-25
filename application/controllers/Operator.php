<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('operator/index', 'refresh');
        }
    }

    public function index()
    {
        echo 'Login Operator';
    }
}

/* End of file: Operator.php */
