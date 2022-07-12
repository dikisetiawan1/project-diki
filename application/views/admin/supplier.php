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
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <!-- Content Row -->
    <div class="row">
        <div class="col-8">
            <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">Tambah data</a>

            <a href="<?= base_url('admin/supplier/cetakData') ?>" class="btn btn-warning mb-2 ml-1 pt-2 pb-3"><i class="fas fa-print"></i></a>
            <a href="#" class="btn btn-success mb-2 ml-1 pt-2 pb-3 "><i class="fas fa-file-excel"></i></a>
        </div>
        <div class="col-4">
            <form class="d-flex" action="<?= base_url('admin/supplier'); ?>" method="post">
                <input class="form-control me-2" type="text" placeholder="Search keyword.." aria-label="Search" name="keyword" autofocus>
                <input class="btn btn-outline-success ml-2" type="submit" name="submit"></input>
            </form>
        </div>
    </div>
    <?= $this->session->flashdata('pesan') ?>

    <div class="card shadow">
        <table class="table table-hover card-shadow">
            <tr class="bg-secondary text-white rounded">
                <td>No</td>
                <td>Nama</td>
                <td>No.Tlp</td>
                <td>Alamat</td>
                <td>Aksi</td>
            </tr>
            <?php
            foreach ($supplier as $su) : ?>
                <tr>
                    <td><?= ++$start; ?></td>
                    <td><?= $su['nama_supplier']; ?></td>
                    <td><?= $su['no_tlp']; ?></td>
                    <td><?= $su['alamat']; ?></td>
                    <td>
                        <a href="<?= base_url('admin/supplier/updateData/' . $su['id_supplier'])  ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit data"><i class="fas fa-fw fa-edit"></i></a>
                        <a onclick=" return confirm('yakin di hapus?')" href="<?= base_url('admin/supplier/deleteData/' . $su['id_supplier']) ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Hapus data"></i></a>
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

                        <h4 class="modal-title">Form Tambah Suppier</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <form method="post" action="<?= base_url('admin/supplier/tambahDataAksi') ?>">
                            <div class="mb-3">
                                <label for="kodeBarang" class="form-label">Nama supplier</label>
                                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Input nama supplier">
                                <?= form_error('nama_supplier', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>

                            <div class="mb-3">
                                <label for="jenisBarang" class="form-label">No.Tlp</label>
                                <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="Input No handphone">
                                <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="jenisBarang" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Input alamat">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
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
</div>
<!-- End of Main Content -->