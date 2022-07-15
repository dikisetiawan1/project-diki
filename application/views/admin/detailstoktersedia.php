<!DOCTYPE html>
<html lang="en">





<!-- Begin Page Content -->
<div class="container-fluid justify-content-center ">

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/stokbarang/tersedia') ?>">Data</a></li>
                        <li class="breadcrumb-item  active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <!-- Content Row -->
        <div class="card mx-auto  shadow d-flex align-items-center " style="height: 60%; width:45%; ">
            <div class="row">
                <div class="col-4 mt-4">

                    <a href="<?= base_url('admin/stokbarang/tersedia') ?>" class="me-4 ">Back<i class="fa fa-fw fa-reply text-gray-300 "></i></a>
                </div>
                <div class="col-8 text-right mt-4">

                    <a href="#" class="btn btn-warning ml-1 pt-2 pb-3  me-2"><i class="fas fa-fw fa-print"></i></a>
                </div>
                <div class="col-12 ">


                    <?php foreach ($detail as $d) : ?>

                        <table class="table">

                            <tr>
                                <td>
                                    <b>Kode Barang</b>
                                </td>
                                <td>:</td>
                                <td>
                                    <?= $d->id_barang ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Nama Barang</b>
                                </td>
                                <td>:</td>
                                <td>
                                    <?= $d->nama_brg ?>
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td>
                                    <b> Kategori</b>
                                </td>
                                <td>:</td>
                                <td>
                                    <?= $d->nama_kategori ?>
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td>
                                    <b> Stok barang</b>
                                </td>
                                <td>:</td>
                                <td>
                                    <?= $d->stok_brg ?>
                                </td>
                            </tr>

                        </table>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- 
            

</div>