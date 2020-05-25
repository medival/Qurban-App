<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="card card-primary">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h3> <?= $title; ?> </h3>
                                <div class="invoice-number"> User ID #182719</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Info Pribadi: </strong><br>
                                        Ujang Maman<br>
                                        Bogor Barat, Indonesia <br>
                                        08123456789
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong> Info Nasabah: </strong><br>
                                        Regist 12-Mei-2020<br>
                                        Active <br>
                                        <!-- September 19, 2018<br><br> -->
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <!-- <strong>Payment Method:</strong><br>
                                        Visa ending **** 4242<br>
                                        ujang@maman.com -->
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"></div>

                                <div class="invoice-detail-item col-md-6 text-md-right">
                                    <!-- <strong>Transaksi Terakhir:</strong><br>
                                    September 19, 2018<br>
                                    <strong>Saldo</strong>
                                    <h4> Rp. 9.500.00 </h4> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">Detail Transaksi</div>
                            <p class="section-lead"> Detail laporan transaksi setor ataupun tarik</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th data-width="40">#</th>
                                        <th>Tanggal</th>
                                        <th class="text-right">Setoran</th>
                                        <th class="text-right">Penarikan</th>
                                        <th class="text-right">Saldo</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td class="text-center">21 Mei 2020</td>
                                        <td class="text-right">-</td>
                                        <td class="text-right">-</td>
                                        <td class="text-right">Rp. 1.500.00</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td class="text-center">21 Mei 2020</td>
                                        <td class="text-right">-</td>
                                        <td class="text-right">-</td>
                                        <td class="text-right">Rp. 3.500.00</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td class="text-center">21 Mei 2020</td>
                                        <td class="text-right">-</td>
                                        <td class="text-right">-</td>
                                        <td class="text-right">Rp. 4.500.00</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    <div class="section-title">Pencairan Saldo</div>
                                    <p class="section-lead">Pencairan saldo bisa dilakukang dengan mengontak admin </p>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Saldo</div>
                                        <div class="invoice-detail-value">$670.99</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-md-right">
                    <div class="float-lg-left mb-lg-0 mb-3">
                        <button class="btn btn-outline-primary btn-icon icon-left"><i class="fas fa-file-excel"></i> Export to Excel </button>
                        <button class="btn btn-outline-primary btn-icon icon-left"><i class="fas fa-file-pdf"></i> Export to PDF </button>
                        <!-- <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button> -->
                    </div>
                    <!-- <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button> -->
                </div>
            </div>
        </div>
</div>
</section>
</div>
<?php $this->load->view('_partials/footer'); ?>