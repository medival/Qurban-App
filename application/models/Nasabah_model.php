<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nasabah_model extends CI_Model
{

    protected $_tb_siswa = 'tb_siswa';

    public function __construct()
    {
        parent::__construct();
    }

    public function getsummary($nis)
    {
        $infoBasic = $this->db->query("SELECT s.nis, s.nama, k.kelas, r.ruang, u.name AS nama_operator, s.created_at
                                                FROM tb_siswa AS s
                                                JOIN tb_ruang AS r
                                                ON s.id_ruang = r.id_ruang
                                                JOIN tb_kelas AS k
                                                ON r.id_kelas = k.id_kelas
                                                JOIN tb_user AS u
                                                ON u.id_ruang = r.id_ruang
                                                WHERE s.nis = $nis LIMIT 1")->result();
        $infoTransaksi = $this->db->query("SELECT t.tanggal AS lasttransaksi, tb.saldo
                                                FROM tb_tabungan as tb
                                                JOIN tb_transaksi as t
                                                WHERE tb.nis = $nis
                                                ORDER BY id_transaksi DESC LIMIT 1")->result();
        $jumlahtransaksi = $this->db->query("SELECT COUNT(*) as jml
                                                FROM tb_transaksi
                                                WHERE nis = $nis")->result();
        $data = array(
            'infobasic' => $infoBasic,
            'infoTransaksi' => $infoTransaksi,
            'jumlahtransaksi' => $jumlahtransaksi,
        );

        return $data;
    }

    public function getnis()
    {
        $result = $this->db->query("SELECT s.nis, s.nama, k.kelas, r.ruang
                                    FROM tb_siswa AS s
                                    JOIN tb_ruang AS r
                                    ON s.id_ruang = r.id_ruang
                                    JOIN tb_kelas AS k
                                    ON r.id_kelas = k.id_kelas");
        return $result->result();
    }

    public function getnonmember($id_ruang)
    {
        $result = $this->db->query("SELECT s.nis, s.nama
                                    FROM tb_siswa AS s
                                    JOIN tb_ruang AS r
                                    ON s.id_ruang = r.id_ruang
                                    WHERE s.nis NOT IN(SELECT nis FROM tb_tabungan)
                                    AND s.id_ruang = $id_ruang")->result();
        return $result;
    }

    public function Allnonmember()
    {
        $result = $this->db->query("SELECT s.nis, s.nama
                                    FROM tb_siswa AS s
                                    JOIN tb_ruang AS r
                                    ON s.id_ruang = r.id_ruang
                                    WHERE s.nis NOT IN(SELECT nis FROM tb_tabungan)")->result();
        return $result;
    }

    public function getAll($id_ruang)
    {
        $hasil = $this->db->query("SELECT s.nis, s.nama, s.jenis_kelamin, s.tempat_lahir, s.tanggal_lahir, s.alamat, s.nama_ortu ,s.kontak_orangtua, s.is_active, s.created_at, u.name, s.id_ruang, r.id_kelas, k.kelas, r.ruang
                                    FROM tb_siswa AS s
                                    JOIN tb_ruang AS r
                                    ON s.id_ruang = r.id_ruang
                                    JOIN tb_kelas AS k
                                    ON r.id_kelas = k.id_kelas
                                    JOIN tb_user AS u
                                    ON u.id_ruang = r.id_ruang
                                    WHERE s.id_ruang = $id_ruang");
        return $hasil->result();
    }

    public function getAllNasabah()
    {
        $hasil = $this->db->query("SELECT s.nis, s.nama, s.jenis_kelamin, s.created_at, s.tempat_lahir, s.tanggal_lahir, s.alamat,s.nama_ortu ,s.kontak_orangtua, s.is_active, s.created_at, s.id_ruang, r.id_kelas, k.kelas, r.ruang, u.name AS operator
                                    FROM tb_siswa AS s
                                    JOIN tb_ruang AS r
                                    ON s.id_ruang = r.id_ruang
                                    JOIN tb_kelas AS k
                                    ON r.id_kelas = k.id_kelas
                                    JOIN tb_user AS u
                                    ON u.id_ruang = r.id_ruang
                                    ORDER BY s.id_ruang ASC");
        return $hasil->result();
    }

    public function input()
    {
        $post = $this->input->post();
        $this->nis = $post['nis'];
        $this->nama = trim($post['nama']);
        $this->alamat = trim($post['alamat']);
        $this->tempat_lahir = trim($post['tempat_lahir']);
        $this->tanggal_lahir = strtotime($post['tanggal_lahir']);
        $this->jenis_kelamin = $post['jenis_kelamin'];
        $this->nama_ortu = trim($post['nama_ortu']);
        $this->kontak_orangtua = trim($post['kontak_orangtua']);
        $this->id_ruang = $post['id_ruang'];
        $this->created_at = strtotime("now");

        $result = $this->db->insert('tb_siswa', $this);
        return $result;
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nis = $post['nis'];
        $this->nama = trim($post['nama']);
        $this->alamat = trim($post['alamat']);
        $this->tempat_lahir = trim($post['tempat_lahir']);
        $this->tanggal_lahir = $post['tanggal_lahir'];
        $this->jenis_kelamin = $post['jenis_kelamin'];
        $this->nama_ortu = trim($post['nama_ortu']);
        $this->kontak_orangtua = trim($post['kontak_orangtua']);
        $this->id_ruang = $post['id_ruang'];

        $result = $this->db->update('tb_siswa', $this, array('nis' => $post['nis']));
        return $result;
    }

    public function delete()
    {
        $post = $this->input->post();
        $this->nis = $post['nis'];

        $result = $this->db->delete('tb_siswa', array('nis' => $post['nis']));
        return $result;
    }

    public function getAllMemberAktif()
    {
        // var_dump($id_ruang);
        $result = $this->db->query("SELECT s.nis, s.nama, tb.saldo, u.nip
                                    FROM tb_tabungan AS tb
                                    JOIN tb_siswa AS s
                                    ON tb.nis = s.nis
                                    JOIN tb_ruang AS r
                                    ON s.id_ruang = r.id_ruang
                                    JOIN tb_user AS u
                                    ON u.id_ruang = r.id_ruang")->result();
        return $result;
    }
    public function getMemberAktif($id_ruang)
    {
        // var_dump($id_ruang);
        $result = $this->db->query("SELECT s.nis, s.nama, tb.saldo, u.nip
                                    FROM tb_tabungan AS tb
                                    JOIN tb_siswa AS s
                                    ON tb.nis = s.nis
                                    JOIN tb_ruang AS r
                                    ON s.id_ruang = r.id_ruang
                                    JOIN tb_user AS u
                                    ON u.id_ruang = r.id_ruang
                                    WHERE s.id_ruang = $id_ruang")->result();
        return $result;
    }
}

/* End of file: Nasabah_model.php */
