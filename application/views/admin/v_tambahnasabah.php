<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="card card-primary">
            <div class="card-header">
                <h3> <?= $title; ?> </h3>
            </div>
            <div class="card-body">
                <form action="" class="needs-validation" novalidate="">
                    <div class="card card-dark">
                        <div class="card-body">
                            <div class="row">
                                <p class="text-muted col-2 text-right"> Informasi Pribadi </p>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label text-right">Nama Lengkap</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" id="" placeholder="Nama" required>
                                    <div class="invalid-feedback">
                                        Masukan nama lengkap calon nasabah?
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Alamat</label>
                                <div class="col-sm">
                                    <textarea class="form-control" placeholder="Alamat" required></textarea>
                                    <div class="invalid-feedback">
                                        Oops! masukan alamat calon nasabah
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">No Telefon </label>
                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control phone-number" id="phoneNumber" placeholder="08123456789" required maxlength="12">
                                        <div class="invalid-feedback">
                                            Oops! tambahkan kontak telefon
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->
                            <!-- </div> -->
                            <div class="row">
                                <p class="text-muted col-2 text-right"> Informasi akun anda </p>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Username</label>
                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Oops! username masih kosong
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Password</label>
                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        </div>
                                        <input type="password" class="form-control pwstrength" data-indicator="pwindicator" id="pwstrength" required>
                                        <div class="invalid-feedback">
                                            Ketik password untuk akun calon nasabah
                                        </div>
                                    </div>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label text-right"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('_partials/footer'); ?>