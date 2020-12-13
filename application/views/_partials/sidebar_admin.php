<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url('admin'); ?>">QURBAN App</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url('admin'); ?>">Qur</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">MANAJEMEN ADMIN</li>
      <li class="<?php echo $this->uri->segment(2) == '' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url("admin"); ?> ">
          <i class="fas fa-tachometer-alt fa-fw"></i> <span>Dashboard</span>
        </a>
      </li>

      <!-- Enable this if needed -->
      <li class="<?php echo $this->uri->segment(2) == 'siswa' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url("admin/siswa"); ?> ">
          <i class="fas fa-users fa-fw"></i> <span>Siswa</span></a>
      </li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'transaksi' ? 'active' : ''; ?>">
        <a href="<?php echo base_url('admin/transaksi'); ?>" class="nav-link <?php echo $this->uri->segment(2) == 'transaksi' ? 'active' : ''; ?>"><i class="fas fa-coins"></i> <span>Transaksi</span></a>
      </li>
      <!-- Enable this if needed -->

      <li class="dropdown <?php echo $this->uri->segment(2) == 'kelas' || $this->uri->segment(2) == 'ruangkelas' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-university"></i> <span>Kelas</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'ruangkelas' ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/ruangkelas'); ?>">Ruang Kelas </a></li>
          <li class="<?php echo $this->uri->segment(2) == 'kelas' ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/kelas'); ?>">Kelas</a></li>
        </ul>
      </li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'adminstrator' || $this->uri->segment(2) == 'operator' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-tie"></i> <span>User Management</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'adminstrator' ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/adminstrator'); ?>">Adminstrator </a></li>
          <li class="<?php echo $this->uri->segment(2) == 'operator' ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/operator'); ?>">Operator</a></li>
        </ul>
      </li>
      <li class="">
        <a href="<?=base_url("auth/logout");?>" class="nav-link text-danger"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>
      </li>
    </ul>
  </aside>
</div>