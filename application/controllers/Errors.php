<?php
class Errors extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = array(
            'title' => "Qurban App",
            'sess' => $this->session->all_userdata(),
        );
        $this->output->set_status_header('404');
        $this->load->view('errors/custom/error_404.php', $data);
    }
}
