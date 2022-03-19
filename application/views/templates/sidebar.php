<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="col-lg  ">
            <h1>SILP</h1>
        </div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item a active">
        <a class="nav-link" href="<?= base_url("dashboard"); ?>">
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
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw  fa-folder"></i>


            <span>Data master barang</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data barang</h6>
                <a class="collapse-item" href="buttons.html">Barang masuk</a>
                <a class="collapse-item" href="cards.html">Barang keluar</a>
                <a class="collapse-item" href="cards.html">Stok barang</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa fa-fw fa-file-invoice"></i>
            <span>Data transaksi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data transaksi</h6>
                <a class="collapse-item" href="utilities-color.html">Pemesanan barang</a>
                <a class="collapse-item" href="utilities-color.html">Data supplier</a>


            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-target="#collapsePages" aria-expanded="true" aria-controls="">
            <i class="fa fa-fw  fa-print"></i>
            <span>Laporan</span>
        </a>
    <li class="nav-item">
        <a class="nav-link" href="#" data-target="#collapsePages" aria-expanded="true" aria-controls="">
            <i class="fas fa-fw  fa-cog"></i>
            <span>Setting</span>
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