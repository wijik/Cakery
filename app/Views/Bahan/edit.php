<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Data</strong>
                        <small>Bahan Kue</small>
                    </div>
                    <div class="card-body card-block">
                        <form action="/bahan/update/<?= $bahan['id']; ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $bahan['id']; ?>">
                            <input type="hidden" name="gambarLama" value="<?= $bahan['gambar']; ?>">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="nama_barang" class=" form-control-label">Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" placeholder="Nama Barang" class="form-control <?= ($validation->hasError('nama_barang')) ? 'is-invalid' : ''; ?>" value="<?= (old('nama_barang')) ? old('nama_barang') : $bahan['nama_barang'] ?>">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('nama_barang'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gambar" class="form-control-label">Gambar</label>
                                <div class="col-lg-6">
                                    <img src="/uploads/<?= $bahan['gambar']; ?>" alt="" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-lg-6">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" id="gambar" name="gambar" onchange="previewImg()" value="<?= (old('gambar')) ? old('gambar') : $bahan['gambar'] ?>">
                                        <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                        <div class=" invalid-feedback">
                                            <?= $validation->getError('gambar'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class=" form-control-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10"><?= $bahan['deskripsi']; ?></textarea>
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('deskripsi'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga" class="form-control-label">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" min="0" value="<?= (old('harga')) ? old('harga') : $bahan['harga'] ?>">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('harga'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stok" class="form-control-label">Stok</label>
                                <input type="number" name="stok" id="stok" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" min="0" value="<?= (old('stok')) ? old('stok') : $bahan['stok'] ?>">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('stok'); ?>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="/bahan" class="btn btn-light">Kembali</a>
                                <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script src="<?= base_url('ckeditor5-build-classic/ckeditor.js'); ?>" type="text/javascript"></script>
<style>
    .ck-editor__editable_inline {
        min-height: 200px;

    }
</style>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script> -->
<?= $this->endSection(); ?>