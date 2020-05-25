<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('nasabah_model');
        $this->load->model('kelas_model');
        $this->load->model('operator_model');
        $this->load->model('transaksi_model');
        $this->load->model('user_model');

        $this->check_login();
        if ($this->session->userdata('role') != "1") {
            redirect('operator/index', 'refresh');
        }
    }

    public function index()
    {
        $data = array(
            'info' => $this->transaksi_model->infoDashboard(),
            'title' => "Dashboard",
            'sess' => $this->session->all_userdata()
        );

        $this->load->view('admin/v_index', $data);
    }

    public function nasabah()
    {
        $data = array(
            'title' => 'Data Nasabah',
            'sess' => $this->session->all_userdata()
        );
        $this->load->view('admin/v_nasabah', $data);
    }

    public function operator()
    {
        $data = array(
            'title' => 'Data Operator',
            'sess' => $this->session->all_userdata()
        );

        $this->load->view('admin/v_operator', $data);
    }

    public function rekap()
    {
        $data = array(
            'title' => 'Rekap Data',
            'sess' => $this->session->all_userdata()
        );

        $this->load->view('admin/v_rekap', $data);
    }
    public function listoperator()
    {
        $data = $this->operator_model->getAll();
        echo json_encode($data);
    }

    public function inputoperator()
    {
        $data = $this->operator_model->input();
        echo json_encode($data);
    }

    public function updateoperator()
    {
        $data = $this->operator_model->update();
        echo json_encode($data);
    }

    public function deletedataoperator()
    {
        $data = $this->operator_model->delete();
        echo json_encode($data);
    }

    public function getAllnasabah()
    {
        $data = $this->nasabah_model->getAllNasabah();
        echo json_encode($data);
    }

    public function getnis()
    {
        $data = $this->nasabah_model->getnis();
        echo json_encode($data);
    }
    public function getnonmember()
    {
        $data = $this->nasabah_model->getnonmember();
        echo json_encode($data);
    }

    public function inputNasabah()
    {
        $data = $this->nasabah_model->input();
        echo json_encode($data);
    }

    public function updatenasabah()
    {
        $data = $this->nasabah_model->update();
        echo json_encode($data);
    }

    public function deletenasabah()
    {
        $data = $this->nasabah_model->delete();
        echo json_encode($data);
    }

    public function ruangkelas()
    {
        $data = array(
            'title' => 'Data Ruang Kelas',
            'kelas' => $this->kelas_model->getAll(),
            'sess' => $this->session->all_userdata()
        );

        $this->load->view('admin/v_ruangkelas', $data);
    }

    public function getAllruangkelas()
    {
        $data = $this->kelas_model->getAllruangkelas();
        echo json_encode($data);
    }

    public function inputruangkelas()
    {
        $data = $this->kelas_model->addruangkelas();
        echo json_encode($data);
    }

    public function updateruangkelas()
    {
        $data = $this->kelas_model->updateruang();
        echo json_encode($data);
    }

    public function deleteruangkelas()
    {
        $data = $this->kelas_model->deleteruang();
        echo json_encode($data);
    }

    public function inputkelas()
    {
        $data = $this->kelas_model->addkelas();
        echo json_encode($data);
    }
    public function getkelaslist()
    {
        $data = $this->kelas_model->pilih();
        echo json_encode($data);
    }

    public function updatedatakelas()
    {
        $data = $this->kelas_model->postupdatekelas();
        echo json_encode($data);
    }

    public function deletekelas()
    {
        $data = $this->kelas_model->postdeletekelas();
        echo json_encode($data);
    }

    public function kelas()
    {
        $data = array(
            'title' => 'Data Kelas',
            'sess' => $this->session->all_userdata()
        );
        $this->load->view('admin/v_kelas', $data);
    }

    public function setting()
    {
        $data = array(
            'title' => "Setting",
            'sess' => $this->session->all_userdata()
        );
        $this->load->view('admin/v_setting', $data);
    }

    public function tambahnasabah()
    {
        $data = array(
            'title' => 'Tambah Nasabah',
            'sess' => $this->session->all_userdata()
        );
        $this->load->view('admin/v_tambahnasabah', $data);
    }

    public function detailtabungan()
    {
        $data = array(
            'title' => 'Detail Tabungan',
            'sess' => $this->session->all_userdata()
        );
        $this->load->view('admin/v_detailtabungan', $data);
    }

    public function transaksi()
    {
        $data = array(
            'title' => 'Transaksi',
            'sess' => $this->session->all_userdata()
        );

        $this->load->view('admin/v_transaksi', $data);
    }

    public function aktivasimember()
    {
        $data = $this->transaksi_model->aktivasiuser();
        echo json_encode($data);
    }

    public function getMemberList()
    {
        $data = $this->nasabah_model->getAllMemberAktif();
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
            // 'nis' => $nis,
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
        // $nis = 5386;
        // $nominal = 1000;
        $result = $this->db->query("SELECT saldo
                                    FROM tb_tabungan
                                    WHERE nis = " . $nis)->result();

        foreach ($result as $row) {
            $saldo_tabungan = $row->saldo;
            if (($saldo_tabungan > 0) && ($nominal <= $saldo_tabungan)) {
                $saldo_akhir = $saldo_tabungan - $nominal;
            } else if (($saldo_tabungan <= 0)) {
                $saldo_akhir = $saldo_tabungan;
                // $nominal = 0;
                redirect('admin/transaksi');
            } else if (($nominal > $saldo_tabungan)) {
                $nominal = 0;
                redirect('admin/transaksi');
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

    public function gettransaksi()
    {
        // $user_data = $this->session->all_userdata();
        // $role = $user_data['role'];
        // if ($role == 1) {
        $data = $this->transaksi_model->list();
        // } else if ($role == 1) {
        // $data = $this->transaksi_model->Alllist();
        // }
        echo json_encode($data);
    }

    public function getalltransaksi()
    {
        $data = $this->transaksi_model->Alllist();
        echo json_encode($data);
    }

    public function Allnonmember()
    {
        $data = $this->nasabah_model->allnonmember();
        // var_dump($data);
        echo json_encode($data);
    }
    public function profile()
    {
        $data = array(
            'title' => 'Admin Profile',
            'sess' => $this->session->all_userdata()
        );

        $this->load->view('admin/v_profile', $data);
    }

    public function userprofile()
    {
        $data = array(
            'title' => 'User Profile',
            'sess' => $this->session->all_userdata()
        );

        $this->load->view('admin/v_userprofile', $data);
    }

    public function usermanagement()
    {
        $data = array(
            'title' => 'User Management',
            'sess' => $this->session->all_userdata()
        );

        $this->load->view('admin/v_user', $data);
    }

    public function adduser()
    {
        $data = $this->user_model->adduser();
        echo json_encode($data);
    }

    public function getuser()
    {
        $data = $this->user_model->getuser();
        echo json_encode($data);
    }
}

/* End of file: Member.php */
