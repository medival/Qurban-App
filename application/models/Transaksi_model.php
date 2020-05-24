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

    public function list()
    {
        $result = $this->db->query("SELECT t.id_transaksi, t.nis, s.nama, t.tanggal, t.kredit_debet, t.nominal, t.saldo, o.nip, o.nama AS nama_operator
                                    FROM tb_transaksi AS t
                                    JOIN tb_siswa AS s
                                    ON t.nis = s.nis
                                    JOIN tb_operator AS o
                                    ON s.id_ruang = o.id_ruang");
        return $result->result();
    }

    public function getMemberAktif()
    {
        $result = $this->db->query("SELECT t.nis, t.saldo, t.nip, s.nama
                                    FROM tb_tabungan AS t
                                    JOIN tb_siswa AS s
                                    ON t.nis = s.nis
                                    JOIN tb_ruang AS r
                                    ON s.id_ruang = r.id_ruang");
        return $result->result();
    }

    public function getMemberSaldo($nis)
    {
        $result = $this->db->query("SELECT saldo
                                    FROM tb_tabungan
                                    WHERE nis = $nis");
        return $result->result();
    }

    public function input()
    {
        $data = array(
            'nis' => $this->input->post('nis'),
            'nominal' => $this->input->post('nominal'),
            'kredit_debet' => $this->input->post('kredit_debet'),
            'tanggal' => strtotime("now"),
            'saldo' => NULL,
            'nip' => NULL
        );
        $this->db->insert('tb_transaksi', $data);
        // return $result->result();
    }

    public function get($nis)
    {
        $result = $this->db->query("SELECT t.id_transaksi, t.nis, t.tanggal, t.saldo AS t_saldo, t.kredit_debet, tb.nip, tb.saldo, t.nominal,  s.nama, s.created_at, r.id_ruang, k.kelas, r.ruang
                                    FROM tb_transaksi AS t
                                    JOIN tb_siswa AS s
                                    ON t.nis = s.nis
                                    AND t.nis = $nis
                                    JOIN tb_ruang AS r
                                    ON s.id_ruang = r.id_ruang
                                    JOIN tb_tabungan AS tb
                                    ON t.nis = tb.nis
                                    JOIN tb_kelas AS k
                                    ON r.id_kelas = k.id_kelas
                                    ORDER BY t.id_transaksi ASC
                                    ");
        return $result->result();
    }
}

/* End of file: Transaksi_model.php */
