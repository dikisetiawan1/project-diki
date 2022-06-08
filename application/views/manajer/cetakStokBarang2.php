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
                    <h2>Stok Barang Kosong</h2>
                </center>

                <table class="table table-bordered table-striped mt-5">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Stok</th>

                    </tr>

                    <?php $no = 1;
                    foreach ($cetakstok as $cs) : ?>


                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $cs->nama_brg ?></td>
                            <td><?= $cs->nama_kategori ?></td>
                            <td class="text-center"><?= $cs->stok_brg ?></td>
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