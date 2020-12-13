<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ceksaldo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
    }

    public function index()
    {
        $data = array(
            'title' => 'Cek Saldo',
        );
        $this->load->view('nasabah/v_ceksaldo', $data);
    }

    public function getrekap($nis)
    {
        $data = $this->transaksi_model->get($nis);
        echo json_encode($data);
    }
}

/* End of file: Ceksaldo.php */
