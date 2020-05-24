<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nasabah_model extends CI_Model
{

    protected $_tb_siswa = 'tb_siswa';

    public function __construct()
    {
        parent::__construct();
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

    public function getnonmember()
    {
        $result = $this->db->query("SELECT s.nis, s.nama
                                    FROM tb_siswa AS s
                                    WHERE s.nis NOT IN(SELECT nis FROM tb_tabungan)
                                    ");
        return $result->result();
    }

    public function getAll()
    {
        $hasil =  $this->db->query("SELECT s.nis, s.nama, s.jenis_kelamin, s.created_at, s.tempat_lahir, s.tanggal_lahir, s.alamat,s.nama_ortu ,s.kontak_orangtua, s.is_active, s.created_at, s.id_ruang, r.id_kelas, k.kelas, r.ruang, o.nip, o.nama AS nama_operator
                                    FROM tb_siswa AS s
                                    JOIN tb_ruang AS r
                                    ON s.id_ruang = r.id_ruang
                                    JOIN tb_kelas AS k
                                    ON r.id_kelas = k.id_kelas
                                    JOIN tb_operator AS o
                                    ON o.id_ruang = r.id_ruang");
        return $hasil->result();
    }

    public function input()
    {
        $post = $this->input->post();
        $this->nis =  $post['nis'];
        $this->nama =  trim($post['nama']);
        $this->alamat =  trim($post['alamat']);
        $this->tempat_lahir =  trim($post['tempat_lahir']);
        $this->tanggal_lahir =  strtotime($post['tanggal_lahir']);
        $this->jenis_kelamin =  $post['jenis_kelamin'];
        $this->nama_ortu =  trim($post['nama_ortu']);
        $this->kontak_orangtua =  trim($post['kontak_orangtua']);
        $this->id_ruang =  $post['id_ruang'];
        $this->created_at =  strtotime("now");

        $result = $this->db->insert('tb_siswa', $this);
        return $result;
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nis =  $post['nis'];
        $this->nama =  trim($post['nama']);
        $this->alamat =  trim($post['alamat']);
        $this->tempat_lahir =  trim($post['tempat_lahir']);
        $this->tanggal_lahir =  $post['tanggal_lahir'];
        $this->jenis_kelamin =  $post['jenis_kelamin'];
        $this->nama_ortu =  trim($post['nama_ortu']);
        $this->kontak_orangtua =  trim($post['kontak_orangtua']);
        $this->id_ruang =  $post['id_ruang'];

        $result = $this->db->update('tb_siswa', $this, array('nis' => $post['nis']));
        return $result;
    }

    public function delete()
    {
        $post = $this->input->post();
        $this->nis =  $post['nis'];

        $result = $this->db->delete('tb_siswa', array('nis' => $post['nis']));
        return $result;
    }
}

/* End of file: Nasabah_model.php */
