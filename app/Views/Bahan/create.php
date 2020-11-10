<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Tambah Data</strong>
                        <small>Bahan</small>
                    </div>
                    <div class="card-body card-block">
                        <form action="/bahan/save" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="nama_barang" class=" form-control-label">Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" placeholder="Nama Bahan" class="form-control <?= ($validation->hasError('nama_barang')) ? 'is-invalid' : ''; ?>">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('nama_barang'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gambar" class="form-control-label">Gambar</label>
                                <div class="col-sm-4">
                                    <img src="/uploads/default.png" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-8">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" id="gambar" name="gambar" onchange="previewImg()">
                                        <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                        <div class=" invalid-feedback">
                                            <?= $validation->getError('gambar'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class=" form-control-label">Deskripsi</label>
                                <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('deskripsi'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga" class="form-control-label">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" min="0">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('harga'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stok" class="form-control-label">Stok</label>
                                <input type="number" name="stok" id="stok" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" min="0">
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
<?= $this->endSection(); ?>