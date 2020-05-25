<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $title; ?> &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.css">

  <!-- CSS Libraries -->
  <?php
  if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "index") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
  <?php
  } elseif (($this->uri->segment(2) == "nasabah") || ($this->uri->segment(2) == "transaksi") || ($this->uri->segment(2) == "rekap") || ($this->uri->segment(2) == "ruangkelas") || ($this->uri->segment(2) == "kelas") || ($this->uri->segment(2) == "operator") || ($this->uri->segment(2) == "usermanagement")) { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/prism/prism.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/select2/dist/css/select2.min.css">
  <?php
  } elseif ($this->uri->segment(2) == "auth_login") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-social/bootstrap-social.css">
  <?php
  } elseif ($this->uri->segment(2) == "ceksaldo") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jquery-selectric/selectric.css">
  <?php
  } ?>

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<?php
if ($this->uri->segment(1) == "operator") {
  $this->load->view('_partials/layout');
  $this->load->view('_partials/sidebar_operator');
} elseif ($this->uri->segment(2) == "ceksaldo") {
  $this->load->view('_partials/layout-3');
  // $this->load->view('_partials/navbar');
} elseif ($this->uri->segment(2) != "login" && $this->uri->segment(2) != "forgot_password" && $this->uri->segment(2) != "reset_password") {
  $this->load->view('_partials/layout');
  $this->load->view('_partials/sidebar');
}
?>