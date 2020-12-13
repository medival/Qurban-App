<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator_model extends CI_Model
{

    protected $_tb_operator = 'tb_operator';

    public function __construct()
    {
        parent::__construct();
    }

    public function info_dashboard($id_ruang)
    {
        $memberAktif = $this->db->query("SELECT COUNT(*) as jmlMemberAktif
                                        FROM tb_tabungan AS tb
                                        JOIN tb_siswa AS s
                                        ON tb.nis = s.nis
                                        WHERE s.id_ruang = $id_ruang")->row();
        $totalSaldo = $this->db->query("SELECT SUM(tb.saldo) AS jmlSaldo
                                        FROM tb_tabungan AS tb
                                        JOIN tb_siswa AS s
                                        ON tb.nis = s.nis
                                        WHERE s.id_ruang = $id_ruang")->row();
        $jumlahTransaksi = $this->db->query("SELECT COUNT(*) AS jmlTransaksi
                                        FROM tb_transaksi AS t
                                        JOIN tb_siswa AS s
                                        ON t.nis = s.nis
                                        WHERE s.id_ruang = $id_ruang")->row();
        $jumlahSiswa = $this->db->query("SELECT COUNT(*) AS jmlSiswa
                                        FROM tb_siswa
                                        WHERE id_ruang = $id_ruang")->row();
        $info = array(
            'memberAktif' => $memberAktif,
            'totalSaldo' => $totalSaldo,
            'jumlahtransaksi' => $jumlahTransaksi,
            'jumlahSiswa' => $jumlahSiswa,
        );
        return $info;
    }
    public function getAll()
    {
        $query = $this->db->query(" SELECT o.nip, o.nama, o.is_active, o.created_at, o.jenis_kelamin, o.id_ruang,  r.id_kelas, k.kelas, r.ruang
                                    FROM tb_operator AS o
                                    JOIN tb_ruang AS r
                                    ON r.id_ruang = o.id_ruang
                                    JOIN tb_kelas AS k
                                    ON r.id_kelas = k.id_kelas");
        return $query->result();
    }

    public function input()
    {
        $post = $this->input->post();
        $this->nip = $post['nip'];
        $this->nama = trim($post['nama']);
        $this->jenis_kelamin = $post['jenis_kelamin'];
        $this->id_ruang = $post['id_ruang'];
        $this->created_at = strtotime("now");

        $result = $this->db->insert($this->_tb_operator, $this);
        return $result;
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nip = $post['nip'];
        $this->nama = trim($post['nama']);
        $this->jenis_kelamin = $post['jenis_kelamin'];
        $this->id_ruang = $post['id_ruang'];

        $result = $this->db->update($this->_tb_operator, $this, array('nip' => $post['nip']));
        return $result;
    }

    public function delete()
    {
        $post = $this->input->post();
        $this->nip = $post['nip'];

        $result = $this->db->delete($this->_tb_operator, array('nip' => $post['nip']));
        return $result;
    }
}

/* End of file: Operator_mode.php */
