<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ksiswa_model extends CI_Model
{

    protected $table = 'tb_kelas_siswa';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $result = $this->db->get($this->table);
        return $result->result();
    }


    public function addksiswa()
    {
        $post = $this->input->post();
        $this->id_ksiswa = $post['id_ksiswa'];
        $this->nis = $post['nis'];
        $this->id_tahun = $post['id_tahun'];
        $this->id_ruang = $post['id_ruang'];
        $this->keterangan = $post['keterangan'];
     

        if($this->id_ksiswa == ""){
          return $data = $this->db->insert('tb_kelas_siswa', $this);
        }else{
          return $this->db->update('tb_kelas_siswa', $this, array('id_ksiswa' => $post['id_ksiswa']));
        }

        
    }

    public function postdeleteksiswa()
    {
        $post = $this->input->post();
        $this->id_ksiswa = $post['id_ksiswa'];

        $data = $this->db->delete('tb_kelas_siswa', array('id_ksiswa' => $post['id_ksiswa']));
        return $data;
    }

    public function pilih()
    {
        
        $result = $this->db->query('SELECT * FROM tb_kelas_siswa ks JOIN tb_siswa s ON ks.nis = s.nis JOIN tb_ruang r ON ks.id_ruang = r.id_ruang JOIN tb_kelas k ON r.id_kelas = k.id_kelas JOIN tb_tahun t ON ks.id_tahun = t.id_tahun ORDER BY t.is_active DESC;');

        return $result->result();
    }

    public function siswalist()
    {
        
        $result = $this->db->query('SELECT * FROM tb_siswa ORDER BY nis ASC;');

        return $result->result();
    }

    public function getksiswaid($id_ksiswa)
    {
        
        $result = $this->db->query("SELECT * FROM tb_kelas_siswa WHERE id_ksiswa = $id_ksiswa ORDER BY nis ASC");

        return $result->row();
    }
}

/* End of file: Tahun_model.php */
