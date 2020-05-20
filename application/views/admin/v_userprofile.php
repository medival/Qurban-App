<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('admin/_partials/header');
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
                <div class="card author-box card-primary">
                    <div class="card-body">
                        <div class="author-box-left">
                            <img alt="image" src="http://localhost:8888/tabungan/assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture">
                            <div class="clearfix"></div>
                            <!-- <a href="#" class="btn btn-primary mt-3 follow-btn" data-follow-action="alert('follow clicked');" data-unfollow-action="alert('unfollow clicked');">Follow</a> -->
                        </div>
                        <div class="author-box-details">
                            <div class="author-box-name">
                                <a href="#">Hasan Basri</a>
                            </div>
                            <div class="author-box-job"> Join 20 Mei 2020</div>
                            <div class="author-box-description">
                                <span class="badge badge-success">Aktif</span>
                            </div>
                            <div class="mb-2 mt-3">
                                <!-- <div class="text-small font-weight-bold">Follow Hasan On</div> -->
                            </div>
                            <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon mr-1 btn-github">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <div class="w-100 d-sm-none"></div>
                            <div class="float-right mt-sm-0 mt-3">
                                <!-- <a href="#" class="btn">View Posts <i class="fas fa-chevron-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
<?php $this->load->view('admin/_partials/footer'); ?>