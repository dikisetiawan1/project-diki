<!DOCTYPE html>
<html>

<head>
    <title><?= $title; ?></title>
    <style type="text/css">
        body {
            font-family: arial;
            color: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">

                <center class="mt-5">
                    <h1>PT PERTIWI RESOURCES</h1>
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                </center>

                <table class="table table-bordered table-striped mt-5">

                    <?php foreach ($detail as $d) : ?>

                        <table class="table">


                            <tr>
                                <td>
                                    <b>Kode Barang</b>
                                </td>
                                <td>:</td>
                                <td>
                                    <?= $d->id_barang ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Nama Barang</b>
                                </td>
                                <td>:</td>
                                <td>
                                    <?= $d->nama_brg ?>
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td>
                                    <b> Tanggal keluar</b>
                                </td>
                                <td>:</td>
                                <td>
                                    <?= $d->tanggal_keluar ?>
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td>
                                    <b> Harga barang</b>
                                </td>
                                <td>:</td>
                                <td>
                                    <?= $d->harga_brg ?>
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td>
                                    <b> Qty</b>
                                </td>
                                <td>:</td>
                                <td>
                                    <?= $d->stok_keluar ?>
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td>
                                    <b> Cabang</b>
                                </td>
                                <td>:</td>
                                <td>
                                    <?= $d->cabang ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b> Unit</b>
                                </td>
                                <td>:</td>
                                <td>
                                    <?= $d->unit ?>
                                </td>
                            </tr>
                        </table>

                    <?php endforeach; ?>

                </table>

                <div class="row mt-5">
                    <div class="col-6">
                        <tr>
                            <th></th>
                            <th width="200px">
                                <p>Jakarta, <?= date("d M Y") ?><br>Pemohon</p>

                                <br>
                                <br>
                                <br>
                                <p>___________________________________</p>
                            </th>
                        </tr>
                    </div>
                    <div class="col-6 text-right">
                        <tr>
                            <th></th>
                            <th width="200px">
                                <p>Jakarta, <?= date("d M Y") ?><br>Logistik</p>

                                <br>
                                <br>
                                <br>
                                <p>___________________________________</p>
                            </th>
                        </tr>
                    </div>
                </div>




</body>

</html>

<script type="text/javascript">
    window.print();
</script>
</div>
</div>
</div>