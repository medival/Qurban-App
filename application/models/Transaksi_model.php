<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    protected $_tb_transaksi = 'tb_transaksi';
    protected $_tb_tabungan = 'tb_tabungan';

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('tb_operator');
        // $this->load->model('tb_nasabah');
    }

    public function aktivasiuser()
    {
        $post = $this->input->post();
        $this->nis =  $post['nis'];
        $this->saldo = 0;
        // $nip = 
        // $this->nip = $nip;

        $result = $this->db->insert('tb_tabungan', $this);
        return $result;
    }
}

/* End of file: Transaksi_model.php */
