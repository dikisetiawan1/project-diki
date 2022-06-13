<!DOCTYPE html>
<html lang="en">





<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
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
            <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">Tambah data</a>

            <a href="<?= base_url('admin/supplier/cetakData') ?>" class="btn btn-warning mb-2 ml-1 pt-2 pb-3"><i class="fas fa-print"></i></a>
            <a href="#" class="btn btn-success mb-2 ml-1 pt-2 pb-3 "><i class="fas fa-file-excel"></i></a>
        </div>

    </div>
    <?= $this->session->flashdata('pesan') ?>

    <div class="card shadow">
        <table class="table table-hover card-shadow">
            <tr class="bg-secondary text-white rounded">
                <td>No</td>
                <td>Nama</td>
                <td>Username</td>
                <td>Jenis Kelamin</td>
                <td>Tgl Masuk</td>
                <td>Poto</td>
                <td>Akses</td>
                <td>Aksi</td>
            </tr>
            <?php $no = 1;
            foreach ($query as $us) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $us->name ?></td>
                    <td><?= $us->username ?></td>
                    <td><?= $us->jenis_kelamin ?></td>
                    <td><?= $us->tgl_masuk ?></td>
                    <td><img style="width: 75px; " src="<?= base_url() . 'assets/photo/' . $us->image ?>"></td>
                    <?php
                    $admin = 'Admin Logistik';
                    $pegawai = 'Manajer';
                    ?>

                    <td>

                        <?php if ($us->hak_akses == '1') {


                            echo "$admin";
                        } else {

                            echo "$pegawai";
                        }


                        ?>
                    </td>
                    <td>
                        <a href="<?= base_url('manajer/users/updateData/' . $us->id)  ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit data"><i class="fas fa-fw fa-edit"></i></a>
                        <a onclick=" return confirm('yakin di hapus?')" href="<?= base_url('manajer/users/deleteData/' . $us->id) ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Hapus data"></i></a>
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


    <div class="container">


        <!-- Modal -->
        <div id="myModal" class="modal fade " role="dialog">
            <div class="modal-dialog">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">

                        <h4 class="modal-title">Form Tambah Users</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <form method="post" action="<?= base_url('manajer/users/tambahDataAksi') ?>">
                            <div class="mb-3">
                                <label for="users" class="form-label">Nama user</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Input nama users">

                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Input Username">

                            </div>
                            <div class="mb-3">
                                <label for="jenis kelamin" class="form-label">Jenis kelamin</label>
                                <select type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="#">Pilih jenis kelamin</option>
                                    <option value="Laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Input password">

                            </div>
                            <div class="mb-3">
                                <label for="tgl masuk" class="form-label">Tanggal masuk</label>
                                <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" placeholder="Input tanggal masuk">

                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Photo</label>

                                <input type="file" name="image" class="form-control">




                            </div>
                            <div class="mb-3">
                                <label for="akses" class="form-label">Akses</label>
                                <select type="text" class="form-control" id="hak_akses" name="hak_akses">
                                    <option value="#">Pilih Hak akses</option>
                                    <?php foreach ($hak_akses as $akses) : ?>
                                        <option value="<?= $akses->akses ?>"><?= $akses->keterangan ?></option>
                                    <?php endforeach; ?>

                                </select>

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