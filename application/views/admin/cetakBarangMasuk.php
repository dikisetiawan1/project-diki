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
                    <h1>PT PERTIWI GLOBAL</h1>
                    <h2>Transaksi Barang Masuk</h2>
                </center>

                <table class="table table-bordered table-striped mt-5">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Tanggal Masuk</th>
                        <th class="text-center">qty</th>
                        <th class="text-center">Supplier</th>
                        <th class="text-center">Harga Barang</th>

                    </tr>

                    <?php $no = 1;
                    foreach ($barangmasuk as $bm) : ?>


                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $bm->nama_brg ?></td>
                            <td><?= $bm->tgl_masuk ?></td>
                            <td class="text-center"><?= $bm->stok_masuk ?></td>
                            <td><?= $bm->nama_supplier ?></td>
                            <td> Rp.<?= number_format($bm->hrg_brg, 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="5" class="text-center bold">Total</td>
                    </tr>

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