<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url(); ?>dist/index">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url(); ?>dist/index">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Manajemen</li>
      <!-- <li class="dropdown <?php echo $this->uri->segment(2)  == 'index' ? 'active' : ''; ?>"> -->
      <!-- <a href="<?php echo base_url("admin/index"); ?>" class=" nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a> -->
      <!-- <ul class="dropdown-menu"> -->
      <!-- <li class="<?php echo $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/index_0">General Dashboard</a></li>
          <li class="<?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/index">Ecommerce Dashboard</a></li> -->
      <!-- </ul> -->
      <!-- </li> -->

      <li class="<?php echo $this->uri->segment(2) == '' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url("admin"); ?> ">
          <i class="fas fa-tachometer-alt fa-fw"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'transaksi' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url("admin/transaksi"); ?> ">
          <i class="fas fa-coins fa-fw"></i> <span>Transaksi</span></a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'nasabah' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url("admin/nasabah"); ?> ">
          <i class="fas fa-users fa-fw"></i> <span>Nasabah</span></a>
      </li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'kelas' || $this->uri->segment(2) == 'ruangkelas' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-university"></i> <span>Kelas</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'ruangkelas' ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/ruangkelas'); ?>">Ruang Kelas </a></li>
          <li class="<?php echo $this->uri->segment(2) == 'kelas' ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/kelas'); ?>">Kelas</a></li>
        </ul>
      </li>
    </ul>

    <ul class="sidebar-menu">
      <li class="menu-header"> Setting </li>
      <li class="<?php echo $this->uri->segment(2) == 'setting' ? 'active' : ''; ?>">
        <a href="<?= base_url("admin/setting"); ?>" class="nav-link has-dropdown">
          <i class="fas fa-cog fa-fw"></i><span>Setting </span>
        </a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'adminprofile' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('admin/profile'); ?>"> Admin Profile </a></li>
          <li class="<?php echo $this->uri->segment(2) == 'features_post_create' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/features_post_create">Post Create</a></li>
        </ul>
      </li>
    </ul>
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Documentation
      </a>
    </div>
  </aside>
</div>