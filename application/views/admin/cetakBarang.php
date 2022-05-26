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
                    <h2>Data Barang</h2>
                </center>

                <table class="table table-bordered table-striped mt-5">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Stok</th>
                        <th class="text-center">Harga Barang</th>

                    </tr>

                    <?php $no = 1;
                    foreach ($cetakbarang as $cb) : ?>


                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $cb->nama_brg ?></td>
                            <td><?= $cb->nama_kategori ?></td>
                            <td class="text-center"><?= $cb->stok_brg ?></td>
                            <td> Rp.<?= number_format($cb->hrg_brg, 0, ',', '.') ?></td>
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