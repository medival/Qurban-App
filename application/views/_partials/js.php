<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>

<!-- JS Libraies -->
<?php
if (($this->uri->segment(2) == "siswa") || ($this->uri->segment(2) == "transaksi") || ($this->uri->segment(2) == "rekap") || ($this->uri->segment(2) == "ruangkelas") || ($this->uri->segment(2) == "kelas") || ($this->uri->segment(2) == "operator") || ($this->uri->segment(2) == "usermanagement") || ($this->uri->segment(2) == "adminstrator")) { ?>
  <script src="<?php echo base_url(); ?>assets/js-plugin/select2.full.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js-plugin/datatables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js-plugin/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js-plugin/dataTables.select.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js-plugin/jquery-ui.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js-plugin/prism.js"></script>
  <script src="<?php echo base_url(); ?>assets/js-plugin/jspdf.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js-plugin/jspdf.plugin.autotable.js"></script>
  <script src="<?php echo base_url(); ?>assets/js-plugin/cleave.min.js"></script>
<?php
} ?>

<!-- Page Specific JS File -->
<?php
if (($this->uri->segment(2) == "siswa") || ($this->uri->segment(2) == "transaksi") || ($this->uri->segment(2) == "rekap") || ($this->uri->segment(2) == "ruangkelas") || ($this->uri->segment(2) == "operator") || ($this->uri->segment(2) == "usermanagement") || ($this->uri->segment(2) == "adminstrator")) { ?>
  <script src="<?php echo base_url(); ?>assets/js/page/modules-datatables.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/bootstrap-modal.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets/js/page/forms-advanced-forms.js"></script> -->
<?php } ?>

<!-- Template JS File -->
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

<?php

// if (($this->uri->segment(1) == "admin") && ($this->uri->segment(2) == "siswa")) {
//   $this->load->view('admin/v_siswa_backend');
// } else if (($this->uri->segment(1) == "admin") && ($this->uri->segment(2) == "ruangkelas")) {
//   $this->load->view('admin/v_ruangkelas_backend');
// } else if (($this->uri->segment(1) == "admin") && ($this->uri->segment(2) == "kelas")) {
//   $this->load->view('admin/v_kelas_backend');
// } else if (($this->uri->segment(1) == "admin") && ($this->uri->segment(2) == "user")) {
//   $this->load->view('admin/v_user_backend');
// } else if (($this->uri->segment(1) == "admin") && ($this->uri->segment(2) == "transaksi")) {
//   $this->load->view('admin/v_transaksi_backend');
// } else if (($this->uri->segment(1) == "operator") && ($this->uri->segment(2) == "siswa")) {
//   $this->load->view('operator/v_siswa_backend');
// } else if (($this->uri->segment(1) == "operator") && ($this->uri->segment(2) == "transaksi")) {
//   $this->load->view('operator/v_transaksi_backend');
// }

?>
</body>

</html>