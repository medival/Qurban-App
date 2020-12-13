<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('auth_model');
    }

    public function index()
    {
        redirect('auth/login');
    }

    public function check_account()
    {
        //validasi login
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        //ambil data dari database untuk validasi login
        $query = $this->auth_model->check_account($email, $password);
        // var_dump($query);
        if ($query === 1) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger"> user tidak ada. </div>');
        } elseif ($query === 2) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger"> user tidak aktif. </div>');
        } elseif ($query === 3) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger"> Password yang anda masukan salah.</div>');
        } else {
            //membuat session dengan nama userData yang artinya nanti data ini bisa di ambil sesuai dengan data yang login
            $userdata = array(
                'is_login' => true,
                'id' => $query->id,
                'nip' => $query->nip,
                'role' => $query->role,
                'username' => $query->username,
                'name' => $query->name,
                'id_ruang' => $query->id_ruang,
                'email' => $query->email,
                'created_at' => $query->created_at,
                'last_login' => $query->last_login,
            );
            $this->session->set_userdata($userdata);
            return true;
        }
    }
    public function login()
    {
        $data = array(
            'title' => 'Login',
        );

        //melakukan pengalihan halaman sesuai dengan levelnya
        if ($this->session->userdata('id_role') == "1") {
            redirect('admin/index');
        }
        if ($this->session->userdata('id_role') == "2") {
            redirect('operator/index');
        }

        //proses login dan validasi nya
        if ($this->input->post('submit')) {
            $error = $this->check_account($this->input->post('email'), $this->input->post('password'));
            // $error = false;
            if ($error === true) {
                $data = $this->auth_model->check_account($this->input->post('email'), $this->input->post('password'));
                //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
                if ($data->role == '1') {
                    redirect('admin/index');
                } elseif ($data->role == '2') {
                    redirect('operator/index');
                }
            } else {
                redirect('auth/login');
            }
        }
        $this->load->view('auth/auth_login', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
