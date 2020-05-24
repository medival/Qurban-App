<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    private $_table_transaksi = "tb_transaksi";
    private $_table_tabungan = "tb_tabungan";
    // public $_tb_transaksi = 'tb_transaksi';
    // public $_tb_tabungan = 'tb_tabungan';
    public function __construct()
    {
        parent::__construct();
    }

    public function aktivasiuser()
    {
        $post = $this->input->post();
        $this->nis =  $post['nis'];
        $this->saldo = 0;
        $this->nip = NULL;

        $result = $this->db->insert($this->_table_tabungan, $this);
        return $result;
    }

    public function infoDashboard()
    {
        $totalSaldo = $this->db->query(" SELECT SUM(saldo) AS jmlSaldo FROM tb_tabungan")->result_array();
        $totalNasabah = $this->db->query("SELECT COUNT(*) AS jmlNasabah FROM tb_tabungan")->result_array();
        $totalTransaksi = $this->db->query("SELECT COUNT(*) AS jmlTransaksi FROM tb_transaksi")->result_array();
        $totalOperator = $this->db->query("SELECT COUNT(*) as jmlOperator FROM tb_operator AS o JOIN tb_ruang AS r ON r.id_ruang = o.id_ruang")->result_array();

        $data = array(
            'totalSaldo' => $totalSaldo[0]['jmlSaldo'],
            'totalNasabah' => $totalNasabah[0]['jmlNasabah'],
            'totalOperator' => $totalOperator[0]['jmlOperator'],
            'totalTransaksi' => $totalTransaksi[0]['jmlTransaksi'],
        );
        return $data;
    }

    public function list()
    {
        $result = $this->db->query("SELECT t.id_transaksi, t.nis, s.nama, t.tanggal, t.kredit_debet, t.nominal, t.saldo, o.nip, o.nama AS nama_operator
                                    FROM tb_transaksi AS t
                                    JOIN tb_siswa AS s
                                    ON t.nis = s.nis
                                    JOIN tb_operator AS o
                                    ON s.id_ruang = o.id_ruang
                                    ORDER BY t.id_transaksi ASC");
        return $result->result();
    }

    public function getMemberAktif()
    {
        $result = $this->db->query("SELECT s.nis, s.nama, tb.saldo, o.nip
                                    FROM tb_tabungan AS tb
                                    JOIN tb_siswa AS s
                                    ON tb.nis = s.nis
                                    JOIN tb_ruang AS r
                                    ON s.id_ruang = r.id_ruang
                                    JOIN tb_operator AS o
                                    ON o.id_ruang = r.id_ruang");
        return $result->result();
    }

    public function getMemberSaldo_NIP($nis)
    {

        $saldo = $this->db->query(" SELECT saldo
                                    FROM tb_tabungan
                                    WHERE nis = $nis")->result();
        $nip =  $this->db->query("  SELECT nip
                                    FROM tb_operator AS o
                                    JOIN tb_ruang  AS r
                                    ON r.id_ruang = o.id_ruang
                                    JOIN tb_siswa AS s
                                    ON r.id_ruang = s.id_ruang
                                    WHERE s.nis = $nis")->result();
        $result = array(
            'saldo' => $saldo,
            'nip' => $nip
        );
        return $result;
    }

    public function get($nis)
    {
        $result = $this->db->query("SELECT t.id_transaksi, t.nis, s.nama, t.tanggal, t.kredit_debet, t.nominal, t.saldo, o.nip, o.nama AS nama_operator
                                    FROM tb_transaksi AS t
                                    JOIN tb_siswa AS s
                                    ON t.nis = s.nis
                                    JOIN tb_operator AS o
                                    ON s.id_ruang = o.id_ruang
                                    WHERE t.nis = $nis
                                    ORDER BY t.id_transaksi ASC ");
        return $result->result();
    }
}

/* End of file: Transaksi_model.php */
