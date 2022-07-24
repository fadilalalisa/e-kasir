<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_transaksi', 'total','bayar','kembali'];

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

    // protected $validationMessages = [
    //     'kode_produk'        => [
    //         'required' => 'Bagian Kode Produk Harus diisi'
    //     ],
    //     'nama_produk'        => [
    //         'required' => 'Bagian Nama Produk Harus diisi'
    //     ],
    //     'harga_pokok_sat'        => [
    //         'required' => 'Bagian Harga Produk Harus diisi',
    //         'numeric' => 'Hanya bisa diisi dengan angka'
    //     ],
    //     'harga_pokok_lsn'        => [
    //         'required' => 'Bagian Harga Produk Harus diisi',
    //         'numeric' => 'Hanya bisa diisi dengan angka'
    //     ],
    //     'harga_pokok_krt'        => [
    //         'required' => 'Bagian Harga Produk Harus diisi',
    //         'numeric' => 'Hanya bisa diisi dengan angka'
    //     ],
    //     'harga_jual_sat'        => [
    //         'required' => 'Bagian Harga Produk Harus diisi',
    //         'numeric' => 'Hanya bisa diisi dengan angka'
    //     ],
    //     'harga_pokok_lsn'        => [
    //         'required' => 'Bagian Harga Produk Harus diisi',
    //         'numeric' => 'Hanya bisa diisi dengan angka'
    //     ],
    //     'harga_pokok_krt'        => [
    //         'required' => 'Bagian Harga Produk Harus diisi',
    //         'numeric' => 'Hanya bisa diisi dengan angka'
    //     ]
    // ];

    // protected $skipValidation  = false;

}
