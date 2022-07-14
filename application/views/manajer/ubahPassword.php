<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Data</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Modal -->
    <?= $this->session->flashdata('pesan') ?>


    <!-- body modal -->
    <div class="row">
        <div class="col-6">


            <div class="card shadow p-3">


                <form method="post" action="<?= base_url('manajer/ubahpassword/ubahpasswordAksi') ?>">

                    <div class="mb-3">
                        <label class="form-label">New password</label>
                        <input type="password" class="form-control" name="new_password1" placeholder="Input Password baru">
                        <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Repeat password</label>
                        <input type="password" class="form-control" name="new_password2" placeholder="Ulangi Password baru">



                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ubah password</button>

                    </div>

                </form>



            </div>
        </div>
    </div>