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

                <?php foreach ($kategori as $k) : ?>
                    <form method="post" action="<?= base_url('admin/kategoriBarang/updateDataAksi') ?>">

                        <div class="mb-3">
                            <label for="jenisBarang" class="form-label">Kategori</label>

                            <input type="hidden" name="id_kategori" class="form-control" value="<?= $k->id_kategori ?>">

                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Input nama kategori" value="<?= $k->nama_kategori ?>">

                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                            <a href="<?= base_url('admin/kategoribarang') ?>" class="btn btn-danger"> Cancel</a>
                        </div>

                    </form>
                <?php endforeach; ?>


            </div>
        </div>
    </div>