<?php

namespace App\Controllers;

class Lappenjualan extends BaseController
{
    public function index()
    //ketika method index dipanggil maka akan menjalankan/mengembalikan sebuah view
    {
        return view ('laporan/penjualan/list_penjualan');
    }
}
