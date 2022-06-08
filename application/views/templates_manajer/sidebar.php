<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="col-lg  mt-5    ">

            <h5 class="mt-3">SILP</h5>
        </div>

    </a>
    <br>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item a active">
        <a class="nav-link" href="<?= base_url("manajer/dashboard"); ?>">
            <i class="fas fa-fw fa-tachometer-alt "></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
            <i class="fa fa-fw fa-print"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Laporan</h6>
                <a class="collapse-item" href="<?= base_url('manajer/laporan/L_barangMasuk') ?>">Laporan barang masuk</a>
                <a class="collapse-item" href="<?= base_url('manajer/laporan/L_barangKeluar') ?>">Laporan barang keluar</a>
            </div>
        </div>

    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3" aria-expanded="true" aria-controls="collapseUtilities3">
            <i class="fa fa-fw fa-box-open"></i>
            <span>Stok barang</span>
        </a>
        <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Stok barang</h6>
                <a class="collapse-item" href="<?= base_url('manajer/stokbarang/'); ?>">Barang kosong</a>
                <a class="collapse-item" href="<?= base_url('manajer/stokbarang/tersedia') ?>">Barang Tersedia</a>
            </div>
        </div>

    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link" href="#" data-target="#collapsePages" aria-expanded="true" aria-controls="">
            <i class="fa fa-fw fa-unlock"></i>
            <span>Ubah password</span>
        </a>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('manajer/users'); ?>" data-target="#collapsePages" aria-expanded="true" aria-controls="">
            <i class="fa fa-fw fa-users"></i>
            <span>User</span>
        </a>

    </li>


    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-target="#collapsePages" aria-expanded="true" aria-controls="">
            <i class="fas  fa-sign-out-alt fa-sm fa-fw mr-2 "></i>
            <span>Logout</span>
        </a>

    </li>

    <!-- Nav Item - Charts -->


    <!-- Nav Item - Tables -->



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->