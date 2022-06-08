<!DOCTYPE html>
<html lang="en">





<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><?= $scrumb; ?></a></li>
                    <li class="breadcrumb-item"><a href="#"><?= $function; ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <!-- Content Row -->
    <div class="row">


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-8">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Stok barang tersedia</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $barang2; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-2x fa-boxes text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-8">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Stok Barang kosong
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $stokBrg; ?></div>
                                </div>
                                <div class="col">
                                    <i class="fa fa-2x fa-x text-grey-300"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-xmark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-8">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data Barang Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $brgMasuk; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-2x  fa-reply text-gray-300"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-8">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Data barang keluar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $brgKeluar; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-2x  fa-share text-gray-300 "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







</div>
<!-- /.container-fluid -->

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 mt-4"><?= $title2; ?></h1>
    <div class="card shadow ">
        <table class="table table-hover card-shadow">
            <tr class="bg-secondary text-white rounded">
                <td>#</td>
                <td>Nama barang</td>
                <td>Kategori</td>
                <td>Harga barang</td>
                <td>Stok</td>

            </tr>
            <?php $no = 1;
            foreach ($barang as $br) : ?>


                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $br->nama_brg ?></td>
                    <td><?= $br->nama_kategori ?></td>
                    <td><?= $br->hrg_brg ?></td>
                    <td><?= $br->stok_brg ?></td>



                </tr>
            <?php endforeach; ?>
        </table>


    </div>
</div>

</div>
<!-- End of Main Content -->