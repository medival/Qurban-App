<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Manajemen</li>
      <li class="<?php echo $this->uri->segment(2) == 'index' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url("operator/index"); ?> ">
          <i class="fas fa-tachometer-alt fa-fw"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'transaksi' ? 'active' : ''; ?>">
        <a href="<?php echo base_url('operator/transaksi'); ?>" class="nav-link"><i class="fas fa-coins"></i> <span>Transaksi</span></a>
      <li class="<?php echo $this->uri->segment(2) == 'nasabah' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url("operator/nasabah"); ?> ">
          <i class="fas fa-users fa-fw"></i> <span>Nasabah</span></a>
      </li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Documentation
      </a>
    </div>
  </aside>
</div>