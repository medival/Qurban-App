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
                <div class="col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4> Total Saldo</h4>
                            </div>
                            <div class="card-body">
                                <?="Rp. " . number_format($info['totalSaldo'])?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4> Total Nasabah </h4>
                            </div>
                            <div class="card-body">
                                <?=$info['totalNasabah']?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Siswa</h4>
                            </div>
                            <div class="card-body">
                                <?=$info['totalSiswa']?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Operator</h4>
                            </div>
                            <div class="card-body">
                                <?=$info['totalOperator']?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4> Transaksi </h4>
                            </div>
                            <div class="card-body">
                                <?=$info['totalTransaksi']?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
                <div class="card-header">
                    <div class="ml-4">
                        <h4> Overall Report </h4>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border ml-4 mb-4 mr-5" id="report">
                        <?php foreach ($data as $row): ?>
                            <?php if (!$row['namaOperator']) {
    $namaOperator = "(Kosong)";
} else {
    $namaOperator = ($row['namaOperator']->name);
}
if (!$row['ruangKelas']) {
    $ruangKelas = "(Kosong)";
} else {
    $ruangKelas = $row['ruangKelas']->kelas;
}
?>

                            <li class="media">
                                <div class="media-body">
                                    <div class="float-right"><div class="font-weight-600"> <?=$row['jumlahSiswaKelas']->jmlSiswaKelas . " Siswa";?></div></div>
                                        <div class="media-title"> <?=$ruangKelas?> <div class="bullet"></div> <?=$namaOperator?>  </div>
                                            <div class="budget-price mt-1">
                                                <div class="budget-price-square bg-primary" data-width="<?=$row['presentase'];?>"></div>
                                                <div class="budget-price-label"> <?="Rp. " . number_format($row['jumlahSaldoKelas']->jmlSaldoKelas);?> </div>
                                        </div>
                                    </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
    </section>
</div>
<?php $this->load->view('_partials/footer');?>