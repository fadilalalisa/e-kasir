<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'produk';
    protected $primaryKey       = 'kode_produk';
    protected $protectFields    = true;
    protected $allowedFields    = [
                                    'kode_produk','id_supplier', 'nama_produk', 
                                    'harga_pokok_sat', 'harga_pokok_lsn', 'harga_pokok_krt', 
                                    'harga_jual_sat', 'harga_jual_lsn', 'harga_jual_krt', 
                                    'stok_sat', 'stok_lsn', 'stok_krt'
                                ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

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

    protected $validationMessages = [
        'kode_produk'        => [
            'required' => 'Bagian Kode Produk Harus diisi'
        ],
        'nama_produk'        => [
            'required' => 'Bagian Nama Produk Harus diisi'
        ],
        'harga_pokok_sat'        => [
            'required' => 'Bagian Harga Produk Harus diisi',
            'numeric' => 'Hanya bisa diisi dengan angka'
        ],
        'harga_pokok_lsn'        => [
            'required' => 'Bagian Harga Produk Harus diisi',
            'numeric' => 'Hanya bisa diisi dengan angka'
        ],
        'harga_pokok_krt'        => [
            'required' => 'Bagian Harga Produk Harus diisi',
            'numeric' => 'Hanya bisa diisi dengan angka'
        ],
        'harga_jual_sat'        => [
            'required' => 'Bagian Harga Produk Harus diisi',
            'numeric' => 'Hanya bisa diisi dengan angka'
        ],
        'harga_pokok_lsn'        => [
            'required' => 'Bagian Harga Produk Harus diisi',
            'numeric' => 'Hanya bisa diisi dengan angka'
        ],
        'harga_pokok_krt'        => [
            'required' => 'Bagian Harga Produk Harus diisi',
            'numeric' => 'Hanya bisa diisi dengan angka'
        ]
    ];

    protected $skipValidation  = false;

    public function jumlahproduk()
    {
        $this->db->select('produk.kode_produk');
        $query = $this->db->get('produk');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }

}
