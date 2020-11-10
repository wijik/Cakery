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
                    <h1 style="margin-bottom:-30px;">Dompet</h1>
                    <a href="<?= site_url('dompet/create'); ?>" class="btn btn-success" style="margin-bottom: 30px; float:right;"><i class="fas fa-plus"></i>Tambah</a><br>
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
                                <th>Nama User</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                            <?php foreach ($dompet as  $d) : ?>
                                <?php
                                $modelUser = new \App\Models\UserModel();
                                $nama_user =  $modelUser->find($d['id_user'])['username'];
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $d['id']; ?></td>
                                    <td><?= $nama_user; ?></td>
                                    <td><?= "Rp." . number_format($d['jumlah'], 0, 0, '.'); ?></td>
                                    <td>
                                        <a href="/dompet/edit/<?= $d['id']; ?>" class="btn btn-warning">Edit</a>
                                        <form action="/dompet/delete/<?= $d['id']; ?>" method="POST" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin mengahpus data <?= $nama_user; ?>?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?= $pager->links('dompet', 'dompet_paginasi'); ?>
                </div>
                <!-- END DATA TABLE-->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>