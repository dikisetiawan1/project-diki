<!DOCTYPE html>
<html lang="en">





<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Data</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>


    <!-- Content Row -->
    <div class="row">
        <div class="col-8">

            <a href="#" class="btn btn-primary mb-2 " data-toggle="modal" data-target="#myModal">Tambah Data</a>
            <a href="<?= base_url('admin/transaksiBarangMasuk/cetakData') ?>" class="btn btn-warning mb-2 pt-2 pb-3"><i class="fas fa-print"></i></a>
        </div>
        <div class="col-4">
            <form class="d-flex" action="<?= base_url('admin/transaksibarangmasuk'); ?>" method="post">
                <input class="form-control me-2" type="text" placeholder="Search keyword.." aria-label="Search" name="keyword" autofocus>
                <input class="btn btn-outline-success ml-2" type="submit" name="submit"></input>
            </form>
        </div>


    </div>
    <?= $this->session->flashdata('pesan') ?>

    <div class="card shadow">
        <table class="table table-hover card-shadow ">
            <tr class="bg-secondary text-white rounded">
                <td>#</td>
                <td>Nama barang</td>
                <td>Tgl masuk</td>
                <td>Qty</td>
                <td>Supplier</td>
                <td>Aksi</td>
            </tr>
            <?php
            foreach ($barangmasuk as $bm) : ?>
                <tr>
                    <td><?= ++$start; ?></td>
                    <td><?= $bm['nama_brg'] ?></td>
                    <td><?= $bm['tgl_masuk'] ?></td>
                    <td><?= $bm['stok_masuk'] ?></td>
                    <td><?= $bm['nama_supplier'] ?></td>


                    <td>

                        <a href="<?= base_url('admin/transaksibarangmasuk/details/' . $bm['id_brgMasuk']) ?>" class="btn btn-success ml-1 pt-2 pb-3  me-2" data-placement="top" title="Detail data"><i class="fa fa-fw fa-info-circle"></i></i>
                            <a href="<?= base_url('admin/transaksibarangmasuk/details_cetak/' . $bm['id_brgMasuk']) ?>" class="btn btn-warning ml-1 pt-2 pb-3  me-2"><i class="fas fa-fw fa-print"></i></a>



                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
    <div class="container-fluid mt-3">

        <?= $this->pagination->create_links(); ?>
    </div>


    <div class="container">


        <!-- Modal -->
        <div id="myModal" class="modal fade " role="dialog">
            <div class="modal-dialog">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">

                        <h4 class="modal-title">Form Tambah transaksi barang</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <form method="post" action="<?= base_url('admin/Transaksibarangmasuk/tambahDataAksi') ?>">

                            <div class="mb-3">
                                <label>Nama barang</label>
                                <select class="form-control " name="id_barang">
                                    <option>--Pilih barang--</option>
                                    <?php
                                    foreach ($barang as $br) : ?>

                                        <option value="<?= $br->id_barang ?>"><?= $br->nama_brg ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="kodeBarang" class="form-label">Tgl masuk</label>
                                <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" placeholder="Input tgl masuk barang">
                                <?= form_error('tgl_masuk', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>
                            <div class="mb-3">
                                <label for="kodeBarang" class="form-label">Harga barang</label>
                                <input type="text" class="form-control" id="hrg_barang" name="hrg_barang" placeholder="Input harga barang">
                                <?= form_error('hrg_barang', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>
                            <div class="mb-3">
                                <label for="kodeBarang" class="form-label">Qty</label>
                                <input type="text" class="form-control" id="stok_masuk" name="stok_masuk" placeholder="Input qty barang">
                                <?= form_error('stok_masuk', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>
                            <div class="mb-3">
                                <label>Supplier</label>
                                <select class="form-control " name="id_supplier">
                                    <option>--Pilih supplier--</option>
                                    <?php
                                    foreach ($supplier as $su) : ?>

                                        <option value="<?= $su->id_supplier ?>"><?= $su->nama_supplier ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_supplier', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>

                        </form>
                    </div>
                    <!-- footer modal -->
                </div>
            </div>
        </div>
    </div>