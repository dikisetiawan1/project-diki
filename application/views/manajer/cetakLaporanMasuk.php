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
                    <h1>PT. PERTIWI RESOURCES</h1>
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                </center>

                <table class="table table-bordered table-striped mt-5">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Tanggal Masuk</th>
                        <th class="text-center">Supplier</th>
                        <th class="text-center">qty</th>
                        <th class="text-center">Harga Barang</th>

                    </tr>

                    <?php $no = 1;
                    foreach ($datafilter as $bm) : ?>


                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $bm->nama_brg ?></td>
                            <td><?= $bm->tgl_masuk ?></td>
                            <td><?= $bm->nama_supplier ?></td>
                            <td class="text-center"><?= $bm->stok_masuk ?></td>
                            <td> Rp.<?= number_format($bm->hrg_barang, 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>

                    <tr>
                        <th rowspan="4" class="text-center bold text-middle">Total Barang</th>
                    </tr>


                    <?php


                    foreach ($disct as $d) : ?>

                        <tr>

                            <td colspan="2" class="text-center bold"><?= $d->nama_brg; ?></td>





                        </tr>


                    <?php endforeach; ?>

                </table>
                <table width="100%">
                    <tr>
                        <td></td>
                        <td width="200px">
                            <p>Jakarta, <?= date("d M Y") ?><br>Logistik</p>

                            <br>
                            <br>
                            <br>
                            <p>___________________________________</p>
                        </td>
                    </tr>
                </table>



</body>

</html>

<script type="text/javascript">
    window.print();
</script>
</div>
</div>
</div>