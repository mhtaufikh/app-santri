<?php

namespace App\Controllers;

helper('form');


use  \App\Models\Tb_SiswaModel;
use PSpell\Config;

class Csiswa extends BaseController
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new Tb_SiswaModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Siswa | WebPoik',
            'salam' => ['poik', 'uhuy']
        ];
        echo view('csiswa/index', $data);
    }

    public function csiswa()
    {
        $data = [
            'nama' => 'John Doe',
            'csiswa' => $this->siswaModel->getSiswa()

        ];
        echo view('siswa/tb_siswa', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'form tambah data siswa',
            'validation' => \Config\Services::validation()
        ];
        return view('csiswa/pendaftaran', $data);
    }

    public function save()

    {
        //validasi input
        if (!$this->validate([
            'nama_siswa' => [
                'rules' => 'required|is_unique[tb_siswa.nama_siswa]',
                'errors' => [
                    'required' => '{field} siswa harus diisi.',
                    'is_unique' => '{field} siswa sudah terdaftar.'
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
            return redirect()->to('/csiswa/pendaftaran')->withInput();
        }
        //ambil gambar
        $filefoto = $this->request->getFile('foto');

        //apakah tidak ada gambar yg diupload
        if ($filefoto->getError() == 4) {
            $namafoto = 'default.png';
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
            $namakk = 'default.png';
        } else {
            //generate nama foto
            $namakk = $filekk->getRandomName();

            // pindahkan file ke folder img
            $filekk->move('assets/img-siswa/kk/', $namakk);
        }

        //ambil ktp
        $fileakta = $this->request->getFile('akta_kelahiran');

        //apakah tidak ada gambar yg diupload
        if ($fileakta->getError() == 4) {
            $namaakta = 'default.png';
        } else {
            //generate nama foto
            $namaakta = $fileakta->getRandomName();

            // pindahkan file ke folder img
            $fileakta->move('assets/img-siswa/akta/', $namaakta);
        }

        $slug = url_title($this->request->getVar('nama_siswa'), '-', true);
        $noregis = $this->get_no_regis();
        $this->siswaModel->save(
            [
                'slug' => $slug,
                'no_regis' => $noregis,
                'nama_siswa' => $this->request->getVar('nama_siswa'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'alamat' => $this->request->getVar('alamat'),
                'nama_ortu' => $this->request->getVar('nama_ortu'),
                'akta_kelahiran' => $namaakta,
                'kk' => $namakk,
                'foto' => $namafoto
            ]
        );

        session()->setFlashdata('pesan', 'Pendaftaran Berhasil');
        return redirect()->to(base_url() . '/csiswa/buktidaftar/' . $noregis);
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





    public function informasi()
    {
        $data = [
            'title' => 'Siswa | WebPoik',
            'salam' => ['poik', 'uhuy']
        ];
        echo view('csiswa/informasi', $data);
    }
    public function pendaftaran()
    {
        $data = [
            'title' => 'Siswa | WebPoik',
            'salam' => ['poik', 'uhuy']
        ];
        echo view('csiswa/pendaftaran', $data);
    }

    public function buktidaftar($noregis)
    {
        $data = [
            'title' => 'Detail Siswa',
            'siswa' => $this->siswaModel->getSiswa($noregis)
        ];
        //jika siswa tidak ada di tabel
        if (empty($data['siswa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('nomor regis' . $noregis . 'Tidak ditemukan.');
        }
        return view('csiswa/buktidaftar', $data);
    }
}
