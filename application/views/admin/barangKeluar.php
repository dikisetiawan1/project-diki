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

            <a href="#" class="btn btn-primary mb-2 " data-toggle="modal" data-target="#myModal">Tambah data </a>
            <a href="<?= base_url('admin/transaksiBarangKeluar/cetakData') ?>" class="btn btn-warning mb-2  pt-2 pb-3"><i class="fas fa-print"></i></a>
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
        <table class="table table-hover card-shadow">
            <tr class="bg-secondary text-white rounded">
                <td>#</td>
                <td>Nama barang</td>
                <td>Tanggal keluar</td>
                <td>Sekber</td>
                <td>Unit</td>
                <td>Qty</td>



                <td>Aksi</td>
            </tr>
            <?php $no = 1;
            foreach ($barang as $bk) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $bk->nama_brg ?></td>
                    <td><?= $bk->tanggal_keluar ?></td>
                    <td><?= $bk->cabang ?></td>
                    <td><?= $bk->unit ?></td>
                    <td><?= $bk->stok_keluar ?></td>
                    <td>
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-placement="top" title="Detail data"><i class="fa fa-fw fa-info-circle"></i></i></a>
                        <a onclick=" return confirm('yakin di hapus?')" href="<?= base_url('admin/transaksibarangkeluar/deleteData/' . $bk->id_brgKeluar) ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Hapus data"></i></a>
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
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>

    <!--modal tambah-->
    <div class="container">


        <!-- Modal -->
        <div id="myModal" class="modal fade " role="dialog">
            <div class="modal-dialog">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">

                        <h4 class="modal-title">Form Tambah transaksi penjualan</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <form method="post" action="<?= base_url('admin/transaksibarangkeluar/tambahDataAksi') ?>">
                            <div class="mb-3">
                                <label>Nama barang</label>
                                <select class="form-control " name="id_barang">
                                    <option>--Pilih barang--</option>
                                    <?php
                                    foreach ($masterbarang as $br) : ?>

                                        <option value="<?= $br->id_barang ?>"><?= $br->nama_brg ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_barang', '<div class="text-small text-danger"></div>') ?>
                            </div>
                            <div class="mb-3">
                                <label>Sekber</label>
                                <select class="form-control " name="cabang">
                                    <option>--Pilih barang--</option>
                                    <option value="Karawang">Karawang</option>
                                    <option value="Cikarang">Cikarang</option>
                                    <option value="Pondok gede">Pondok Gede</option>
                                    <option value="Rawamangun">Rawamangun</option>
                                    <option value="Koja">Koja</option>
                                    <option value="Cililitan">Cililitan</option>
                                    <option value="Bandung">Bandung</option>
                                    <option value="Depok">Depok</option>


                                </select>
                                <?= form_error('cabang', '<div class="text-small text-danger"></div>') ?>
                            </div>
                            <div class=" mb-3">
                                <label for="kodeBarang" class="form-label">Tanggal keluar</label>
                                <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" placeholder="Input tanggak keluar">

                            </div>
                            <div class="mb-3">
                                <label>Unit</label>
                                <select class="form-control " name="unit">
                                    <option>--Pilih barang--</option>
                                    <option value="Stie pertiwi">Stie Pertiwi</option>
                                    <option value="Stba pertiwi">Stba Pertiwi</option>
                                    <option value="Akpar pertiwi">Akpar Pertiwi</option>
                                    <option value="BBC">BBC</option>



                                </select>
                                <?= form_error('cabang', '<div class="text-small text-danger"></div>') ?>
                            </div>
                            <div class="mb-3">
                                <label for="kodeBarang" class="form-label">Qty</label>
                                <input type="text" class="form-control" id="stok_keluar" name="stok_keluar" placeholder="Input quantity barang">

                            </div>
                            <div class="mb-3">
                                <label for="kodeBarang" class="form-label">Harga </label>
                                <input type="text" class="form-control" id="harga_brg" name="harga_brg" placeholder="Input harga barang">

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

</div>
<!-- End of Main Content -->