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


    <div class="card shadow " style="height: 60%;">
        <form action="index.php " method="get">
            <div class="row g-3 align-items-center mt-5 mb-2 justify-content-center">
                <div class="col-auto">
                    <label class="col-form-label">Periode</label>
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control" name="dari" required>
                </div>
                <div class="col-auto">
                    -
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control" name="ke" required>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
            <div class="row  g-3 align-items-center  mb-2 justify-content-center mt-5">

                <div class="col-auto" style="width: 38%;">
                    <div class="form-group ">

                        <select class="form-control ml-2" name="#">
                            <option>--Pilih laporan barang--</option>
                            <option>Barang masuk</option>
                            <option>Barang keluar</option>
                            <option>Pemesanan barang</option>
                        </select>

                    </div>
                </div>

            </div>
            <div class="row justify-content-center mt-5">
                <button class="btn btn-primary" style="width: 38%;">Cetak</button>
            </div>

        </form>



    </div>




</div>
<!-- End of Main Content -->