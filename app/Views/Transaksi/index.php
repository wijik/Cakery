<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <!-- DATA TABLE-->
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success col-12" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="table-responsive m-b-40">
                    <h1 style="margin-bottom:-30px;">Transaksi</h1><br><br>
                    <form action="" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukan keyword pencarian..." name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Id</th>
                                <th>Barang</th>
                                <th>Pembeli</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                            <?php foreach ($transaksi as  $t) : ?>
                                <?php
                                $userModel = new \App\Models\UserModel();
                                $bahan = new \App\Models\BahanModel();
                                $pembeli = $userModel->find($t['id_pembeli'])['username'];
                                $barang = $bahan->find($t['id_barang'])['nama_barang'];
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $t['id']; ?></td>
                                    <td><?= $barang; ?></td>
                                    <td><?= $pembeli; ?></td>
                                    <td>
                                        <a href="/transaksi/view/<?= $t['id']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?= $pager->links('transaksi', 'transaksi_paginasi'); ?>
                </div>
                <!-- END DATA TABLE-->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>