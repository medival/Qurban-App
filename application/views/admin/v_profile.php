<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1> <?= $title; ?></h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Hi, Ujang!</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>
            <div class="row mt-sm-4">
                <div class="card col-5">
                    <div class="card-header text-center">
                        <h4>Edit Account </h4>
                    </div>
                    <form action="#" method="post" class="needs-validation" novalidate="">
                        <div class="card-body">
                            <p> Informasi akun seperti password</p>
                            <div class="row form-group">
                                <div class="col-3">
                                    <figure class="avatar mr-2 avatar-xl">
                                        <img src="http://localhost:8888/tabungan/assets/img/avatar/avatar-1.png" alt="...">
                                    </figure>
                                </div>
                                <div class="col-9 mt-4">
                                    <h5> Ujang Maman </h5>
                                </div>
                            </div>
                            <div class="row mt-3 align-items-center">
                                <div class="col-4 text-right form-group">
                                    <label for=""> Username </label>
                                </div>
                                <div class="col-lg form-group">
                                    <input type="text" name="" id="" class="form-control" value="Ujang Maman">
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4 form-group text-right">
                                    <label for=""> Current Password </label>
                                </div>
                                <div class="col-lg form-group">
                                    <input type="password" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Ops! Password salah
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4 text-right form-group">
                                    <label for=""> New Password </label>
                                </div>
                                <div class="col-lg form-group">
                                    <input type="password" name="" id="" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Password masih kosong
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4 text-right form-group">
                                    <label for=""> Re-type Password </label>
                                </div>
                                <div class="col-lg form-group">
                                    <input type="password" name="" id="" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Passwod tidak match
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-8">
                                    <button type="submit" class="btn btn-primary"> Change Password </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- </div> -->
                <div class="col-7">
                    <div class="card">
                        <form method="post" action="#" class="needs-validation" novalidate="">
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <p> Informasi pribadi seperti nama, alamat dan sejenisnya</p>
                                <div class="row align-items-center">
                                    <div class="form-group col-3 text-right ">
                                        <label> Nama Lengkap </label>
                                    </div>
                                    <div class="form-group col-9">
                                        <input type="text" class="form-control" value="Ujang" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the first name
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="form-group col-3 text-right ">
                                        <label for=""> Alamat </label>
                                    </div>
                                    <div class="form-group col-9">
                                        <textarea name="" id="" class="form-control" required></textarea>
                                        <div class="invalid-feedback">
                                            Oops! Alamat kosong
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="form-group col-3 text-right ">
                                        <label>Email</label>
                                    </div>
                                    <div class="form-group col-9">
                                        <input type="email" class="form-control" value="ujang@maman.com" required="">
                                        <div class="invalid-feedback">
                                            Email tak boleh kosong
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="form-group col-3 text-right ">
                                        <label>Phone</label>
                                    </div>
                                    <div class="form-group col-9">
                                        <input type="tel" class="form-control" value="" required>
                                        <div class="invalid-feedback">
                                            Nomor telfon diperlukan
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-9">
                                        <button class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
<?php $this->load->view('_partials/footer'); ?>