<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1> <?=$title;?></h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4> Total Saldo</h4>
                            </div>
                            <div class="card-body">
                                <?="Rp. " . number_format($info['totalSaldo']->jmlSaldo);?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4> Total Nasabah </h4>
                            </div>
                            <div class="card-body">
                                <?=$info['memberAktif']->jmlMemberAktif?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Siswa</h4>
                            </div>
                            <div class="card-body">
                                <?=$info['jumlahSiswa']->jmlSiswa?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4> Transaksi </h4>
                            </div>
                            <div class="card-body">
                                <?=$info['jumlahtransaksi']->jmlTransaksi?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('_partials/footer');?>