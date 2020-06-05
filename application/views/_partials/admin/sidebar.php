<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion min-vh-90" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('/admin')?>">
  <div class="sidebar-brand-icon rotate-n-15">
    <img src="<?php echo base_url('/assets/img/favicon/favicon.png')?>" alt="">
  </div>
  <div class="sidebar-brand-text mx-3">Cam|era</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?php echo base_url('/admin/kamera')?>">
    <i class="fas fa-fw fa-calendar-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Menu
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
    <i class="fas fa-fw fa-camera-retro"></i>
    <span>Camera</span>
  </a>
  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item text-danger" href="<?php echo base_url('/admin/kamera')?>">Data Camera</a>
      <a class="collapse-item text-danger" href="<?php echo base_url('/admin/kamera/tambah')?>">Tambah Camera</a>
    </div>
  </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-chart-line"></i>
    <span>Penjualan</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item text-danger" href="<?php echo base_url('/admin/jual')?>">Penjualan - Berlangsung</a>
      <a class="collapse-item text-danger" href="<?php echo base_url('/admin/jual/selesai')?>">Penjualan - Selesai</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item -->
<li class="nav-item">
<div class="nav-link"></div>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item logout -->
<li class="nav-item">
  <a class="nav-link" href="<?php echo base_url('/auth/logout')?>">
    <i class="fas fa-fw fa-power-off text-white"></i>
    <span class="text-white">Logout</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->