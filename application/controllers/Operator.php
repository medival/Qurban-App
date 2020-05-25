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
            'title'         => 'Detail Tabungan',
            'sess'          => $user_data,
            'info'          => $this->operator_model->info_dashboard($id_ruang)
        );
        $this->load->view('operator/v_index', $data);
    }

    public function getnis()
    {
        $data = $this->nasabah_model->getnis();
        echo json_encode($data);
    }

    public function detailtabungan()
    {
        $data = array(
            'title' => 'Detail Tabungan',
            'sess' => $this->session->all_userdata()
        );
        $this->load->view('admin/v_detailtabungan', $data);
    }

    public function nasabah()
    {
        $data = array(
            'title' => 'Nasabah',
            'sess' => $this->session->all_userdata()
        );

        $this->load->view('operator/v_nasabah', $data);
    }

    public function transaksi()
    {
        $data = array(
            'title' => 'Transaksi',
            'sess' => $this->session->all_userdata(),
            // 'transaksi' =>  
        );
        // var_dump($data);
        $this->load->view('operator/v_transaksi', $data);
    }

    public function getMemberList()
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
        $data = $this->transaksi_model->list();
        echo json_encode($data);
    }

    public function data_nasabah()
    {
        $user_data = $this->session->all_userdata();
        $id_ruang = $user_data['id_ruang'];
        $data = $this->nasabah_model->getAll($id_ruang);
        echo json_encode($data);
    }
    public function getruangkelas()
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
        // var_dump($data);
        echo json_encode($data);
    }
}

/* End of file: Operator.php */
