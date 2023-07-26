<?php

namespace App\Models;

use CodeIgniter\Model;

class Tb_InformasiModel extends Model
{
    protected $table = 'tb_informasi';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'keterangan', 'gambar'];

    public function getInformasi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
