<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Jumlah</strong>
                        <small> Dompet</small>
                    </div>
                    <div class="card-body card-block">
                        <form action="/dompet/update/<?= $dompet['id']; ?>" method="POST">
                            <input type="hidden" name="id" id="id" value="<?= $dompet['id']; ?>">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="jumlah" class="form-control-label">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" min="0" value="<?= (old('jumlah')) ? old('jumlah') : $dompet['jumlah'] ?>">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('jumlah'); ?>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="/dompet" class="btn btn-light">Kembali</a>
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