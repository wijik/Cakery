<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
<?php
$userModel = new \App\Models\UserModel();
$bahan = new \App\Models\BahanModel();
$pembeli = $userModel->find($transaksi['id_pembeli'])['username'];

?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="table-responsive m-b-40">
                    <h2>Detail Transaksi</h2>
                    <table class="table table-borderless table-data3">
                        <thead>
                            <th>Id</th>
                            <th>Pembeli</th>
                            <th>Created Date</th>
                            <th>Created by</th>
                            <th>Updated Date</th>
                            <th>Updated By</th>
                            <th>Total Harga</th>
                            <th>Alamat</th>
                            <th>Ongkir</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $transaksi['id']; ?></td>
                                <td><?= $pembeli; ?></td>
                                <td><?= $transaksi['created_date']; ?></td>
                                <td><?= $transaksi['created_by']; ?></td>
                                <td><?= $transaksi['updated_date']; ?></td>
                                <td><?= $transaksi['updated_by']; ?></td>
                                <td><?= $transaksi['total_harga']; ?></td>
                                <td><?= $transaksi['alamat']; ?></td>
                                <td><?= $transaksi['ongkir']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h4>Barang-barang yang ada di transaksi ini :</h4><br>
                <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                        <thead>
                            <th>Gambar</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                        </thead>
                        <tbody>
                            <?php foreach ($detail as  $d) : ?>
                                <?php
                                $bahan = new \App\Models\BahanModel();
                                $nama_barang = $bahan->find($d['Id_barang'])['nama_barang'];
                                $gambar = $bahan->find($d['Id_barang'])['gambar'];
                                ?>
                                <tr>
                                    <td>
                                        <img src="/uploads/<?= $gambar; ?>" class="img-view" style="height: 100px; height:100px;">
                                    </td>
                                    <td><?= $nama_barang; ?></td>
                                    <td><?= $d['jumlah']; ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <a href="/transaksi" class="btn btn-light" style="margin-top:5px">Kembali</a>
                <a href="/transaksi/invoice/<?= $transaksi['id']; ?>" class="btn btn-light" style="margin-top: 5px;">Invoice</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>