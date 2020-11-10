<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card" style="width: 60rem;">
                    <img src="/uploads/<?= $blog['gambar']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $blog['judul']; ?></h5>
                        <p class="card-text"><?= $blog['isi']; ?></p>
                        <div class="d-inline">
                            <div class="text-right">
                                <a href="/blog" class="btn btn-light">Kembali</a>
                                <a href="/blog/edit/<?= $blog['id']; ?>" class="btn btn-warning">Edit</a>

                                <form action="/blog/delete/<?= $blog['id']; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin mengahpus data <?= $blog['judul']; ?>?');">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>