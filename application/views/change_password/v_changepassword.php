<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_partials/header');
?>
<style>
    div#myalert {
        position: absolute;
        margin-top: -3rem;
        width: 25.46875rem;
    }
</style>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="container col-5">
                    <div id="myalert" class="text-center">
                        <?php echo $this->session->flashdata('alert', true); ?>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4> <?=$title?></h4>
                        </div>
                        <div class="card-body">
                            <!-- <p class="text-muted">Masukan kata sandi baru </p> -->
                            <form method="post" action="<?=base_url('operator/changepassword');?>" class="needs-validation" novalidate="">
                                <div class="form-group">
                                    <label for="email">New Password </label>
                                    <input id="newPassword" type="password" class="form-control" name="newPassword" tabindex="2" required autofocus minlength="5">
                                    <p class="text-muted"> panjang minimal 6 karakter </p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Confirm New Password </label>
                                    <input id="confirmPassword" type="password" class="form-control" name="confirmPassword" tabindex="3" required autofocus minlength="5">
                                    <p class="text-muted"> panjang minimal 6 karakter </p>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Change Password" class="btn btn-primary btn-lg btn-block" name="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('_partials/footer');?>
<script>
    $('#myalert').delay(2500).slideUp('slow');
</script>