<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\DetailPenjualanModel;

class DetailPenjualan extends BaseController
{
    protected $produkModel;
    protected $detailpenjualanModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->detailpenjualanModel = new DetailPenjualanModel();
    }

    public function index()
    {
        // Ambil semua data detailpenjualan

       $detailpenjualan = $this->detailpenjualanModel->select('detail_penjualan.*, produk.kode_produk, produk.nama_produk, 
       produk.harga_jual_sat','produk.harga_jual_lsn', 'produk.harga_jual_krt')
       ->join('produk', 'produk.kode_produk = detail_penjualan.kode_produk', 'inner')
       ->findAll();

       $produk = $this->produkModel->findAll();

       $data = [
        'detailpenjualan' => $detailpenjualan,
        'produk' => $produk
       ];

       return view('transaksi/trpenjualan', $data);
    }
    
    public function getdetailproduk(){
        $harga_satuan = 0;
        $data =  $this->detailpenjualanModel->getdetailproduk($_POST['kode_produk'])->getResult();
        foreach($data as $d){
            if($_POST['satuan'] == "sat"){
                $harga_satuan = $d?->harga_jual_sat;
            }elseif ($_POST['satuan'] == "lsn") {
                $harga_satuan = $d?->harga_jual_lsn;
            }elseif($_POST['satuan'] == "krt"){
                $harga_satuan = $d?->harga_jual_krt;
            }
        }

        $data = [
            'harga' => $harga_satuan     ];
        
            echo json_encode($data);
    }

    public function gettotalproduk(){
        $total = 0;
        $data = $this->detailpenjualanModel->gettotalproduk($_POST['subtotal'])->getResult();
        foreach($data as $d) {
            $total += $subtotal;
        }
    }

    public function add() 
    {
        // if(!$this->validate([
        //     'nama_produk' => 'is_unique[produk.nama_produk]'
        // ])) {
        //     return redirect()->to('detailpenjualan/index');
        // }

        $data = [
            'kode_produk' => $this->request->getVar('kode_produk'),
            'jumlah' => $this->request->getVar('jumlah'),
            'satuan' => $this->request->getVar('satuan'),
            'harga' => $this->request->getVar('harga'),
            'subtotal' => $this->request->getVar('subtotal')
        ];

        $this->detailpenjualanModel->insert($data);

        return redirect()->to('detailpenjualan/index');
    }

    public function delete($id_detail_penjualan)
    {
        $this->detailpenjualanModel->delete($id_detail_penjualan);

        return redirect()->to('detailpenjualan/index');
    }

    public function edit($id_detail_penjualan)
    {
        $detailpenjualan = new DetailPenjualanModel();
        $produk = $this->produkModel->findAll();

        $data ['detailpenjualan'] = $detailpenjualan->where('id_detail_penjualan', $id_detail_penjualan)->first();
        
        return view('transaksi/editpenjualan', $data);

        //     return redirect('supplier')->with('success', 'Data Updated Successfully');
    }

    public function update($id_detail_penjualan)
    {
        $data = [
            'kode_produk' => $this->request->getVar('kode_produk'),
            'jumlah'      => $this->request->getVar('jumlah'),
            'satuan'      => $this->request->getVar('satuan'),
            'harga'       => $this->request->getVar('harga'),
            'subtotal'    => $this->request->getVar('subtotal')
        ];

        if ($this->detailpenjualanModel->update($id_detail_penjualan, $data)) {
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

        $this->detailpenjualanModel->save($data);
        return redirect()->to('detailpenjualan/index');
    }
}
