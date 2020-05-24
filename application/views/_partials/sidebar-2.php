<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand sidebar-gone-show"><a href="<?php echo base_url(); ?>dist/index">Stisla</a></div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/index_0">General Dashboard</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/index">Ecommerce Dashboard</a></li>
        </ul>
      </li>
      <li class="menu-header">Starter</li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'layout_transparent' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/layout_default">Default Layout</a></li>
          <li class="<?php echo $this->uri->segment(2) == 'layout_transparent' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/layout_transparent">Transparent Sidebar</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/layout_top_navigation">Top Navigation</a></li>
        </ul>
      </li>
      <li><a class="nav-link" href="<?php echo base_url(); ?>dist/blank"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_alert">Alert</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_badge">Badge</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_breadcrumb">Breadcrumb</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_buttons">Buttons</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_card">Card</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_carousel">Carousel</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_collapse">Collapse</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_dropdown">Dropdown</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_form">Form</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_list_group">List Group</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_media_object">Media Object</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_modal">Modal</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_nav">Nav</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_navbar">Navbar</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_pagination">Pagination</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_popover">Popover</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_progress">Progress</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_table">Table</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_tooltip">Tooltip</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_typography">Typography</a></li>
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