<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url('admin'); ?>">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url('admin'); ?>">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Manajemen</li>
      <li class="<?php echo $this->uri->segment(2) == '' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url("admin"); ?> ">
          <i class="fas fa-tachometer-alt fa-fw"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'transaksi' ? 'active' : ''; ?>">
        <a href="<?php echo base_url('admin/transaksi'); ?>" class="nav-link <?php echo $this->uri->segment(2) == 'transaksi' ? 'active' : ''; ?>"><i class="fas fa-coins"></i> <span>Transaksi</span></a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'siswa' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url("admin/siswa"); ?> ">
          <i class="fas fa-users fa-fw"></i> <span>Siswa</span></a>
      </li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'kelas' || $this->uri->segment(2) == 'ruangkelas' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-university"></i> <span>Kelas</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'ruangkelas' ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/ruangkelas'); ?>">Ruang Kelas </a></li>
          <li class="<?php echo $this->uri->segment(2) == 'kelas' ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/kelas'); ?>">Kelas</a></li>
        </ul>
      </li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'usermanagement' ? 'active' : ''; ?>">
        <a href="<?= base_url("admin/usermanagement"); ?>" class="nav-link"><i class="fas fa-user-tie"></i> <span>User Management</span></a>
      </li>
      <li>
        <a href="<?= base_url("auth/logout"); ?>" class="nav-link text-danger"><i class="fas fa-sign-out"></i> <span>Logout</span></a>
      </li>
    </ul>
  </aside>
</div>