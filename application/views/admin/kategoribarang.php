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
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <!-- Content Row -->
    <div class="row">
        <div class="col-8">
            <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">Tambah data</a>

        </div>
        <div class="col-4">
            <form class="d-flex" action="<?= base_url('admin/kategoribarang'); ?>" method="post">
                <input class="form-control me-2" type="text" placeholder="Search keyword.." aria-label="Search" name="keyword" autofocus>
                <input class="btn btn-outline-success ml-2" type="submit" name="submit"></input>
            </form>
        </div>

    </div>
    <?= $this->session->flashdata('pesan') ?>




    <div class="card shadow">
        <table class="table table-hover card-shadow">
            <tr class="bg-secondary text-white rounded">
                <td>#</td>
                <td>Kategori barang</td>
                <td>Aksi</td>

            </tr>
            <?php $no = 1;
            foreach ($kategori as $kt) : ?>

                <tr>
                    <td><?= ++$start; ?></td>
                    <td><?= $kt['nama_kategori'] ?></td>

                    <td>
                        <a href="<?= base_url('admin/kategoriBarang/updateData/' . $kt['id_kategori']) ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit data"><i class="fas fa-fw fa-edit"></i></a>
                        <a onclick=" return confirm('yakin di hapus?')" href="<?= base_url('admin/kategoriBarang/deleteData/' . $kt['id_kategori']) ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Hapus data"></i></a>
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

                        <h4 class="modal-title">Form Tambah Kategori</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <form method="post" action="<?= base_url('admin/kategoribarang/tambahDataAksi') ?>">
                            <div class="mb-3">
                                <label for="kodeBarang" class="form-label">Nama kategori</label>
                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Input kategori barang">
                                <?= form_error('nama_kategori', '<small class="text-danger pl-3">', '</small>'); ?>

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