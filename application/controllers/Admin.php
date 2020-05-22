<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('nasabah_model');
        $this->load->model('kelas_model');
        $this->load->model('operator_model');
        $this->load->model('transaksi_model');
    }

    public function index()
    {
        $data = array(
            'title' => "Dashboard"
        );
        $this->load->view('admin/v_index', $data);
    }

    public function nasabah()
    {
        $data = array(
            'title' => 'Data Nasabah'
        );
        $this->load->view('admin/v_nasabah', $data);
    }

    public function operator()
    {
        $data = array(
            'title' => 'Data Operator'
        );

        $this->load->view('admin/v_operator', $data);
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

    public function data_nasabah()
    {
        $data = $this->nasabah_model->getAll();
        echo json_encode($data);
    }

    public function getnis()
    {
        $data = $this->nasabah_model->getnis();
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
            'kelas' => $this->kelas_model->getAll()
        );

        $this->load->view('admin/v_ruangkelas', $data);
    }

    public function getruangkelas()
    {
        $data = $this->kelas_model->getruangkelas();
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
            'title' => 'Data Kelas'
        );
        $this->load->view('admin/v_kelas', $data);
    }

    public function setting()
    {
        $data = array(
            'title' => "Setting"
        );
        $this->load->view('admin/v_setting', $data);
    }

    public function tambahnasabah()
    {
        $data = array(
            'title' => 'Tambah Nasabah'
        );
        $this->load->view('admin/v_tambahnasabah', $data);
    }

    public function detailtabungan()
    {
        $data = array(
            'title' => 'Detail Tabungan'
        );
        $this->load->view('admin/v_detailtabungan', $data);
    }

    public function transaksi()
    {
        $data = array(
            'title' => 'Transaksi'
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
        $data = $this->transaksi_model->getMemberAktif();
        echo json_encode($data);
    }

    public function getMemberSaldo($nis)
    {
        $data = $this->transaksi_model->getMemberSaldo($nis);
        echo json_encode($data);
    }

    public function inputdatakredit()
    {
        $data = $this->transaksi_model->input();
        echo json_encode($data);
    }

    public function profile()
    {
        $data = array(
            'title' => 'Admin Profile'
        );

        $this->load->view('admin/v_profile', $data);
    }

    public function userprofile()
    {
        $data = array(
            'title' => 'User Profile'
        );

        $this->load->view('admin/v_userprofile', $data);
    }
}

/* End of file: Member.php */
