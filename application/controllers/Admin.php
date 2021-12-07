<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('nasabah_model');
        $this->load->model('kelas_model');
        $this->load->model('tahun_model');
        $this->load->model('operator_model');
        $this->load->model('ksiswa_model');
        $this->load->model('transaksi_model');
        $this->load->model('user_model');
        $this->load->model('auth_model');
        $this->load->model('Admin_Dashboard_model');

        $this->check_login();
        if ($this->session->userdata('role') != "1") {
            redirect('operator/index', 'refresh');
        }
    }

    public function index()
    {
        $results = $this->Admin_Dashboard_model->getAllRuangKelas();
        $result = array();
        foreach ($results as $row) {
            $result[] = $this->Admin_Dashboard_model->getDetailKelas($row->id_ruang);
        }

        $data = array(
            'info' => $this->transaksi_model->infoDashboard(),
            'title' => "Dashboard",
            'sess' => $this->session->all_userdata(),
            'data' => $result,
        );
        $this->load->view('admin/v_index', $data);
    }

    public function siswa()
    {
        $data = array(
            'title' => 'Data Siswa',
            'sess' => $this->session->all_userdata(),
        );
        $this->load->view('admin/v_siswa', $data);
    }

    public function ruangkelas()
    {
        $data = array(
            'title' => 'Data Ruang Kelas',
            'kelas' => $this->kelas_model->getAll(),
            'sess' => $this->session->all_userdata(),
        );

        $this->load->view('admin/v_ruangkelas', $data);
    }

    public function kelas()
    {
        $data = array(
            'title' => 'Data Kelas',
            'sess' => $this->session->all_userdata(),
        );
        $this->load->view('admin/v_kelas', $data);
    }

    

    public function transaksi()
    {
        $data = array(
            'title' => 'Transaksi',
            'sess' => $this->session->all_userdata(),
        );
        $this->load->view('admin/v_transaksi', $data);
    }

    public function operator()
    {
        $data = array(
            'title' => 'Management Operator',
            'sess' => $this->session->all_userdata(),
        );
        $this->load->view('admin/v_user_operator', $data);
    }

    public function adminstrator()
    {
        $data = array(
            'title' => 'Management Adminstrator',
            'sess' => $this->session->all_userdata(),
        );
        $this->load->view('admin/v_user_admin', $data);
    }

    public function changepassword()
    {
        if ($this->input->post('submit')) {
            $error = $this->checkpassword($this->input->post('newPassword'), $this->input->post('confirmPassword'));
            if ($error == 1) {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger"> Konfirmasi ulang password </div>');
            }

            if ($error == true) {
                $this->session->set_flashdata('alert', '<div class="alert alert-success"> Password berhasil diganti </div>');
            }
        }
        $data = array(
            'title' => 'Change Password',
            'sess' => $this->session->all_userdata(),
        );
        $this->load->view('change_password/v_changepassword', $data);
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

    public function getAllRuangKelas()
    {
        $data = $this->kelas_model->getAllRuangKelas();
        echo json_encode($data);
    }

    public function getAllKelasEmpty()
    {
        $data = $this->kelas_model->getAllKelasEmpty();
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
        $user_data = $this->session->all_userdata();
        $nip = $user_data['nip'];
        if ($nip == '') {
            $nip = null;
        }

        $nis = $this->input->post('nis');
        $nominal = $this->input->post('nominal');
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
            'nip' => $nip,
        );
        $data2 = array(
            'nis' => $nis,
            'saldo' => $saldo_akhir,
            'nip' => $nip,
        );
        $this->db->insert('tb_transaksi', $data);
        $this->db->update('tb_tabungan', $data2, array('nis' => $nis));
        $this->session->set_userdata('invoice', $nis);
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
            'nip' => $nip,
        );

        $this->db->insert('tb_transaksi', $inputtbtransaksi);

        $inputtbtabungan = array(
            'saldo' => $saldo_akhir,
            'nip' => $nip,
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
        $data = $this->transaksi_model->Alllist();
        echo json_encode($data);
    }

    public function Allnonmember()
    {
        $data = $this->nasabah_model->allnonmember();
        echo json_encode($data);
    }

    public function getuser()
    {
        $data = $this->user_model->getuser();
        echo json_encode($data);
    }

    public function adduser()
    {
        $data = $this->user_model->adduser();
        echo json_encode($data);
    }

    public function edituser()
    {
        $data = $this->user_model->updateuser();
        echo json_encode($data);
    }

    public function deleteuser()
    {
        $data = $this->user_model->deleteuser();
        echo json_encode($data);
    }

    public function getadmin()
    {
        $data = $this->user_model->getadminstratorlist();
        echo json_encode($data);
    }

    public function getrole()
    {
        $operator = 2;
        $data = $this->user_model->getrolelist($operator);
        echo json_encode($data);
    }

    public function getroleadmin()
    {
        $admin = 1;
        $data = $this->user_model->getrolelist($admin);
        echo json_encode($data);
    }

    public function userkontrol($id)
    {
        $data = $this->user_model->kontrol($id);
        echo json_encode($data);
    }

    public function getAllReportKelas()
    {
        $results = $this->Admin_Dashboard_model->getAllRuangKelas();
        $data = array();
        foreach ($results as $row) {
            $data[] = $this->Admin_Dashboard_model->getDetailKelas($row->id_ruang);
        }
        echo json_encode($data);
    }

    public function getDataKelas($id_ruang)
    {
        $data = $this->Admin_Dashboard_model->getDetailKelas($id_ruang);
        echo json_encode($data);
    }

    public function printInvoice()
    {
        $nis = $this->session->userdata('invoice');
        $data['dataTransaksi'] = $this->transaksi_model->getTransaksiByNis($nis);
        //var_dump($data);
        $this->load->view('invoice/v_invoice',$data);
    }


    /* Data Tahun Ajaran*/
    public function tahun()
    {
        $data = array(
            'title' => 'Data Tahun Ajaran',
            'sess' => $this->session->all_userdata(),
        );
        $this->load->view('admin/v_tahun', $data);
    }
    
    public function inputtahun()
    {
        $data = $this->tahun_model->addtahun();
        echo json_encode($data);
    }
    public function gettahunlist()
    {
        $data = $this->tahun_model->pilih();
        echo json_encode($data);
    }

    public function updatedatatahun()
    {
        $data = $this->tahun_model->postupdatetahun();
        echo json_encode($data);
    }

    public function deletetahun()
    {
        $data = $this->tahun_model->postdeletetahun();
        echo json_encode($data);
    }
    /* End data Tahun Ajaran */


    
    /* Data Kelas Siswa*/
    public function getsiswalist()
    {
        $data = $this->ksiswa_model->siswalist();
        echo json_encode($data);
    }

    public function getksiswaid()
    {
        $id_ksiswa = $this->input->post('id_ksiswa');
        $data = $this->ksiswa_model->getksiswaid($id_ksiswa);
        echo json_encode($data);
    }

    public function kelas_siswa()
    {
        $data = array(
            'title' => 'Data Kelas Siswa',
            'sess' => $this->session->all_userdata(),
            'dataSiswa' => $this->ksiswa_model->siswalist(),
        );
        $this->load->view('admin/v_kelas_siswa', $data);
    }
    
    public function inputksiswa()
    {
        $data = $this->ksiswa_model->addksiswa();
        echo json_encode($data);
    }
    public function getksiswalist()
    {
        $data = $this->ksiswa_model->pilih();
        echo json_encode($data);
    }

    public function updatedataksiswa()
    {
        $data = $this->ksiswa_model->postupdateksiswa();
        echo json_encode($data);
    }

    public function deleteksiswa()
    {
        $data = $this->ksiswa_model->postdeleteksiswa();
        echo json_encode($data);
    }
    /* End data Kelas Siswa */
}

/* End of file: Admin.php */
