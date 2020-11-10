<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>View</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Id</th>
                                <th>Jenis Kue</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $jenis['id_jenis_kue']; ?></td>
                                    <td><?= $jenis['jenis_kue']; ?></td>
                                    <td><?= $jenis['detail']; ?></td>
                                    <td>
                                        <a href="/JenisKue/edit/<?= $jenis['id_jenis_kue']; ?>" class="btn btn-secondary">Edit</a>

                                        <form action="/JenisKue/delete/<?= $jenis['id_jenis_kue']; ?>" method="POST" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus data <?= $jenis['jenis_kue']; ?>?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="/JenisKue" class="btn btn-light">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>