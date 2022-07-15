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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/transaksibarangmasuk') ?>">Data</a></li>
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

                    <a href="<?= base_url('admin/transaksibarangmasuk') ?>" class="me-4 ">Back<i class="fa fa-fw fa-reply text-gray-300 "></i></a>
                </div>




                <div class="col-12">


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
                                    <b> Tanggal masuk</b>
                                </td>
                                <td>:</td>
                                <td>
                                    <?= $d->tgl_masuk ?>
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td>
                                    <b> Harga barang</b>
                                </td>
                                <td>:</td>
                                <td>
                                    <?= $d->hrg_barang ?>
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td>
                                    <b> Qty</b>
                                </td>
                                <td>:</td>
                                <td>
                                    <?= $d->stok_masuk ?>
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td>
                                    <b> Supplier</b>
                                </td>
                                <td>:</td>
                                <td>
                                    <?= $d->nama_supplier ?>
                                </td>
                            </tr>
                        </table>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <!-- 
            

</div>