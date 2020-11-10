<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <h2 class="mt-2">View</h2>
                <div class="card mb-3" style="max-width: 940px; max-height:500px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="/uploads/<?= $bahan['gambar']; ?>" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $bahan['nama_barang']; ?></h5>
                                <hr>
                                <p class="card-text">Id : <?= $bahan['id']; ?></p>
                                <p class="card-text">Stok : <?= $bahan['stok']; ?></p>
                                <p class="card-text">Desc : <?= $bahan['deskripsi']; ?></p>
                                <hr>
                                <div class="text-right">
                                    <a href="/bahan/edit/<?= $bahan['id']; ?>" class="btn btn-warning">Edit</a>

                                    <form action="/bahan/delete/<?= $bahan['id']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin mengahpus data <?= $bahan['nama_barang']; ?>?');">Delete</button>
                                    </form>
                                </div>
                                <a href="/bahan" class="btn btn-light" style="margin-top: -70px;">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>