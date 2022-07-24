<?php

namespace App\Controllers;
use App\Models\SupplierModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Supplier extends BaseController
{
    protected $supplier;

    public function __construct()
    {
        $this->supplier = new SupplierModel();
    }

    public function index()
    {
        // Ambil semua data supplier
        $supplier_list = $this->supplier->findAll();

        $data = [
            'supplier_list' => $supplier_list,
        ];

        return view('supplier/list_supplier', $data);
    }

    public function show($id)
	{
		$supplier = new SupplierModel();
		$data['supplier'] = $supplier->where('id_supplier', $id)->first();
		
		if(!$data['supplier']){
			throw PageNotFoundException::forPageNotFound();
		}
		return view('supplier/list_supplier', $data);
    }
    
    public function add() 
    {
        //lakukan validasi
        $validation = \Config\Services::validation();
        $validation->setRules(['id_supplier'=>'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        //jika valid, simpan ke database
        if($isDataValid){
            $supplier = new SupplierModel();
            $supplier->insert([
                "id_supplier" => $this->request->getpost('id_supplier'),
                "nama" => $this->request->getpost('nama'),
                "alamat" => $this->request->getpost('alamat'),
                "telepon" => $this->request->getpost('telepon')
            ]);
            return redirect('supplier/index');
        }
        return view('supplier/add_supplier');
    }

    public function edit($id)
    {
        // ambil supplier yang akan diedit
        $supplier = new SupplierModel();
        $data['supplier'] = $supplier->where('id_supplier', $id)->first();
        
        // lakukan validasi data supplier
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id_supplier' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if($isDataValid){
            $supplier->update($id, [
                "nama" => $this->request->getPost('nama'),
                "alamat" => $this->request->getPost('alamat'),
                "telepon" => $this->request->getPost('telepon')
            ]);
            return redirect('supplier/index');
        }

        // tampilkan form edit
        return view('supplier/edit_supplier', $data);
    }

    public function save()
    {
        $model = new SupplierModel();
        $data = array(
            'id_supplier' => $this->request->getPost('id_supplier'),
            'nama'        => $this->request->getPost('nama'),
            'alamat'      => $this->request->getPost('alamat'),
            'telepon'     => $this->request->getPost('telepon'),
        );
        $model->saveProduct($data);
        return redirect()->to('/supplier');
    }
    // public function update($id) {
    //     // Validasi input
    //     if ($this->validate([
    //         'nama' => [
    //             'label' => 'Nama',
    //             'rules' => 'required',
    //             'errors'=> [
    //                 'required' => '{field} tidak boleh kosong.'
    //             ]
    //         ],
    //         'alamat' => [
    //             'label' => 'alamat',
    //             'rules' => 'required',
    //             'errors'=> [
    //                 'required' => '{field} tidak boleh kosong.'
    //             ]
    //         ],
    //         'telepon' => [
    //             'label' => 'telepon',
    //             'rules' => 'required',
    //             'errors'=> [
    //                 'required' => '{field} tidak boleh kosong.'
    //             ]
    //         ],
    //     ])) {
    //         return redirect()->back()->withInput();
    //     }

    //     // Ambil data dari form
    //     $data = [
    //         'nama'  => $this->request->getVar('nama'),
    //         'alamat'  => $this->request->getVar('alamat'),
    //         'telepon'  => $this->request->getVar('telepon'),
    //     ];

    //     // Simpan data
    //     if ($this->supplierModel->update($id, $data)) {
    //         session()->setFlashdata([
    //             'tipe'  => 'success',
    //             'pesan' => 'Data produk berhasil diperbarui.'
    //         ]);
    //     } else {
    //         session()->setFlashdata([
    //             'tipe'  => 'warning',
    //             'pesan' => 'Gagal memperbarui data produk.'
    //         ]);
    //     }

    //     return redirect()->back();
    // }
}
