<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Halaman Siswa </li>
        </ol>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Area Chart Example
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Bar Chart Example
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Daftar Calon Peserta Didik
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <h1 class="">Daftar calon siswa</h1>
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <tr>
                            <th>Id</th>
                            <th>NO registrasi</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>No registrasi</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        $r = 1; ?>
                        <?php foreach ($siswa as $s) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $s['no_regis'] ?></td>
                                <td><img src="/assets/img-siswa/<?= $s['foto']; ?>" class="sampul" alt=""></td>
                                <td><?= $s['nama_siswa']; ?></td>
                                <td><a href="/siswa/siswa/<?= $s['no_regis'] ?>" class="btn btn-success">Detail</a></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="/siswa/create" class="btn btn-primary mb-3">Tambah</a>
                <a href="/siswa/deleteAllData" class="btn btn-danger mb-3">Hapus Semua Data</a>
                <?php $pdf = false;
                if (strpos(current_url(), "prinpdf")) {
                    $pdf = true;
                }
                if ($pdf == false) {
                ?>
                    <input type="button" target="_blank" class="btn btn-warning mb-3" value="Print PDF" onclick="window.open('<?php echo site_url('siswa/printpdf') ?>','blank')">
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2023</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<?= $this->endSection() ?>