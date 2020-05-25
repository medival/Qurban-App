<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function adduser()
    {
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $id_ruang = $this->input->post('id_ruang');
        $email = $this->input->post('email');
        $password = get_hash($this->input->post('password'));
        $created_at = strtotime("now");

        $data = array(
            'nip'   => $nip,
            'name'  => $nama,
            'id_ruang' => $id_ruang,
            'email' => $email,
            'password' => $password,
            'created_at' => $created_at,
            'role' => 2
        );
        var_dump($data);
        $result = $this->db->insert('tb_user', $data);
        return $result;
    }

    public function getuser()
    {
        $query = $this->db->query("SELECT u.id, u.name, u.role, u.id_ruang, u.email, u.is_active, u.created_at
                                    FROM tb_user AS u")->result();
        return $query;
    }
}

/* End of file: User_model.php */
