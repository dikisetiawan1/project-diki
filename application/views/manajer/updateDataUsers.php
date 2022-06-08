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

                <?php foreach ($users as $us) : ?>
                    <form method="post" action="<?= base_url('manajer/users/updateDataAksi') ?>">

                        <div class="mb-3">
                            <label for="jenisBarang" class="form-label">Nama </label>

                            <input type="hidden" name="id" class="form-control" value="<?= $us->id ?>">

                            <input type="text" class="form-control" id="name" name="name" placeholder="Input nama user" value="<?= $us->name ?>">

                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $us->username ?>">

                        </div>
                        <div class="mb-3">
                            <label for="jenis kelamin" class="form-label">Jenis kelamin</label>
                            <select type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option value=" #">Pilih jenis kelamin</option>
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
                            <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" placeholder="Input tanggal masuk" value="<?= $us->tgl_masuk ?>">

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
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('manajer/users') ?>" class="btn btn-danger"> Cancel</a>
                        </div>

                    </form>
                <?php endforeach; ?>


            </div>
        </div>
    </div>