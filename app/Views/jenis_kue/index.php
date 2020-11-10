<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                    <h1 style="margin-bottom:-30px;">Jenis Snack</h1>
                    <a href="/JenisKue/create" class="btn btn-success" style="margin-bottom: 30px; float:right;"><i class="fas fa-plus"></i>Tambah Data</a>
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
                                <th>Jenis Kue</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                            <?php foreach ($jenis as $j) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $j['id_jenis_kue']; ?></td>
                                    <td><?= $j['jenis_kue']; ?></td>
                                    <td><?= $j['detail']; ?></td>
                                    <td>
                                        <a href="/JenisKue/edit/<?= $j['id_jenis_kue']; ?>" class="btn btn-secondary">Edit</a>
                                        <form action="/JenisKue/delete/<?= $j['id_jenis_kue']; ?>" method="POST" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin mengahpus data <?= $j['jenis_kue']; ?>?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?= $pager->links('jenis_kue', 'jenis_kue_paginasi'); ?>
                </div>
                <!-- END DATA TABLE-->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>