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
                    <td>#</td>
                    <td>Nama barang</td>
                    <td>Tanggal keluar</td>
                    <td>Sekber</td>
                    <td>Unit</td>
                    <td>Qty</td>

                    </tr>
                    <?php $no = 1;
                    foreach ($datafilter as $d) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $d->nama_brg ?></td>
                            <td><?= $d->tanggal_keluar ?></td>
                            <td><?= $d->cabang ?></td>
                            <td><?= $d->unit ?></td>
                            <td><?= $d->stok_keluar ?></td>

                        </tr>


                    <?php endforeach; ?>


                    <tr>
                        <th colspan="5" class="text-center bold text-middle">Total Barang</th>
                        <th class="text-center"><?= $stok_sum; ?></th>
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