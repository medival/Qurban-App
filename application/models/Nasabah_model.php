<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nasabah_model extends CI_Model
{

    protected $_tb_siswa = 'tb_siswa';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $hasil =  $this->db->get('tb_siswa');
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
