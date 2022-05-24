<!DOCTYPE html>
<html lang="en">





<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
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
            <a href="#" class="btn btn-warning mb-2 pt-2 pb-3"><i class="fas fa-print"></i></a>
        </div>
        <div class="col-4">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success ml-2" type="submit">Search</button>
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
                <td>Harga barang</td>
                <td>Jumlah stok</td>
                <td>Supplier</td>
                <td>Aksi</td>
            </tr>
            <?php $no = 1;
            foreach ($barangmasuk as $bm) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $bm->nama_brg ?></td>
                    <td><?= $bm->tgl_masuk ?></td>
                    <td><?= $bm->hrg_brg ?></td>
                    <td><?= $bm->stok_masuk ?></td>
                    <td><?= $bm->nama_supplier ?></td>


                    <td>
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-placement="top" title="Detail data"><i class="fa fa-fw fa-info-circle"></i></i>
                            <a onclick=" return confirm('yakin di hapus?')" href="<?= base_url('admin/transaksibarangkeluar/deleteData/' . $bm->id_brgMasuk) ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Hapus data"></i></a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
    <nav aria-label="Page navigation example fixed-bottom">
        <ul class="pagination justify-content-end p-4">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>

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
                                <?= form_error('id_barang', '<div class="text-small text-danger"></div>') ?>
                            </div>
                            <div class="mb-3">
                                <label for="kodeBarang" class="form-label">Tgl masuk</label>
                                <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" placeholder="Input tgl masuk barang">

                            </div>
                            <div class="mb-3">
                                <label for="kodeBarang" class="form-label">Harga barang</label>
                                <input type="text" class="form-control" id="hrg_brg" name="hrg_brg" placeholder="Input harga barang">

                            </div>
                            <div class="mb-3">
                                <label for="kodeBarang" class="form-label">Qty</label>
                                <input type="text" class="form-control" id="stok_masuk" name="stok_masuk" placeholder="Input qty barang">

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
                                <?= form_error('id_supplier', '<div class="text-small text-danger"></div>') ?>
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
    <!-- End modal Detail-->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">

                    <a href="#" type="submit" class="btn btn-danger">Print</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>