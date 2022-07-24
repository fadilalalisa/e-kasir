<?php

namespace App\Controllers;

use App\Models\SupplierModel;

class Supplier extends BaseController
{
    protected $supplierModel;

    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
       $supplier = $this->supplierModel->findAll();

       $data = [
        'supplier' => $supplier
       ];

       return View('supplier/list_supplier', $data);
    }
    
    public function add() 
    {
        return view('supplier/add_supplier');
    }

    public function save()
    {
        $data = [
            'id_supplier' => $this->request->getVar('id_supplier'),
            'nama'        => $this->request->getVar('nama'),
            'alamat'      => $this->request->getVar('alamat'),
            'telepon'     => $this->request->getVar('telepon'),
        ];

        $this->supplierModel->insert($data);

            return redirect()->to('supplier/index');
    }

    public function delete($id_supplier)
    {
        $this->supplierModel->delete($id_supplier);

        return redirect()->to('supplier/index');
    }

    public function edit($id_supplier)
    {
        $supplier = new SupplierModel();

        $data ['supplier'] = $supplier->where('id_supplier', $id_supplier)->first();
        
        return view('supplier/edit_supplier', $data);

        //     return redirect('supplier')->with('success', 'Data Updated Successfully');
    }

    public function update($id_supplier)
    {
        $data = [
            'id_supplier' => $this->request->getVar('id_supplier'),
            'nama'        => $this->request->getVar('nama'),
            'alamat'      => $this->request->getVar('alamat'),
            'telepon'     => $this->request->getVar('telepon'),
        ];

        if ($this->supplierModel->update($id_supplier, $data)) {
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

        $this->supplierModel->save($data);
        return redirect()->to('supplier/index');
    }
}
