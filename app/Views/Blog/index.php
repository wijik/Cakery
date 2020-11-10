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
                    <h1 style="margin-bottom:-30px;">Blog</h1>
                    <a href="<?= site_url('/blog/create'); ?>" class="btn btn-success" style="margin-bottom: 30px; float:right;"><i class="fas fa-plus"></i>Tambah Data</a><br>
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
                                <th>Judul</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                            <?php foreach ($blog as  $b) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $b['id']; ?></td>
                                    <td><?= $b['judul']; ?></td>
                                    <td>
                                        <a href="/blog/view/<?= $b['id']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?= $pager->links('blog', 'blog_paginasi'); ?>
                </div>
                <!-- END DATA TABLE-->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>