<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="card card-primary">
            <div class="card-header">
                <h3><?=$title;?></h3>
                <div class="card-body">
                    <div class="buttons">
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAktivasi" id="btnModalAktivasi">
                            <i class="fa fa-user-plus"></i> Aktivasi
                        </button>

                        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#modalKredit" id="btnKredit">
                            <i class="fa fa-plus"></i> Setor Tunai
                        </button>

                        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#modalDebet" id="btnDebet">
                            <i class="fa fa-minus"></i> Tarik Tunai
                        </button>
                        <button class="btn btn-outline-info" data-toggle="modal" data-target="#modalRekap" id="btnRekap">
                            <i class="fa fa-suitcase"></i> Rekap
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body" id="paper">
                <div class="card-header">
                    <h4> Informasi Tambahan </h4>
                    <div class="card-header-action">
                        <a data-collapse="#mycard-collapse" class="btn btn-icon" href="#"><i class="fas fa-minus"></i></a>
                    </div>
                </div>
                <div class="collapse show" id="mycard-collapse">
                    <div class="card-body row">
                        <div class="col-md-6">

                            NIS - <label class="font-weight-bold" id="infoNIS">-</label> <br>
                            Username - <label class="font-weight-bold" id="infoNama">-</label><br>
                            Kelas - <label class="font-weight-bold" id="infoKelas">-</label><br>
                            Wali Kelas - <label class="font-weight-bold" id="infoOperator">-</label><br>
                        </div>
                        <div class="col-md-6 text-md-right">

                            <label class="font-weight-bold" id="infoCreatedAt">-</label> - Terdaftar <br>
                            <label class="font-weight-bold" id="infoJumlahTransaksi">-</label> - Total Transaksi <br>
                            <label class="font-weight-bold timeago" id="infoTerakhirTransaksi">-</label> - Transaksi Terakhir <br>
                            <label class="font-weight-bold" id="infoSaldo">-</label> - Saldo
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th style="width: 2rem"> # </th>
                                <th style="width: 13rem"> Nama </th>
                                <th> Tanggal </th>
                                <th> Operator </th>
                                <th> Kredit </th>
                                <th> Debet </th>
                                <th> Saldo </th>
                            </tr>
                        </thead>
                        <tbody id="tb_transaksi">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-icon icon-left" id="btnCetakPDF"><i class="fas fa-print"></i> Save to PDF</button>
    </section>
</div>

<!-- Modal Aktivasi -->
<div class="modal fade" tabindex="" role="dialog" id="modalAktivasi">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Aktivasi Nasabah </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label> Cari Nasabah</label>
                    <div class="input" id="inputNasabah">
                        <select class="form-control select2 findNasabah" style="width: 28.25rem" id="findNasabah">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <p class="text-center"> Anda akan mengaktivasi? </p>
                    <h5 class="text-center" id="idAktivasi"> Username </h5>
                    <input type="hidden" class="form-control" name="inputidaktivasi" id="inputidaktivasi">
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btnAktivasi">Aktivasi</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal End of Aktivasi -->

<!-- Modal Kredit  -->
<div class="modal fade" tabindex="" role="dialog" id="modalKredit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Kredit Tunai </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" class="needs-validation" novalidate="">
                <div class="modal-body">
                    <div class="form-group">
                        <label> Cari Nasabah</label>
                        <select class="form-control select2 findNasabahKredit" style="width: 28.25rem" id="findNasabahKredit">
                        </select>
                    </div>

                    <div class="form-group row text-center" style="width: 28.125rem; margin-left: 0.10rem">
                        <div class="card card-primary col-6">
                            <div class="card-body">
                                <label class="card-title">Nasabah</label>
                                <h6 class="username" id="userKredit">
                                    Nama nasabah
                                </h6>
                            </div>
                        </div>
                        <div class="card card-danger col-6">
                            <div class="card-body">
                                <label class="card-title"> Saldo </label>
                                <h5 class="userJumlahSaldo" id="userJumlahSaldo">
                                    0
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label> Nominal </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Rp
                                </div>
                            </div>
                            <input type="text" class="form-control inputNominalKredit" name="inputNominalKredit" id="inputNominalKredit" required>
                            <div class="invalid-feedback">
                                Input Nominal
                            </div>
                            <input type="hidden" name="inputNISKredit" id="inputNISKredit" class="form-control">
                            <input type="hidden" name="inputNIPKredit" id="inputNIPKredit" class="form-control" placeholder="nip">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnInputKredit"> Kredit Tunai </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Kredit  -->

<!-- Modal Debet  -->
<div class="modal fade" tabindex="" role="dialog" id="modalDebet">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Tarik Tunai </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" class="needs-validation" novalidate="">
                <div class="modal-body">
                    <div class="form-group">
                        <label> Cari Nasabah</label>
                        <select class="form-control select2 findNasabahDebet" style="width: 28.25rem" id="findNasabahDebet">
                        </select>
                    </div>
                    <div class="row" style="width: 28.125rem; margin-left: 0.10rem">
                        <div class="card card-primary col-6 text-center">
                            <div class="card-body">
                                <label class="card-title">Nasabah</label>
                                <h6 class="username" id="userDebet">
                                    Nama Nasabah
                                </h6>
                            </div>
                        </div>
                        <div class="card card-danger col-6 text-center">
                            <div class="card-body">
                                <label class="card-title"> Saldo </label>
                                <h5 class="userJumlahSaldo" id="userJumlahSaldo2">
                                    0
                                </h5>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="inputNISDebet" id="inputNISDebet" class="form-control">
                    <input type="hidden" name="inputNIPDebet" id="inputNIPDebet" class="form-control">
                    <input type="hidden" name="cekSaldo" id="cekSaldo" class="form-control">

                    <div class="form-group">
                        <label for="" class=" col-form-label"> Nominal </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Rp
                                </div>
                            </div>
                            <input type="text" class="form-control inputNominalDebet" name="inputNominalDebet" id="inputNominalDebet" placeholder="" required>
                            <div class="invalid-feedback">
                                Masukan Nominal
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btnInputDebet"> Debet Tunai </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Debet  -->

<!-- Modal Rekap -->
<div class="modal fade" tabindex="" role="dialog" id="modalRekap">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Modal Rekap </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label> Cari Nasabah</label>
                    <select class="form-control select2 findRekapNasabah" style="width: 28.25rem" id="findRekapNasabah">
                    </select>
                </div>
                <input type="hidden" name="inputNISRekap" id="inputNISRekap" class="form-control">
                <div class="row" style="width: 28.125rem; margin-left: 0.10rem">
                    <div class="card card-primary text-center col-12">
                        <div class="card-body">
                            <label class="card-title">Nasabah</label>
                            <h6 class="username" id="userRekap">
                                username
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnRekapData"> Rekap Data </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Rekap -->

<?php $this->load->view('_partials/footer');?>