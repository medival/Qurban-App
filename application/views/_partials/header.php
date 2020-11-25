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
  if (($this->uri->segment(2) == "siswa") || ($this->uri->segment(2) == "transaksi") || ($this->uri->segment(2) == "rekap") || ($this->uri->segment(2) == "ruangkelas") || ($this->uri->segment(2) == "kelas") || ($this->uri->segment(2) == "operator") || ($this->uri->segment(2) == "usermanagement")) { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/prism.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.min.css">
  <?php
  } ?>

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
</head>

<?php
if ($this->uri->segment(1) == "operator") {
  $this->load->view('_partials/layout');
  $this->load->view('_partials/sidebar_operator');
} elseif ($this->uri->segment(1) == "ceksaldo") {
  $this->load->view('_partials/layout-3');
  // $this->load->view('_partials/navbar');
} elseif ($this->uri->segment(2) != "login" && $this->uri->segment(2) != "forgot_password" && $this->uri->segment(2) != "reset_password") {
  $this->load->view('_partials/layout');
  $this->load->view('_partials/sidebar');
}
?>