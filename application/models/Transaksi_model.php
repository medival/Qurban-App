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
        $this->nis = $post['nis'];
        $this->saldo = 0;
        $this->nip = null;

        $result = $this->db->insert($this->_table_tabungan, $this);
        return $result;
    }

    public function infoDashboard()
    {
        $totalSaldo = $this->db->query(" SELECT SUM(saldo) AS jmlSaldo FROM tb_tabungan")->result_array();
        $totalNasabah = $this->db->query("SELECT COUNT(*) AS jmlNasabah FROM tb_tabungan")->result_array();
        $totalTransaksi = $this->db->query("SELECT COUNT(*) AS jmlTransaksi FROM tb_transaksi")->result_array();
        $totalOperator = $this->db->query("SELECT COUNT(*) as jmlOperator FROM tb_user AS u JOIN tb_ruang AS r ON r.id_ruang = u.id_ruang")->result_array();
        $totalSiswa = $this->db->query("SELECT COUNT(*) AS jmlSiswa FROM tb_siswa")->result_array();

        $data = array(
            'totalSaldo' => $totalSaldo[0]['jmlSaldo'],
            'totalNasabah' => $totalNasabah[0]['jmlNasabah'],
            'totalOperator' => $totalOperator[0]['jmlOperator'],
            'totalTransaksi' => $totalTransaksi[0]['jmlTransaksi'],
            'totalSiswa' => $totalSiswa[0]['jmlSiswa'],
        );
        return $data;
    }

    public function Alllist()
    {
        $result = $this->db->query("SELECT t.id_transaksi, t.nis, s.nama, t.tanggal, t.kredit_debet, t.nominal, t.saldo, u.nip, u.name AS nama_operator FROM tb_transaksi t JOIN tb_siswa s ON t.nis = s.nis JOIN tb_kelas_siswa ks ON t.nis = ks.nis JOIN tb_user u ON ks.id_ruang = u.id_ruang WHERE u.role = 2 ORDER BY t.id_transaksi ASC;")->result();
        return $result;
    }

    public function getMemberSaldo_NIP($nis)
    {

        $saldo = $this->db->query(" SELECT saldo
                                    FROM tb_tabungan
                                    WHERE nis = $nis")->result();
        $nip = $this->db->query("  SELECT nip FROM tb_user u JOIN tb_ruang r ON r.id_ruang = u.id_ruang JOIN tb_kelas_siswa ks ON r.id_ruang = ks.id_ruang JOIN tb_siswa s ON ks.nis = s.nis WHERE s.nis = $nis")->result();
        $result = array(
            'saldo' => $saldo,
            'nip' => $nip,
        );
        return $result;
    }

    public function get($nis)
    {
        // var_dump($nis);
        $result = $this->db->query("SELECT t.id_transaksi, t.nis, s.nama, t.tanggal, t.kredit_debet, t.nominal, t.saldo, u.nip, u.name AS nama_operator FROM tb_transaksi AS t JOIN tb_siswa s ON t.nis = s.nis JOIN tb_kelas_siswa ks ON s.nis = ks.nis JOIN tb_user u ON ks.id_ruang = u.id_ruang WHERE t.nis = $nis ORDER BY t.id_transaksi ASC;")->result();
        return $result;
    }

    public function gettransaksi($id_ruang)
    {
        $result = $this->db->query("SELECT t.id_transaksi, t.nis, s.nama, t.tanggal, t.kredit_debet, t.nominal, t.saldo, u.nip, u.name AS nama_operator, ta.tahun FROM tb_transaksi AS t JOIN tb_siswa s ON t.nis = s.nis JOIN tb_kelas_siswa ks ON s.nis = ks.nis JOIN tb_user u ON ks.id_ruang = u.id_ruang JOIN tb_tahun ta ON ks.id_tahun = ta.id_tahun WHERE ks.id_ruang = $id_ruang ORDER BY t.id_transaksi ASC;")->result();
        return $result;
    }

    public function getTransaksiByNis($nis)
    {
        $query = $this->db->query("SELECT t.*, s.nama, r.ruang, k.kelas FROM tb_transaksi t JOIN tb_siswa s ON t.nis = s.nis JOIN tb_kelas_siswa ks ON s.nis = ks.nis JOIN tb_ruang r ON ks.id_ruang = r.id_ruang JOIN tb_kelas k ON r.id_kelas = k.id_kelas JOIN tb_tahun ta ON ks.id_tahun = ta.id_tahun WHERE t.nis = $nis and ta.is_active = 1 ORDER BY t.id_transaksi DESC limit 1;");

        return $query->result();
    }
}

/* End of file: Transaksi_model.php */
