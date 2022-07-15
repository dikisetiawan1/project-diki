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

                <?php foreach ($supplier as $su) : ?>
                    <form method="post" action="<?= base_url('admin/supplier/updateDataAksi') ?>">

                        <div class="mb-3">
                            <label for="jenisBarang" class="form-label">Nama Barang</label>

                            <input type="hidden" name="id_supplier" class="form-control" value="<?= $su->id_supplier ?>">

                            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Input nama barang" value="<?= $su->nama_supplier ?>">
                            <?= form_error('nama_supplier', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class="mb-3">
                            <label for="notel" class="form-label">No. Tlp</label>
                            <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="Input harga barang" value="<?= $su->no_tlp ?>">
                            <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>

                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Input harga barang" value="<?= $su->alamat ?>">
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>

                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Nama perusahaan</label>
                            <input type="text" class="form-control" id="perusahaan" name="perusahaan" placeholder="Input harga barang" value="<?= $su->perusahaan ?>">
                            <?= form_error('perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('admin/supplier') ?>" class="btn btn-danger"> Cancel</a>
                        </div>

                    </form>
                <?php endforeach; ?>


            </div>
        </div>
    </div>