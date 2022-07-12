<!DOCTYPE html>
<html lang="en">





<!-- Begin Page Content -->
<div class="container-fluid ">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Home</li>
                    <li class="breadcrumb-item"></li>
            </nav>
        </div>
    </div>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 "><?= $title ?></h1>

    <!-- Content Row -->
    <div class="row">


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-8">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Data barang master</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $barang; ?></div>
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
    <h1 class="h5 mb-2 mt-4  text-success "><?= $title2 ?></h1>

    <div class="card shadow">
        <table class="table table-hover card-shadow ">
            <tr class="bg-secondary text-white rounded">
                <td>#</td>
                <td>Nama barang</td>
                <td>Tgl masuk</td>
                <td>Harga barang</td>
                <td>Supplier</td>
                <td>Qty</td>

            </tr>
            <?php $no = 1;
            foreach ($barangmasuk as $bm) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $bm->nama_brg ?></td>
                    <td><?= $bm->tgl_masuk ?></td>
                    <td><?= $bm->hrg_barang ?></td>
                    <td><?= $bm->nama_supplier ?></td>
                    <td><?= $bm->stok_masuk ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>

</div>
<div class="container-fluid">
    <h1 class="h5 mb-2 mt-4  text-danger "><?= $title3 ?></h1>

    <div class="card shadow">
        <table class="table table-hover card-shadow ">
            <tr class="bg-secondary text-white rounded">
                <td>#</td>
                <td>Nama barang</td>
                <td>Tgl keluar</td>
                <td>Cabang</td>
                <td>Unit</td>
                <td>Qty</td>

            </tr>
            <?php $no = 1;
            foreach ($barangkeluar as $bk) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $bk->nama_brg ?></td>
                    <td><?= $bk->tanggal_keluar ?></td>
                    <td><?= $bk->cabang ?></td>
                    <td><?= $bk->unit ?></td>
                    <td><?= $bk->stok_keluar ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>

</div>

</div>
<!-- End of Main Content -->