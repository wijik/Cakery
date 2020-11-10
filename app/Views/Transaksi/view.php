<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <h2 class="mb-2">View</h2>
                <table class="table table-borderless table-data3">
                    <thead>
                        <th>Id</th>
                        <th>Id Barang</th>
                        <th>Id Pembeli</th>
                        <th>Created Date</th>
                        <th>Created by</th>
                        <th>Updated Date</th>
                        <th>Updated By</th>
                        <th>Total Harga</th>
                        <th>Jumlah</th>
                        <th>Alamat</th>
                        <th>Ongkir</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $transaksi['id']; ?></td>
                            <td><?= $transaksi['id_barang']; ?></td>
                            <td><?= $transaksi['id_pembeli']; ?></td>
                            <td><?= $transaksi['created_date']; ?></td>
                            <td><?= $transaksi['created_by']; ?></td>
                            <td><?= $transaksi['updated_date']; ?></td>
                            <td><?= $transaksi['updated_by']; ?></td>
                            <td><?= $transaksi['total_harga']; ?></td>
                            <td><?= $transaksi['jumlah']; ?></td>
                            <td><?= $transaksi['alamat']; ?></td>
                            <td><?= $transaksi['ongkir']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <a href="/transaksi/invoice/<?= $transaksi['id']; ?>" class="btn btn-light" style="margin-top: 5px;">Invoice</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>