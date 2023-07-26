<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mb-2 text-center">Detail Calon Siswa</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/assets/img-siswa/<?= $siswa['foto'] ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">

                        <div class="card-body">
                            <h5 class="card-title"><b>Nama:</b> <?= $siswa['nama_siswa'] ?></h5>
                            <p class="card-text"><b>Jenis Kelamin:</b> <?= $siswa['jenis_kelamin'] ?></p>
                            <p class="card-text"><b>Nama Orangtua:</b> <?= $siswa['nama_ortu'] ?></p>
                            <p class="card-text"><b>Alamat:</b> <?= $siswa['alamat'] ?></p>
                            <p class="card-text"><b>Akta Kelahiran:</b> <img src="/assets/img-siswa/akta/<?= $siswa['akta_kelahiran'] ?>" class="img-fluid rounded-start" style="width: 20%;"></p>
                            <p class=" card-text"><b>Kartu Keluarga:</b><img src="/assets/img-siswa/kk/<?= $siswa['kk'] ?>" class="img-fluid rounded-start" style="width: 20%;"></p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>

                            <a href="/siswa/edit/<?= $siswa['no_regis'] ?>" class="btn btn-warning">Edit</a>
                            <form action="/siswa/<?= $siswa['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</button>
                            </form>
                            <p class="mt-2">
                                <a href="<?= base_url('/siswa/siswa') ?>" class="btn btn-primary">Kembali</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>