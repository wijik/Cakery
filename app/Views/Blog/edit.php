<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Data</strong>
                        <small> Blog</small>
                    </div>
                    <div class="card-body card-block">
                        <form action="/blog/update/<?= $blog['id']; ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $blog['id']; ?>">
                            <input type="hidden" name="gambarLama" value="<?= $blog['gambar']; ?>">
                            <input type="hidden" name="slug" value="<?= $blog['slug']; ?>">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="judul" class=" form-control-label">Judul</label>
                                <input type="text" name="judul" id="judul" placeholder="Judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" value="<?= $blog['judul']; ?>">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('judul'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gambar" class="form-control-label">Gambar</label>
                                <div class="col-sm-4">
                                    <img src="/uploads/<?= $blog['gambar']; ?>" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-8">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" id="gambar" name="gambar" onchange="previewImg()" value="<?= (old('gambar')) ? old('gambar') : $blog['gambar'] ?>">
                                        <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                        <div class=" invalid-feedback">
                                            <?= $validation->getError('gambar'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="isi" class=" form-control-label">Isi Blog</label>
                                <textarea placeholder="Tulis Isi dari Blog" id="isi" name="isi"><?= $blog['isi']; ?></textarea>
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('isi'); ?>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="/blog" class="btn btn-light">Kembali</a>
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
<?= $this->section('script'); ?>
<script src="<?= base_url('ckeditor5-build-classic/ckeditor.js'); ?>" type="text/javascript"></script>
<style>
    .ck-editor__editable_inline {
        min-height: 200px;

    }
</style>
<script>
    ClassicEditor
        .create(document.querySelector('#isi'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
<?= $this->endSection(); ?>