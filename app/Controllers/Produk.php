<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\SupplierModel;

class Produk extends BaseController
{
    protected $produkModel;
    protected $supplierModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        // Ambil semua data produk
        $produk_list = $this->produkModel->select('produk.*, supplier.id_supplier, supplier.nama')
        ->join('supplier', 'supplier.id_supplier = produk.id_supplier', 'inner')
        ->findAll();


        $data = [
            'produk_list' => $produk_list
        ];

        return view('produk/list_produk', $data);
    }

    public function add() 
    {
        $supplier = $this->supplierModel->findAll();

        $data = [
            'supplier' => $supplier
        ];

        return view('produk/add_produk', $data);
    }

    public function save()
    {
        //validasi input
        // if(!$this->validate([
        //     'kode_produk' => 'required|is_unique[produk.kode_produk]'
        // ])) {
        //     $validation = \Config\Service::validation();
        //     return redirect()->to('/produk/add')->withInput()->with('validation', $validation);
        // }

        $data = [
            'id_supplier' => $this->request->getVar('id_supplier'),
            'kode_produk' => $this->request->getVar('kode_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga_pokok_sat' => $this->request->getVar('harga_pokok_sat'),
            'harga_pokok_lsn' => $this->request->getVar('harga_pokok_lsn'),
            'harga_pokok_krt' => $this->request->getVar('harga_pokok_krt'),
            'harga_jual_sat' => $this->request->getVar('harga_jual_sat'),
            'harga_jual_lsn' => $this->request->getVar('harga_jual_lsn'),
            'harga_jual_krt' => $this->request->getVar('harga_jual_krt'),
            'stok_sat' => $this->request->getVar('stok_sat'),
            'stok_lsn'  => $this->request->getVar('stok_lsn'),
            'stok_krt'  => $this->request->getVar('stok_krt')
        ];
        
        $this->produkModel->insert($data); 

        return redirect()->to('produk/index');
    } 

    public function delete($kode_produk)
    {
        $this->produkModel->delete($kode_produk);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('produk/index');
    }

    public function edit($kode_produk) 
    {

        $produk = new ProdukModel();
        $data['produk'] = $produk->where('kode_produk', $kode_produk)->first();

        return view('produk/edit_produk', $data);
        // return redirect()->to('produk/index');
    }

    public function update($kode_produk) {
        // Validasi input
        // if ($this->validate([
        //     'kode_produk' => [
        //         'label' => 'kode_produk',
        //         'rules' => 'required',
        //         'errors'=> [
        //             'required' => '{field} tidak boleh kosong.'
        //         ]
        //     ],
        //     'nama_produk' => [
        //         'label' => 'nama_produk',
        //         'rules' => 'required',
        //         'errors'=> [
        //             'required' => '{field} tidak boleh kosong.'
        //         ]
        //     ],
        //     'harga_pokok_sat' => [
        //         'label' => 'harga_pokok_sat',
        //         'rules' => 'required',
        //         'errors'=> [
        //             'required' => '{field} tidak boleh kosong.'
        //         ]
        //     ],
        //     'harga_pokok_lsn' => [
        //         'label' => 'harga_pokok_lsn',
        //         'rules' => 'required',
        //         'errors'=> [
        //             'required' => '{field} tidak boleh kosong.'
        //         ]
        //     ],
        //     'harga_pokok_krt' => [
        //         'label' => 'harga_pokok_krt',
        //         'rules' => 'required',
        //         'errors'=> [
        //             'required' => '{field} tidak boleh kosong.'
        //         ]
        //     ],
        //     'harga_jual_sat' => [
        //         'label' => 'harga_jual_sat',
        //         'rules' => 'required',
        //         'errors'=> [
        //             'required' => '{field} tidak boleh kosong.'
        //         ]
        //     ],
        //     'harga_jual_lsn' => [
        //         'label' => 'harga_jual_lsn',
        //         'rules' => 'required',
        //         'errors'=> [
        //             'required' => '{field} tidak boleh kosong.'
        //         ]
        //     ],
        //     'harga_jual_krt' => [
        //         'label' => 'harga_jual_krt',
        //         'rules' => 'required',
        //         'errors'=> [
        //             'required' => '{field} tidak boleh kosong.'
        //         ]
        //     ],
        //     'stok' => [
        //         'label' => 'Stok',
        //         'rules' => 'required',
        //         'errors'=> [
        //             'required' => '{field} tidak boleh kosong.'
        //         ]
        //     ]
        // ])) {
        //     return redirect()->back()->withInput();
        // }
        
        //cek kode produk
        // $kode = $this->produkModel->
        // if(!$this->validate([
        //     'kode_produk' => [
        //         'rules' => 'required|is_unique[produk.kode_produk]',
        //         'errors' => [
        //             'required' => '{field} produk harus diisi.',
        //             'is_unique' => '{field} produk sudah ada'
        //         ]
        //     ]
        // ])) {
        //     $validation = \Config\Services::validation();
        //     return redirect()->to('/produk/edit/'.$this->request->getVar('kode_produk'))->withInput()->with('validation', $validation);
        // }

        // Ambil data dari form
        $data = [
            'id_supplier' => $this->request->getVar('id_supplier'),
            'kode_produk'  => $kode_produk,
            'nama_produk'  => $this->request->getVar('nama_produk'),
            'harga_pokok_sat'  => $this->request->getVar('harga_pokok_sat'),
            'harga_pokok_lsn'  => $this->request->getVar('harga_pokok_lsn'),
            'harga_pokok_krt'  => $this->request->getVar('harga_pokok_krt'),
            'harga_jual_sat'  => $this->request->getVar('harga_jual_sat'),
            'harga_jual_lsn'  => $this->request->getVar('harga_jual_lsn'),
            'harga_jual_krt'  => $this->request->getVar('harga_jual_krt'),
            'stok_sat'  => $this->request->getVar('stok_sat'),
            'stok_lsn'  => $this->request->getVar('stok_lsn'),
            'stok_krt'  => $this->request->getVar('stok_krt')
        ];

        // Simpan data
        if ($this->produkModel->update($kode_produk, $data)) {
            session()->setFlashdata([
                'tipe'  => 'success',
                'pesan' => 'Data produk berhasil diperbarui.'
            ]);
        } else {
            session()->setFlashdata([
                'tipe'  => 'warning',
                'pesan' => 'Gagal memperbarui data produk.'
            ]);
        }

        $this->produkModel->save($data);
        return redirect()->to('/produk/index');
    }
}
