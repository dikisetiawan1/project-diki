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

    <!-- Modal -->


    <!-- body modal -->
    <div class="row">
        <div class="col-6">


            <div class="card shadow p-3">

                <?php foreach ($barang as $b) : ?>
                    <form method="post" action="<?= base_url('admin/databarang/updateDataAksi') ?>">

                        <div class="mb-3">
                            <label for="jenisBarang" class="form-label">Nama Barang</label>

                            <input type="hidden" name="id_barang" class="form-control" value="<?= $b->id_barang ?>">

                            <input type="text" class="form-control" id="nama_brg" name="nama_brg" placeholder="Input nama barang" value="<?= $b->nama_brg ?>">

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
                            <?= form_error('id_kategori', '<div class="text-small text-danger"></div>') ?>
                        </div>
                        <div class="mb-3">
                            <label for="kodeBarang" class="form-label">Harga barang</label>
                            <input type="text" class="form-control" id="hrg_brg" name="hrg_brg" placeholder="Input harga barang" value="<?= $b->hrg_brg ?>">

                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('admin/databarang') ?>" class="btn btn-danger"> Cancel</a>
                        </div>

                    </form>
                <?php endforeach; ?>


            </div>
        </div>
    </div>