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
                            <img src="<?php echo base_url(); ?>assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4><?= $title; ?></h4>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo base_url('auth/login'); ?>" role="login" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="email">Username</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your username
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required minlength="4">
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Login" class="btn btn-primary btn-lg btn-block" name="submit">
                                    </div>
                                </form>
                                <div class="row sm-gutters">
                                </div>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<script src="<?php echo base_url(); ?>assets/modules/notify/notify.min.js"></script>
<?php $this->load->view('dist/_partials/js'); ?>
<script>
    $('#myalert').delay('slow').slideUp('slow').delay(3100).slideUp(100);
</script>