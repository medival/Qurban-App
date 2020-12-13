<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?=base_url('operator')?>">QURBAN App</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?=base_url('operator')?>">Qur</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">MANAJEMEN OPERATOR</li>
      <li class="<?php echo $this->uri->segment(2) == 'index' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url("operator/index"); ?> ">
          <i class="fas fa-tachometer-alt fa-fw"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'siswa' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url("operator/siswa"); ?> ">
          <i class="fas fa-users fa-fw"></i> <span>Siswa</span></a>
      </li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'transaksi' ? 'active' : ''; ?>">
        <a href="<?php echo base_url('operator/transaksi'); ?>" class="nav-link"><i class="fas fa-coins"></i> <span>Transaksi</span></a>
      </li>
      <li>
        <a class="nav-link text-danger" href="<?php echo base_url("auth/logout"); ?> ">
          <i class="fas fa-sign-out-alt fa-fw"></i> <span>Logout</span></a>
      </li>
    </ul>
  </aside>
</div>