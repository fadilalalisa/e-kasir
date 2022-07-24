<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'penjualan';
    protected $primaryKey       = 'id_kategori';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_kategori', 'nama_kategori'];

    // Dates
    protected $useTimestamps = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}
