<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-center">Selamat Datang di Halaman Informasi</h1>
            <div class="container-fluid px-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Daftar Calon Peserta Didik
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <h1 class="">Daftar Informasi </h1>
                                <?php if (session()->getFlashdata('pesan')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('pesan'); ?>
                                    </div>
                                <?php endif; ?>
                                <tr>
                                    <th>Id</th>
                                    <th>nama</th>
                                    <th>keterangan</th>
                                    <th>gambar</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>nama</th>
                                    <th>keterangan</th>
                                    <th>gambar</th>
                                    <th>aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1;
                                ?>
                                <?php foreach ($informasi as $info) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $info['nama'] ?></td>
                                        <td><?= $info['keterangan'] ?></td>
                                        <td><img src="/assets/img-siswa/informasi/<?= $info['gambar']; ?>" class="sampul" alt=""></td>
                                        <td>
                                            <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">edit</a>
                                            <form action="/siswa/informasi/<?= $info['id']; ?>" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a href="/siswa/createinfo" class="btn btn-primary mb-3">Tambah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">

</button>

<!-- Modal -->
<?php if (isset($info)) { ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 form-group">
                        <label for="nama" class="form-label">Nama siswa</label>
                        <input type="text" class="form-control   " id="nama" name="nama" value="<?= $info['nama'] ?>">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control   " id="keterangan" name="keterangan" value="<?= $info['keterangan'] ?>">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>



<?= $this->endSection() ?>