<html>
<style>
    table,
    td,
    th {
        border: 1px solid black;
    }

    table {
        width: 100%;
    }
</style>

<body>
    <h3 style="text-align: center;">Laporan data siswa baru pendaftaran ajaran 2023/2024</h3>
    <table>

        <thead>
            <h1 style="align-items: center;">Daftar calon siswa</h1>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>No registrasi</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Nama Orang Tua</th>
                <th>Akta Kelahiran</th>
                <th>Kartu Keluarga</th>
                <th>Foto</th>


            </tr>
            </thead>
        </tfoot>
        <tbody>
            <?php $i = 1;
            $r = 1; ?>
            <?php foreach ($siswa as $s) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $s['no_regis'] ?></td>
                    <td><?= $s['nama_siswa'] ?></td>
                    <td><?= $s['jenis_kelamin'] ?></td>
                    <td><?= $s['alamat'] ?></td>
                    <td><?= $s['nama_ortu'] ?></td>
                    <td><img src="/assets/img-siswa/akta/<?= $s['akta_kelahiran']; ?>" class="sampul" alt=""></td>
                    <td><?= $s['kk'] ?></td>
                    <td><img src="<?= base_URL('/assets/img-siswa') ?>/<?= $s['foto'] ?>" class="sampul" alt="">
                        <img src="https://www.telkomsel.com/sites/default/files/2023-06/717%20-%20Tips%20Permainan%20Tembakan%20PB%20%28Point%20Blank%29%20Seperti%20Pemain%20Pro.png" alt="">
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>


</html>