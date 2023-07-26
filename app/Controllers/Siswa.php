<?php

namespace App\Controllers;

use \Dompdf\Dompdf;
use \Dompdf\Options;
use autoload;

helper('form');


use  \App\Models\Tb_SiswaModel;
use  \App\Models\Tb_InformasiModel;
use     PSpell\Config;

class Siswa extends BaseController
{
    protected $siswaModel;
    protected $informasiModel;

    public function __construct()
    {
        $this->siswaModel = new Tb_SiswaModel();
        $this->informasiModel = new Tb_InformasiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'ini adalah sistem informasi'

        ];
        return view('siswa/index', $data);
    }
    public function siswa()
    {
        $data = [
            'nama' => 'John Doe',
            'siswa' => $this->siswaModel->getSiswa()

        ];
        echo view('siswa/tb_siswa', $data);
    }

    public function siswapdf()
    {
        $data = [
            'nama' => 'John Doe',
            'siswa' => $this->siswaModel->getSiswa()

        ];
        echo view('siswa/tb_siswa', $data);
    }

    public function detail($noregis)
    {

        $data = [
            'title' => 'Detail Siswa',
            'tanggalA' => ['created_at'],
            'siswa' => $this->siswaModel->getSiswa($noregis)
        ];
        //jika siswa tidak ada di tabel
        if (empty($data['siswa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('nomor regis' . $noregis . 'Tidak ditemukan.');
        }
        return view('siswa/detail', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'form tambah data siswa',
            'validation' => \Config\Services::validation()
        ];
        return view('siswa/create', $data);
    }

    public function save()

    {
        //validasi input
        if (!$this->validate([
            'nama_siswa' => [
                // 'rules' => 'required|is_unique[tb_siswa.nama_siswa]',
                'errors' => [
                    'required' => '{field} siswa harus diisi.'
                ]
            ],
            'akta_kelahiran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} siswa harus diisi.'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1080]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in'  => 'yang anda pilih bukan gambar'
                ]
            ],
            'kk' => [
                'rules' => 'max_size[foto,1080]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in'  => 'yang anda pilih bukan gambar'
                ]
            ],
            'akta_kelahiran' => [
                'rules' => 'max_size[foto,1080]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in'  => 'yang anda pilih bukan gambar'
                ]
            ]
        ])) {

            // session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/siswa/create')->withInput();
        }
        //ambil gambar
        $filefoto = $this->request->getFile('foto');

        //apakah tidak ada gambar yg diupload
        if ($filefoto->getError() == 4) {
            $namafoto = 'default.jpg';
        } else {
            //generate nama foto
            $namafoto = $filefoto->getRandomName();

            // pindahkan file ke folder img
            $filefoto->move('assets/img-siswa/', $namafoto);
        }

        //ambil kk
        $filekk = $this->request->getFile('kk');

        //apakah tidak ada gambar yg diupload
        if ($filekk->getError() == 4) {
            $namakk = 'default.jpg';
        } else {
            //generate nama foto
            $namakk = $filekk->getRandomName();

            // pindahkan file ke folder img
            $filekk->move('assets/img-siswa/kk/', $namakk);
        }

        //ambil akta
        $fileakta = $this->request->getFile('akta_kelahiran');

        //apakah tidak ada gambar yg diupload
        if ($fileakta->getError() == 4) {
            $namaakta = 'default.jpg';
        } else {
            //generate nama foto
            $namaakta = $fileakta->getRandomName();

            // pindahkan file ke folder img
            $fileakta->move('assets/img-siswa/akta/', $namaakta);
        }

        $this->siswaModel->save(
            [
                'no_regis' => $this->get_no_regis(),
                'nama_siswa' => $this->request->getVar('nama_siswa'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'alamat' => $this->request->getVar('alamat'),
                'nama_ortu' => $this->request->getVar('nama_ortu'),
                'akta_kelahiran' => $namaakta,
                'kk' => $namakk,
                'foto' => $namafoto
            ]
        );

        session()->setFlashdata('pesan', 'data berhasil ditambahkan.');
        return redirect()->to(base_url() . '/siswa/siswa');
    }

    function get_no_regis()
    {
        $db = db_connect();
        $cd = $db->query("SELECT MAX(RIGHT(no_regis,4)) AS kd_max FROM tb_siswa WHERE DATE(tanggal)=CURDATE()");
        $kd = "";
        if ($cd->getNumRows() > 0) {
            foreach ($cd->getResult() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'RA' . date('dmy') . "-" . $kd;
    }

    public function delete($id)
    {

        //cari gambar berdasaarkan id
        $siswa = $this->siswaModel->find($id);

        //cek jika foto difolder tidak ada/terhapus manual maka tidak usah nyari di direktori tapi data tetep kehapus
        if (file_exists('assets/img-siswa/akta/' . $siswa['akta_kelahiran'])) {
            unlink('assets/img-siswa/akta/' . $siswa['akta_kelahiran']);
        }


        if (file_exists('assets/img-siswa/kk/' . $siswa['kk'])) {
            unlink('assets/img-siswa/kk/' . $siswa['kk']);
        }


        if (file_exists('assets/img-siswa/' . $siswa['foto'])) {
            unlink('assets/img-siswa/' . $siswa['foto']);
        }

        $this->siswaModel->delete($id);
        session()->setFlashdata('pesan', 'data berhasil dihapus.');

        return redirect()->to('/siswa/siswa');
    }


    public function deleteAllData()
    {
        // Load the model
        $model = new Tb_SiswaModel();

        // Call the deleteAllData method to delete all data from the table
        $model->deleteAllData();

        // Redirect or display a success message
        return redirect()->to('/siswa/siswa'); // Replace 'your-controller' with your actual controller name
    }

    public function edit($noregis)
    {
        $data = [
            'title' => 'form ubah data siswa',
            'validation' => \Config\Services::validation(),
            'siswa' => $this->siswaModel->getSiswa($noregis)
        ];

        return view('siswa/edit', $data);
    }

    public function update($id)
    {
        //cek uniqe data pd judul
        $noRegis = $this->siswaModel->getSiswa($this->request->getVar('no_regis'));
        $noregisLama = $this->siswaModel->getSiswa($this->request->getVar('no_regis'));
        if ($noregisLama['no_regis'] == $this->request->getVar('no_regis')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[tb_siswa.no_regis]';
        }
        if (!$this->validate([
            'foto' => [
                'rules' => 'max_size[foto,1080]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in'  => 'yang anda pilih bukan gambar'
                ]
            ]
        ])) {

            return redirect()->to('/siswa/edit/' . $this->request->getVar('no_regis'))->withInput();
        }

        $fileFoto = $this->request->getFile('foto');
        $filekk = $this->request->getFile('kk');
        $fileakta = $this->request->getFile('akta_kelahiran');


        //cek gambar lama atau tidak
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            //generate nama foto random
            $namaFoto = $fileFoto->getRandomName();
            //pindahkan gambar lama
            $fileFoto->move('assets/img-siswa/', $namaFoto);
            //hapus file lama
            unlink('assets/img-siswa/' . $this->request->getVar('fotoLama'));
        }
        //cek akta lama atau tidak
        if ($fileakta->getError() == 4) {
            $namaakta = $this->request->getVar('aktaLama');
        } else {
            //generate nama foto random
            $namaakta = $fileakta->getRandomName();
            //pindahkan gambar lama
            $fileakta->move('assets/img-siswa/akta/', $namaakta);
            //hapus file lama
            unlink('assets/img-siswa/akta/' . $this->request->getVar('aktaLama'));
        }

        //cek kk lama atau tidak
        if ($filekk->getError() == 4) {
            $namakk = $this->request->getVar('kkLama');
        } else {
            //generate nama foto random
            $namakk = $filekk->getRandomName();
            //pindahkan gambar lama
            $filekk->move('assets/img-siswa/kk/', $namakk);
            //hapus file lama
            unlink('assets/img-siswa/kk/' . $this->request->getVar('kkLama'));
        }

        $noregis = url_title($this->request->getVar('no_regis'), '-', true);

        $this->siswaModel->save(
            [
                'id' => $id,
                'no_regis' => $noregis,
                'nama_siswa' => $this->request->getVar('nama_siswa'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'alamat' => $this->request->getVar('alamat'),
                'nama_ortu' => $this->request->getVar('nama_ortu'),
                'akta_kelahiran' => $namaakta,
                'kk' => $namakk,
                'foto' => $namaFoto
            ]
        );

        session()->setFlashdata('pesan', 'data berhasil diubah.');
        return redirect()->to(base_url() . '/siswa/siswa');
    }

    public function informasi()
    {
        $data = [
            'nama' => 'John Doe',
            'informasi' => $this->informasiModel->getInformasi()

        ];
        echo view('siswa/informasi', $data);
    }

    public function createinfo()
    {

        $data = [
            'title' => 'form tambah data siswa',
            'validation' => \Config\Services::validation()
        ];
        return view('siswa/createinfo', $data);
    }

    public function saveinfo()

    {
        //validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[tb_informasi.nama]',
                'errors' => [
                    'required' => '{field} judul harus diisi.',
                    'is_unique' => '{field} judul sudah terdaftar.'
                ]
            ]
        ])) {

            // session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/siswa/createinfo')->withInput();
        }
        //ambil gambar
        $filegambar = $this->request->getFile('gambar');

        //apakah tidak ada gambar yg diupload
        if ($filegambar->getError() == 4) {
            $namagambar = 'default.jpg';
        } else {
            //generate nama foto
            $namagambar = $filegambar->getRandomName();

            // pindahkan file ke folder img
            $filegambar->move('assets/img-siswa/informasi', $namagambar);
        }

        // $id = url_title($this->request->getVar('nama'), '-', true);
        $this->informasiModel->save(
            [
                'nama' => $this->request->getVar('nama'),
                'keterangan' => $this->request->getVar('keterangan'),
                'gambar' => $namagambar
            ]


        );

        session()->setFlashdata('pesan', 'data berhasil ditambahkan.');
        return redirect()->to(base_url() . '/siswa/informasi');
    }

    public function guru()
    {

        $data = [
            'nama' => 'John Doe',
            'informasi' => 'ini informasi'

        ];
        echo view('guru/index', $data);
    }

    public function deleteInfo($id)
    {

        //cari gambar berdasaarkan id
        $informasi = $this->informasiModel->find($id);

        //cek jika foto difolder tidak ada/terhapus manual maka tidak usah nyari di direktori tapi data tetep kehapus
        if ($informasi['gambar'] != null ||  $informasi['gambar'] != "") {
            if (file_exists('assets/img-siswa/informasi/' . $informasi['gambar'])) {
                unlink('assets/img-siswa/informasi/' . $informasi['gambar']);
            }
        }

        $this->informasiModel->delete($id);
        session()->setFlashdata('pesan', 'data berhasil dihapus.');

        return redirect()->to('/siswa/informasi');
    }

    public function printpdf()
    {
        $options = new Options();
        $options->set('defaultFont', 'Courier');

        $dompdf = new Dompdf($options);

        $dompdf->setOptions($options);
        $data = [
            'nama' => 'John Doe',
            'siswa' => $this->siswaModel->getSiswa()

        ];

        $html = view('siswa/view_pdf', $data);
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        // $dompdf->stream();
        $dompdf->stream('data calon siswa.pdf', array(
            "Attachment" => false
        ));
    }
}
