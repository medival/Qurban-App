<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nasabah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
    }
    public function ceksaldo()
    {
        $data = array(
            'title' => 'Nasabah'
        );
        $this->load->view('nasabah/v_ceksaldo', $data);
    }

    public function getrekap($nis)
    {
        $data = $this->transaksi_model->getrekapdata($nis);
        echo json_encode($data);

        // var_dump($data);
    }
}

/* End of file: Nasabah.php */
