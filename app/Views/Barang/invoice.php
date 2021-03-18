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
        088218908343
    </p>
    <hr>
    <p>
        Pembeli : <?= $pembeli['username']; ?><br>
        Alamat : <?= $transaksi['alamat']; ?> <br>
        Transaksi No.: <?= $transaksi['id']; ?><br>
        Tanggal : <?= date("Y-m-d", strtotime($transaksi['created_date'])); ?>
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>Barang</strong></th>
            <th><strong>Harga Satuan</strong></th>
            <th><strong>Jumlah</strong></th>
            <th><strong>Ongkir</strong></th>
            <th><strong>Total harga</strong></th>
        </tr>
        <?php foreach ($barang as  $b) : ?>
            <?php
            $bahan = new \App\Models\BahanModel();
            // $detail = new \App\Models\DetailTransaksiModel();
            // $jumlah = $detail->find($b['Id_transaksi'])['jumlah'];
            $nama_barang = $bahan->find($b['Id_barang'])['nama_barang'];
            $harga_satuan = $bahan->find($b['Id_barang'])['harga'];
            ?>
            <tr>
                <td><?= $nama_barang; ?></td>
                <td><?= "Rp. " . number_format($harga_satuan, 2, ',', '.'); ?></td>
                <td><?= $b['jumlah']; ?></td>
                <td><?= "Rp. " . number_format($transaksi['ongkir'], 2, ',', '.'); ?></td>
                <td><?= "Rp. " . number_format($transaksi['total_harga'], 2, ',', '.'); ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>