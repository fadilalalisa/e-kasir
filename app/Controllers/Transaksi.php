<?php

namespace App\Controllers;

use App\Models\DetailPenjualanModel;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    protected $transaksiModel;
    protected $detailpenjualanModel;

    public function __construct()
    {
        $this->detailpenjualanModel = new DetailPenjualanModel();
        $this->transaksiModel = new PenjualanModel();
    }

    public function index()
    //ketika method index dipanggil maka akan menjalankan/mengembalikan sebuah view
    {
        $bayar = $this->penjualanModel->select('penjualan.*, detail_penjualan.subtotal, users.nama')
        ->join('detail_penjualan', 'detail_penjualan.id_detail_penjualan = penjualan.id_detail_penjualan', 'inner')
        ->join('users', 'users.id_user = penjualan.id_user', 'inner')
        ->findAll();

        $data = [
            'bayar' => $bayar
        ];

        return view ('transaksi/bayar');
    }

}
