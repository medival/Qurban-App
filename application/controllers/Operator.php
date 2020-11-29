<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kelas_model');
        $this->load->model('operator_model');
        $this->load->model('nasabah_model');
        $this->load->model('transaksi_model');
        $this->load->model('auth_model');
        $this->check_login();
        if ($this->session->userdata('role') != "2") {
            redirect('admin/index', 'refresh');
        }
    }
    public function index()
    {
        $user_data = $this->session->all_userdata();
        $id_ruang = $user_data['id_ruang'];
        $data = array(
            'title'         => 'Dashboard',
            'sess'          => $user_data,
            'info'          => $this->operator_model->info_dashboard($id_ruang)
        );
        $this->load->view('operator/v_index', $data);
    }

    public function transaksi()
    {
        $data = array(
            'title' => 'Transaksi',
            'sess' => $this->session->all_userdata()
        );

        $this->load->view('operator/v_transaksi', $data);
        $this->load->view('operator/v_transaksi_backend');
    }

    public function siswa()
    {
        $data = array(
            'title' => 'Siswa',
            'sess' => $this->session->all_userdata(),
        );
        $this->load->view('operator/v_siswa', $data);
        $this->load->view('operator/v_siswa_backend');
    }

    public function changepassword()
    {
        if ($this->input->post('submit')) {
            $error = $this->checkpassword($this->input->post('newPassword'), $this->input->post('confirmPassword'));
            var_dump($error);
            if ($error == 1) {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger"> Konfirmasi ulang password </div>');
            }
            if ($error == true) {
                $this->session->set_flashdata('alert', '<div class="alert alert-success"> Password berhasil diganti </div>');
            }
        }
        $data = array(
            'title' => 'Change Password',
            'sess'  => $this->session->all_userdata()
        );
        $this->load->view('change_password/v_changepassword', $data);
    }

    public function getlisttransaksi()
    {
        $data = $this->transaksi_model->transaksilist();
        return $data;
    }

    public function getnis()
    {
        $data = $this->nasabah_model->getnis();
        echo json_encode($data);
    }

    public function getNasabahAktif()
    {
        $user_data = $this->session->all_userdata();
        $id_ruang = $user_data['id_ruang'];
        $data = $this->nasabah_model->getMemberAktif($id_ruang);
        echo json_encode($data);
    }

    public function getMemberInfo($nis)
    {
        $data = $this->transaksi_model->getMemberSaldo_NIP($nis);
        echo json_encode($data);
    }

    public function inputdatakredit()
    {
        $nis = $this->input->post('nis');
        $nominal = $this->input->post('nominal');
        $nip = $this->input->post('nip');
        $result = $this->db->query("SELECT saldo
                                    FROM tb_tabungan
                                    WHERE nis=" . $nis)->result();
        foreach ($result as $row) {
            $saldo_tabungan = $row->saldo;
            if ($saldo_tabungan == 0) {
                $saldo_akhir = $nominal;
            } else if ($saldo_tabungan > 0) {
                $saldo_akhir = $nominal + $saldo_tabungan;
            }
        }
        $kredit_debet = "kredit";
        $tanggal = strtotime("now");

        $data = array(
            'nis' => $nis,
            'tanggal' => $tanggal,
            'kredit_debet' => $kredit_debet,
            'nominal' => $nominal,
            'saldo' => $saldo_akhir,
            'nip' => $nip
        );
        $data2 = array(
            'saldo' => $saldo_akhir,
            'nip' => $nip
        );
        $this->db->insert('tb_transaksi', $data);
        $this->db->update('tb_tabungan', $data2, array('nis' => $nis));
        echo json_encode($data);
    }

    public function inputdatadebet()
    {
        $nis = $this->input->post('nis');
        $nominal = $this->input->post('nominal');
        $nip = $this->input->post('nip');
        $result = $this->db->query("SELECT saldo
                                    FROM tb_tabungan
                                    WHERE nis = " . $nis)->result();

        foreach ($result as $row) {
            $saldo_tabungan = $row->saldo;
            if (($saldo_tabungan > 0) && ($nominal <= $saldo_tabungan)) {
                $saldo_akhir = $saldo_tabungan - $nominal;
            } else if (($saldo_tabungan <= 0)) {
                $saldo_akhir = $saldo_tabungan;
                redirect('operator/transaksi');
            } else if (($nominal > $saldo_tabungan)) {
                $nominal = 0;
                redirect('operator/transaksi');
            }
        }

        $kredit_debet = "debet";
        $tanggal = strtotime("now");
        $inputtbtransaksi = array(
            'nis' => $nis,
            'tanggal' => $tanggal,
            'kredit_debet' => $kredit_debet,
            'nominal' => $nominal,
            'saldo' => $saldo_akhir,
            'nip' => $nip
        );

        $this->db->insert('tb_transaksi', $inputtbtransaksi);

        $inputtbtabungan = array(
            'saldo' => $saldo_akhir,
            'nip' => $nip
        );

        $this->db->update('tb_tabungan', $inputtbtabungan, array('nis' => $nis));
    }

    public function getrekapdata($nis)
    {
        $data = $this->transaksi_model->get($nis);
        echo json_encode($data);
    }

    public function getsummary($nis)
    {
        $data = $this->nasabah_model->getsummary($nis);
        echo json_encode($data);
    }

    public function getalltransaksi()
    {
        $user_data = $this->session->all_userdata();
        $id_ruang = $user_data['id_ruang'];

        $data = $this->transaksi_model->gettransaksi($id_ruang);
        echo json_encode($data);
    }


    public function getAllDataSiswa()
    {
        $user_data = $this->session->all_userdata();
        $id_ruang = $user_data['id_ruang'];
        $data = $this->nasabah_model->getAll($id_ruang);
        echo json_encode($data);
    }

    public function inputDataSiswa()
    {
        $data = $this->nasabah_model->input();
        echo json_encode($data);
    }

    public function updateDataSiswa()
    {
        $data = $this->nasabah_model->update();
        echo json_encode($data);
    }

    public function deleteDataSiswa()
    {
        $data = $this->nasabah_model->delete();
        echo json_encode($data);
    }

    public function getAllRuangKelas()
    {
        $user_data = $this->session->all_userdata();
        $id_ruang = $user_data['id_ruang'];

        $data = $this->kelas_model->getruangkelas($id_ruang);
        echo json_encode($data);
    }

    public function aktivasimember()
    {
        $data = $this->transaksi_model->aktivasiuser();
        echo json_encode($data);
    }

    public function getnonmember()
    {
        $user_data = $this->session->all_userdata();
        $id_ruang = $user_data['id_ruang'];
        $data = $this->nasabah_model->getnonmember($id_ruang);
        echo json_encode($data);
    }

    public function checkpassword($newPassword, $confirmPassword)
    {
        if ($newPassword != $confirmPassword) {
            return 1;
        } else {
            $newPassword = $this->input->post('newPassword');
            $result = $this->auth_model->changepassword($newPassword);
            return $result;
        }
    }
}

/* End of file: Operator.php */
