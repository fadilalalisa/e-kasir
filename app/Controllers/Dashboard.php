<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\SupplierModel;

class Dashboard extends BaseController
{
    protected $produkModel;
    protected $supplierModel; 

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    //ketika method index dipanggil maka akan menjalankan/mengembalikan sebuah view
    {
        // Ambil semua data produk
        $produk = $this->produkModel->findAll();

        // Ambil semua data produk
        $supplier = $this->supplierModel->findAll();

        $data = [
            'produk' => $produk,
            'supplier' => $supplier
        ];

        // $jmlproduk = $this->produkModel->jumlahproduk();
        // $jmlsupplier = $this->supplierModel->jumlahsupplier();

        return view('dashboard', $data);
    }
}
