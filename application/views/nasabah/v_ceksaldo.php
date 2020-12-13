<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link href="<?php echo base_url(); ?>assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
  <title><?php echo $title; ?> &mdash; QURBAN </title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

  <!-- CSS Libraries -->
  <?php
if (($this->uri->segment(2) == "siswa") || ($this->uri->segment(2) == "transaksi") || ($this->uri->segment(2) == "rekap") || ($this->uri->segment(2) == "ruangkelas") || ($this->uri->segment(2) == "kelas") || ($this->uri->segment(2) == "operator") || ($this->uri->segment(2) == "usermanagement") || ($this->uri->segment(2) == "adminstrator")) {?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/prism.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.min.css">
  <?php
}?>

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
</head>
<style>
</style>
<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand main-navbar">
        <a href="<?=base_url('/ceksaldo');?>" class="navbar-brand" style="z-index: 99; margin: 2.5rem auto 0 15rem"> QURBAN </a>
        <a href="<?=base_url();?>" class="btn btn-light btn-lg" style="margin: 2.5rem 15rem 0 auto; width: 7rem"> Login  </a>
      </nav>
        <!-- Main Content -->
        <div class="main-content">
            <div class="container">
                <div class="card">
                    <div class="">
                        <form action="#" class="needs-validation" novalidate="">
                            <div class="input-group">
                                <input type="text" class="form-control text-center" placeholder="Masukan 4 digit NIS" id="inputNIS" required maxlength="4">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" id="btnSearch"><i class="fas fa-search"></i> Search </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix mb-3"></div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableutama">
                                <tr>
                                    <td class="text-center">
                                        <h5>EMPTY</h5>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="main-footer">
        <div class="footer-left" style="margin-left: 15rem">
            Copyright &copy; <?=date('Y')?> <div class="bullet"></div>  Skripsi Tabungan Qurban <div class="bullet"></div> Yusuf Sugiarto <div class="bullet"></div> STI201702547
        </div>
    </footer>
</div>

<?php $this->load->view('_partials/js');?>