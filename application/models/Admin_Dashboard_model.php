<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Dashboard_model extends CI_Model
{
    // public $table       = 'tb_user';
    // public $id          = 'tb_user.id';
    public $tb_ruang = 'tb_ruang';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllRuangKelas()
    {
        $dataAllRuangKelas = $this->db->query("SELECT tb_ruang.id_ruang FROM tb_ruang");
        return $dataAllRuangKelas->result();
    }

    public function getDetailKelas($id_ruang)
    {
        // Jumlah Siswa
        $jumlahSiswaKelas = $this->db->query("SELECT COUNT(*) as jmlSiswaKelas
											FROM tb_ruang AS r
											JOIN tb_siswa AS s
											ON s.id_ruang = r.id_ruang
											WHERE s.id_ruang = $id_ruang")->row();

        // Jumlah Saldo Kelas
        $jumlahSaldoKelas = $this->db->query("SELECT SUM(tb.saldo) as jmlSaldoKelas
											FROM tb_tabungan AS tb
											JOIN tb_siswa AS s
											ON s.nis = tb.nis
											WHERE s.id_ruang = $id_ruang")->row();
        // Jumlah Semua Saldo
        $jumlahSemuaSaldo = $this->db->query("SELECT SUM(tb.saldo) as jmlSemuaSaldo
											FROM tb_tabungan AS tb")->row();

        // Nama Operator
        $namaOperator = $this->db->query("SELECT u.name
										FROM tb_user as u
										JOIN tb_ruang as r
										ON u.id_ruang = r.id_ruang
										WHERE r.id_ruang = $id_ruang")->row();

        // Kelas
        $ruangKelas = $this->db->query("SELECT concat(k.kelas , r.ruang) AS kelas
										FROM tb_user as u
										JOIN tb_ruang as r
										ON u.id_ruang = r.id_ruang
										JOIN tb_kelas as k
										ON r.id_kelas = k.id_kelas
										WHERE r.id_ruang = $id_ruang")->row();
        // Save to Array
        $infoKelas = array(
            'jumlahSiswaKelas' => $jumlahSiswaKelas,
            'jumlahSaldoKelas' => $jumlahSaldoKelas,
            'jumlahSemuaSaldo' => $jumlahSemuaSaldo,
            'namaOperator' => $namaOperator,
            'ruangKelas' => $ruangKelas,
            'presentase' => round($jumlahSaldoKelas->jmlSaldoKelas * 100 / $jumlahSemuaSaldo->jmlSemuaSaldo) . "%",
        );

        return $infoKelas;
    }
}
