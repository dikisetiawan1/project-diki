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
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Tanggal Keluar</th>
                        <th class="text-center">Sekber</th>
                        <th class="text-center">Unit</th>
                        <th class="text-center">qty</th>
                        <th class="text-center">Harga Barang</th>


                    </tr>




                    <?php $no = 1;
                    foreach ($barangkeluar as $bk) : ?>


                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $bk->nama_brg ?></td>
                            <td><?= $bk->tanggal_keluar ?></td>
                            <td><?= $bk->cabang ?></td>
                            <td><?= $bk->unit ?></td>
                            <td class="text-center"><?= $bk->stok_keluar ?></td>
                            <td> Rp.<?= number_format($bk->harga_brg, 0, ',', '.') ?></td>
                        </tr>

                    <?php endforeach; ?>
                    <?php
                    foreach ($stoksum as $total) : ?>
                        <tr>
                            <td colspan="5" class="text-center bold">Total</td>
                            <td><?= $total->total_stok ?></td>
                            <td> Rp.<?= number_format($total->total_harga, 0, ',', '.') ?></td>
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