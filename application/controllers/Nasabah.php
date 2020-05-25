<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nasabah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
    }

    public function data($nis)
    {
        $data = $this->transaksi_model->get($nis);
        // echo json_encode($data);
    }

    public function ceksaldo($nis)
    {
        $data = array(
            'title' => 'Nasabah'
        );
        // $data = $this->transaksi_model->get($nis);
        // echo json_encode($data);
        $this->load->view('nasabah/v_ceksaldo', $data);
    }
}

/* End of file: Nasabah.php */
