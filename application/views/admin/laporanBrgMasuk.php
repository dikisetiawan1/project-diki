<!DOCTYPE html>
<html lang="en">





<!-- Begin Page Content -->
<div class="container-fluid justify-content-center ">
    <div class="row ">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item  active" aria-current="page">Laporan</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <!-- Content Row -->


    <div class="card mx-auto  shadow d-flex align-items-center  " style="height: 60%; width:50%; ">
        <h5 class="text-center mt-4">Laporan barang masuk per periode</h5>
        <form action="<?= base_url('admin/laporan/filter') ?>" method="POST" target="_blank">
            <div class="row g-3 align-items-center mt-5 justify-content-center">
                <div class="col-auto">
                    <label class="col-form-label">Periode</label>
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control" name="tanggalawal" required>
                </div>
                <div class="col-auto">
                    -
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control" name="tanggalakhir" required>
                </div>

            </div>



            <div class=" row justify-content-center mt-5">
                <button class="btn btn-primary" style="width: 38%;" value="print">Cetak</button>
            </div>
    </div>
</div>


</form>

</div>
<!-- 
            

</div>