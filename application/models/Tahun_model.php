<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_model extends CI_Model
{

    protected $table = 'tb_tahun';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $result = $this->db->get($this->table);
        return $result->result();
    }


    public function addtahun()
    {
        $post = $this->input->post();
        $this->tahun = $post['tahun'];
        $this->is_active = $post['is_active'];

        $data = $this->db->insert('tb_tahun', $this);
        return $data;
    }
    public function postupdatetahun()
    {
        $post = $this->input->post();
        $this->id_tahun = $post['id_tahun'];
        $this->tahun = $post['tahun'];
        $this->is_active = $post['is_active'];

        return $this->db->update('tb_tahun', $this, array('id_tahun' => $post['id_tahun']));
    }

    public function postdeletetahun()
    {
        $post = $this->input->post();
        $this->id_tahun = $post['id_tahun'];

        $data = $this->db->delete('tb_tahun', array('id_tahun' => $post['id_tahun']));
        return $data;
    }

    public function pilih()
    {
        //$result = $this->db->get('tb_tahun');
        $result = $this->db->query('SELECT * FROM tb_tahun ORDER BY is_active ASC');
        return $result->result();
    }
}

/* End of file: Tahun_model.php */
