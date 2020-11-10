<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Tambah Data</strong>
                        <small>Jenis Snack</small>
                    </div>
                    <div class="card-body card-block">
                        <form action="/JenisKue/save" method="POST">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="Id" class=" form-control-label">Id</label>
                                <input type="text" name="id_jenis_kue" id="id_jenis_kue" placeholder="id" class="form-control <?= ($validation->hasError('id_jenis_kue')) ? 'is-invalid' : ''; ?>">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('id_jenis_kue'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_kue" class=" form-control-label">Jenis Kue</label>
                                <input type="text" name="jenis_kue" id="jenis_kue" placeholder="nama kue" class="form-control <?= ($validation->hasError('jenis_kue')) ? 'is-invalid' : ''; ?>">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('jenis_kue'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class=" form-control-label">Detail</label>
                                <input type="text" name="detail" id="detail" placeholder="Masukan Deetail" class="form-control <?= ($validation->hasError('detail')) ? 'is-invalid' : ''; ?>">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('detail'); ?>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>