<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Essentials Variable -->
<?php
$admin = "admin";
$operator = "operator";
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
if (($this->uri->segment(2) == "siswa") || ($this->uri->segment(2) == "transaksi") || ($this->uri->segment(2) == "rekap") || ($this->uri->segment(2) == "ruangkelas") || ($this->uri->segment(2) == "kelas") || ($this->uri->segment(2) == $operator) || ($this->uri->segment(2) == "adminstrator")) {?>
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
}?>

<!-- Page Specific JS File -->
<?php
if (($this->uri->segment(2) == "siswa") || ($this->uri->segment(2) == "transaksi") || ($this->uri->segment(2) == "rekap") || ($this->uri->segment(2) == "ruangkelas") || ($this->uri->segment(2) == $operator) || ($this->uri->segment(2) == "kelas") || ($this->uri->segment(2) == "adminstrator")) {?>
  <script src="<?php echo base_url(); ?>assets/js/page/modules-datatables.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/bootstrap-modal.js"></script>
<?php }?>

<!-- Template JS File -->
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

<?php
if (($this->uri->segment(1) == $admin) && ($this->uri->segment(2) == "siswa")) {
    ?>
  <script src="<?=base_url();?>assets/js/admin/siswa.js"></script>
  <?php

} else if (($this->uri->segment(1) == $admin) && ($this->uri->segment(2) == "kelas")) {
    ?>
  <script src="<?=base_url();?>assets/js/admin/kelas.js"></script>
  <?php
} else if (($this->uri->segment(1) == $admin) && ($this->uri->segment(2) == "ruangkelas")) {
    ?>
  <script src="<?=base_url();?>assets/js/admin/ruangkelas.js"></script>
  <?php
} else if (($this->uri->segment(1) == $admin) && ($this->uri->segment(2) == "transaksi")) {
    ?>
  <script src="<?=base_url();?>assets/js/admin/transaksi.js"></script>
  <?php
} else if (($this->uri->segment(1) == $admin) && ($this->uri->segment(2) == "adminstrator")) {
    ?>
  <script src="<?=base_url();?>assets/js/admin/userman-admin.js"></script>
  <?php
} else if (($this->uri->segment(1) == $admin) && ($this->uri->segment(2) == $operator)) {
    ?>
  <script src="<?=base_url();?>assets/js/admin/userman-operator.js"></script>
  <?php
} else if (($this->uri->segment(1) == $operator) && ($this->uri->segment(2) == "siswa")) {
    ?>
  <script src="<?=base_url();?>assets/js/operator/siswa.js"></script>
  <?php
} else if (($this->uri->segment(1) == $operator) && ($this->uri->segment(2) == "transaksi")) {
    ?>
  <script src="<?=base_url();?>assets/js/operator/transaksi.js"></script>
  <?php
} else if (($this->uri->segment(1) == "ceksaldo")) {?>
  <script src="<?=base_url();?>assets/js/nasabah/cek-saldo.js"></script>
  <?php
}
?>
</body>

</html>