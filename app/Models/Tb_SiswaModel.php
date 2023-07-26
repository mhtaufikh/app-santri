<?php

namespace App\Models;

use CodeIgniter\Model;

class Tb_SiswaModel extends Model
{
    protected $table = 'tb_siswa';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_regis', 'nama_siswa', 'jenis_kelamin', 'alamat', 'nama_ortu', 'akta_kelahiran',  'kk', 'foto'];

    public function getSiswa($noregis = false)
    {
        $tanggalA = 'created_at';
        if ($noregis == false) {
            return $this->orderBy('no_regis', 'desc')->findAll();
        }

        return $this->where(['no_regis' => $noregis])->first();
    }

    public function deleteAlldata()
    {
        return $this->db->table($this->table)->emptyTable();
    }
}
