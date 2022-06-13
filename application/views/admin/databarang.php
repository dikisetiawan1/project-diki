<!DOCTYPE html>
<html lang="en">





<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Master barang</a></li>
                    <li class="breadcrumb-item"><a href="#">Index</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <!-- Content Row -->
    <div class="row">
        <div class="col-8">
            <a href="<?= base_url('admin/barangmasuk/tambah') ?>" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">Tambah data </a>
            <a href=" <?= base_url('admin/dataBarang/cetakData') ?>" class="btn btn-warning mb-2 ml-1 pt-2 pb-3"><i class="fas fa-print"></i></a>
            <a href="#" class="btn btn-success mb-2 ml-1 pt-2 pb-3 "><i class="fas fa-file-excel"></i></a>
        </div>

        <div class="col-4">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success ml-2" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="col-12">
        <?= $this->session->flashdata('pesan') ?>
    </div>



    <div class="card shadow">
        <table class="table table-hover card-shadow">
            <tr class="bg-secondary text-white rounded">
                <td>#</td>
                <td>Nama barang</td>
                <td>Kategori</td>
                <td>Harga barang</td>
                <td>Stok</td>
                <td>Aksi</td>
            </tr>
            <?php $no = 1;
            foreach ($barang as $br) : ?>


                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $br->nama_brg ?></td>
                    <td><?= $br->nama_kategori ?></td>
                    <td><?= $br->hrg_brg ?></td>
                    <td><?= $br->stok_brg ?></td>


                    <td>
                        <a href="<?= base_url('admin/dataBarang/updateData/' . $br->id_barang) ?>" class="btn btn-primary" data-placement="top" title="Edit data"><i class="fas fa-fw fa-edit"></i></a>
                        <a onclick=" return confirm('yakin di hapus?')" href="<?= base_url('admin/databarang/deleteData/' . $br->id_barang) ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Hapus data"></i></a>
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
    <!-- Vertically centered modal -->

    <div class="container">


        <!-- Modal -->
        <div id="myModal" class="modal fade " role="dialog">
            <div class="modal-dialog">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">

                        <h4 class="modal-title">Form Tambah Barang</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <form method="post" action="<?= base_url('admin/databarang/tambahDataAksi') ?>">
                            <div class="mb-3">
                                <label for="kodeBarang" class="form-label">Kode Barang</label>
                                <input type="text" class="form-control" id="id_barang" name="id_barang" placeholder="Input kode barang">

                            </div>
                            <div class="mb-3">
                                <label for="jenisBarang" class="form-label">Nama barang</label>
                                <input type="text" class="form-control" id="nama_brg" name="nama_brg" placeholder="Input nama barang">

                            </div>
                            <div class="mb-3">
                                <label>Kategori</label>
                                <select class="form-control " name="id_kategori">
                                    <option>--Pilih kategori--</option>
                                    <?php
                                    foreach ($kategori as $k) : ?>

                                        <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_barang', '<div class="text-small text-danger"></div>') ?>
                            </div>
                            <div class="mb-3">
                                <label for="kodeBarang" class="form-label">Harga Barang</label>
                                <input type="text" class="form-control" id="hrg_brg" name="hrg_brg" placeholder="Input harga barang">

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


        <!-- modal edit-->


    </div>
    <!-- End of Main Content -->