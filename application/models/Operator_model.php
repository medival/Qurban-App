<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator_model extends CI_Model
{

    protected $_tb_operator = 'tb_operator';

    public function __construct()
    {
        parent::__construct();
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
        $this->nip =  $post['nip'];
        $this->nama = $post['nama'];
        $this->jenis_kelamin =  $post['jenis_kelamin'];
        $this->id_ruang =  $post['id_ruang'];

        $result = $this->db->insert($this->_tb_operator, $this);
        return $result;
    }
}

/* End of file: Operator_mode.php */
