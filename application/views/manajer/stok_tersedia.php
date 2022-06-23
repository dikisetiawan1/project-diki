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

            <a href="<?= base_url('manajer/stokBarang/cetakData2') ?>" class="btn btn-warning mb-2 p-3"><i class="fas fa-print"></i></a>
        </div>

        <div class="col-4">
            <form class="d-flex" action="<?= base_url('manajer/stokbarang/tersedia'); ?>" method="post">
                <input class="form-control me-2" type="text" placeholder="Search keyword.." aria-label="Search" name="keyword" autofocus>
                <input class="btn btn-outline-success ml-2" type="submit" name="submit"></input>
            </form>
        </div>
    </div>


    <div class="card shadow">
        <table class="table table-hover card-shadow">
            <tr class="bg-secondary text-white rounded">
                <td>#</td>
                <td>Nama barang</td>
                <td>Kategori</td>
                <td>Stok</td>
                <td>Aksi</td>
            </tr>
            <?php
            foreach ($stok_ready as $s) : ?>
                <tr>
                    <td><?= ++$start; ?></td>
                    <td><?= $s['nama_brg'] ?></td>
                    <td><?= $s['nama_kategori'] ?></td>
                    <td><?= $s['stok_brg'] ?></td>

                    <td>

                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-placement="top" title="Detail data"><i class="fa fa-fw fa-info-circle"></i></i>
                    </td>

                </tr>
            <?php endforeach; ?>

        </table>


    </div>
    <div class="container-fluid mt-3">

        <?= $this->pagination->create_links(); ?>
    </div>



</div>
<!-- End of Main Content -->
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