<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
        }
    </style>
</head>

<body>
    <div style="font-size: 64px; color:darkgrey"><i>Invoice</i></div>
    <p>
        <i>Cakery</i><br>
        Jakarta, Indonesia <br>
        088802020831
    </p>
    <hr>
    <p>
        Pembeli : <?= $pembeli['username']; ?><br>
        Alamat : <?= $transaksi[0]['alamat']; ?> <br>
        Transaksi No.: <?= $transaksi[0]['id']; ?><br>
        Tanggal : <?= date("Y-m-d", strtotime($transaksi[0]['created_date'])); ?>
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>Barang</strong></th>
            <th><strong>Harga Satuan</strong></th>
            <th><strong>Jumlah</strong></th>
            <th><strong>Ongkir</strong></th>
            <th><strong>Total harga</strong></th>
        </tr>
        <tr>
            <td><?= $barang['nama_barang']; ?></td>
            <td><?= "Rp. " . number_format($barang['harga'], 2, ',', '.'); ?></td>
            <td><?= $transaksi[0]['jumlah']; ?></td>
            <td><?= "Rp. " . number_format($transaksi[0]['ongkir'], 2, ',', '.'); ?></td>
            <td><?= "Rp. " . number_format($transaksi[0]['total_harga'], 2, ',', '.'); ?></td>
        </tr>
    </table>
</body>

</html>