<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_partials/header');
?>
<style>
    div#myalert {
        position: absolute;
        width: 21.87375rem;
    }
</style>

<body>
    <div id="app">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div id="myalert">
                            <?php echo $this->session->flashdata('alert', true); ?>
                        </div>
                        <div class="login-brand mt-5">
                            <img src="<?= base_url(); ?>assets/img/logo.png" alt="logo" width="120" class="shadow-light rounded-circle">
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4><?= $title; ?></h4>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo base_url('auth/login'); ?>" role="login" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                        <div class="text-muted text-small"> Use valid email </div>
                                        <div class="invalid-feedback">
                                            Check your email and make it sure valid OK
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required minlength="4">
                                        <div class="text-muted text-small"> Min password is 8 char </div>
                                        <div class="invalid-feedback">
                                            Writte correctly 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Login" class="btn btn-primary btn-lg btn-block" name="submit">
                                    </div>
                                </form>
                                    <a href="<?= base_url("ceksaldo")?>" type="button" value="Cek Saldo" class="btn btn-outline-info btn-lg btn-block"> Cek Saldo </a>
                                <div class="row sm-gutters">
                                </div>
                            </div>
                        </div>
                        <div class="simple-footer">
                            <div class="col-12 text-center">
                                Copyright &copy; <?= date('Y') ?> <br> 
                                Skripsi Tabungan Qurban <br>
                                Yusuf Sugiarto <div class="bullet"></div> STI201702547
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<!-- <script src="<?php echo base_url(); ?>assets/modules/notify/notify.min.js"></script> -->
<?php $this->load->view('_partials/js'); ?>
<script>
    $('#myalert').delay('slow').slideUp('slow').delay(7000).slideUp(100);
</script>