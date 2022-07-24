<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPenjualanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'detail_penjualan';
    protected $primaryKey       = 'id_detail_penjualan';
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_produk', 'jumlah', 'satuan','harga', 'subtotal'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updateField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getdetailproduk($kode_produk){
        return $this->db->table('produk')->where('kode_produk', $kode_produk)->get();

    }

    public function gettotalproduk($subtotal) {
        return $this->db->table('detail_penjualan')->where('subtotal', $subtotal)->get();
    }

    // public function getHarga()
    // {
    //     return $this->db->table('produk')
    //     ->join('detail_penjualan','detail_penjualan.kode_produk=produk.kode_produk')
    //     ->get()->getResultArray();
        
    //     // $this->db->select('produk.harga_jual_sat');
    //     // $this->db->join('detail_penjualan','produk.kode_produk = detail_penjualan.kode_produk');
    //     // $this->db->where('satuan','pcs');

    //     // $query = $this->db->get();
    // }

    // public function getHargalsn()
    // {
    //     $this->db->select('produk.harga_jual_lsn');
    //     $this->db->join('detail_penjualan','produk.kode_produk = detail_penjualan.kode_produk');
    //     $this->db->where('satuan','rtg');
    
    //     $query = $this->db->get();
    // }

    // public function getHargakrt()
    // {
    //     $this->db->select('produk.harga_jual_krt');
    //     $this->db->join('detail_penjualan','produk.kode_produk = detail_penjualan.kode_produk');
    //     $this->db->where('satuan','krt');

    //     $query = $this->db->get();
    // }

    // public function getSubtotal()
    // {
    //     $this->db->select('jumlah*harga');
    //     $this->db->as('subtotal');
    //     $this->db->from('detail_penjualan');

    //     $query = $this->db->get();
    // }

    

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
