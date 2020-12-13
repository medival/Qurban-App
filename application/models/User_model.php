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
        $role = $this->input->post('role');

        $data = array(
            'nip' => $nip,
            'name' => $nama,
            'id_ruang' => $id_ruang,
            'email' => $email,
            'password' => $password,
            'created_at' => $created_at,
            'role' => $role,
        );
        // var_dump($data);
        $result = $this->db->insert('tb_user', $data);
        return $result;
    }

    public function getuser()
    {
        $query = $this->db->query("SELECT u.id, u.nip, u.name, u.role, u.id_ruang, u.email, u.is_active, u.created_at, k.kelas, r.ruang
                                    FROM tb_user AS u
                                    JOIN tb_ruang AS r
                                    ON u.id_ruang = r.id_ruang
                                    JOIN tb_kelas AS k
                                    ON k.id_kelas = r.id_kelas")->result();
        return $query;
    }

    public function updateuser()
    {
        $id = $this->input->post('id');
        $nip = $this->input->post('nip');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $role = $this->input->post('role');
        $id_ruang = $this->input->post('id_ruang');

        $data = array(
            'nip' => $nip,
            'name' => $name,
            'email' => $email,
            'role' => $role,
            'id_ruang' => $id_ruang,
        );

        $query = $this->db->update('tb_user', $data, array('id' => $id));
        return $query;
    }

    public function deleteuser()
    {
        $user_data = $this->session->all_userdata();
        $id_role = $user_data['role'];

        $id = $this->input->post('id');
        if ($id_role == 1) {
            $query = $this->db->delete('tb_user', array('id' => $id));
        }
        return $query;
    }

    public function getrolelist($req_role)
    {
        $user_data = $this->session->all_userdata();
        $id_role = $user_data['role'];
        if ($id_role == 1) {
            $query = $this->db->query("SELECT role.id_role, role.name AS role_name FROM tb_role AS role WHERE role.id_role = $req_role")->result();
        }
        return $query;
    }

    public function kontrol($id)
    {
        $state = $this->db->query("SELECT is_active FROM tb_user AS u WHERE u.id = $id")->row();
        // var_dump($state);
        if ($state->is_active == 1) {
            $is_active = 0;
        } else if ($state->is_active == 0) {
            $is_active = 1;
        }
        $data = array(
            'is_active' => $is_active,
        );
        $result = $this->db->update('tb_user', $data, array('id' => $id));
        return $result;
    }

    public function getadminstratorlist()
    {
        $query = $this->db->query("SELECT u.id, u.name, u.role, u.email, u.is_active, u.created_at
                                    FROM tb_user AS u
									JOIN tb_role AS r
									ON r.id_role = u.role
									WHERE u.role = 1")->result();
        return $query;
    }

}

/* End of file: User_model.php */
