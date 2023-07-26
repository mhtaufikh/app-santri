<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container">

    <div class="row">
        <div class="col-8">
            <h2 class="text-center my-3">Menambahkan data siswa</h2>
            <form action="/siswa/saveinfo" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3 form-group">
                    <label for="nama" class="form-label">Nama pengumuman</label>
                    <input type="text" class="form-control <?= (validation_show_error('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="Masukan Nama Siswa" value="<?= old('nama') ?>">
                </div>
                <div class="invalid-feedback">
                    <?= validation_show_error('nama'); ?>
                </div>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="masukan jenis kelamin" value="<?= old('keterangan') ?>">
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Foto</label>
            <label for="gambar" class="form-label form-label1"></label>
            <div class="col-2sm-2 ">
                <img src="/img/default.png" class="img-thumbnail img-preview" width="10%">
            </div>
            <input type="file" class="form-control <?= (validation_show_error('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewFoto()">
            <div class="invalid-feedback">
                <?= validation_show_error('gambar'); ?>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
</div>
</form>
</div>
</div>
</div>
<?= $this->endSection() ?>