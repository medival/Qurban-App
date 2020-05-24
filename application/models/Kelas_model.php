<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{

    protected $table = 'tb_kelas';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $result = $this->db->get($this->table);
        return $result->result();
    }

    public function getruangkelas()
    {
        $data = $this->db->query("SELECT r.id_ruang, k.id_kelas, k.kelas, r.ruang, o.nip, o.nama
        FROM tb_kelas AS k
        JOIN tb_ruang AS r
        ON k.id_kelas = r.id_kelas
        JOIN tb_operator AS o
        ON r.id_ruang = o.id_ruang")->result();
        // $jmlSiswa = $this->db->query("")

        return $data;
    }

    public function updateruang()
    {
        $post = $this->input->post();
        $this->id_kelas = $post['id_kelas'];
        $this->ruang = $post['ruang'];
        $this->id_ruang = $post['id_ruang'];

        $data = $this->db->update('tb_ruang', $this, array('id_ruang' => $post['id_ruang']));
        return $data;
    }

    public function deleteruang()
    {
        $post = $this->input->post();
        $this->id_ruang =  $post['id_ruang'];

        $result = $this->db->delete('tb_ruang', array('id_ruang' => $post['id_ruang']));
        return $result;
    }

    public function addruangkelas()
    {
        $post = $this->input->post();
        $data = array(
            'id_kelas' => $post['id_kelas'],
            'ruang' => $post['ruang']
        );

        $data = $this->db->insert('tb_ruang', $data);
        return $data;
    }

    public function addkelas()
    {
        $post = $this->input->post();
        $this->kelas = $post['kelas'];

        $data = $this->db->insert('tb_kelas', $this);
        return $data;
    }
    public function postupdatekelas()
    {
        $post = $this->input->post();
        $this->id_kelas =  $post['id_kelas'];
        $this->kelas = $post['kelas'];

        return $this->db->update('tb_kelas', $this, array('id_kelas' => $post['id_kelas']));
    }

    public function postdeletekelas()
    {
        $post = $this->input->post();
        $this->id_kelas =  $post['id_kelas'];

        $data = $this->db->delete('tb_kelas', array('id_kelas' => $post['id_kelas']));
        return $data;
    }

    public function pilih()
    {
        $result = $this->db->get('tb_kelas');
        return $result->result();
    }
}

/* End of file: Kelas_model.php */
