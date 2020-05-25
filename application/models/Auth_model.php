<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Auth_model extends CI_Model
{
    public $table       = 'tb_user';
    public $id          = 'tb_user.id';

    public function __construct()
    {
        parent::__construct();
    }

    public function login($email, $password)
    {
        $query = $this->db->get_where($this->table, array('email' => $email, 'password' => $password));
        return $query->row_array();
    }

    public function check_account($email)
    {
        //cari email lalu lakukan validasi
        $this->db->where('email', $email);
        $query = $this->db->get($this->table)->row();

        //jika bernilai 1 maka user tidak ditemukan
        if (!$query) {
            return 1;
        }
        //jika bernilai 2 maka user tidak aktif
        if ($query->is_active == 0) {
            return 2;
        }
        //jika bernilai 3 maka password salah
        if (!hash_verified($this->input->post('password'), $query->password)) {
            return 3;
        }

        return $query;
    }

    public function get_by_id()
    {
        $id = $this->session->userdata('id');
        $this->db->select('
            tb_user.*, tb_role.id AS id_role, tb_role.name, tb_role.description,
        ');
        $this->db->join('tb_role', 'tb_user.role = tb_role.id');
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function logout($date, $id)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $date);
    }
}
