<?php

namespace App\Models;

use CodeIgniter\Model;

class CmsnetModel extends Model
{
    protected $table      = 'customer';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'slug', 'alamat', 'telepon', 'registrasi', 'paket', 'ktp'];

    public function getCustomer($slug = false){
        if ($slug == false){
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();

    }
}