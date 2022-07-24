<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'supplier';
    protected $primaryKey       = 'id_supplier';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_supplier', 'nama', 'alamat', 'telepon'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // function __construct()
    // {
    //     $this->db = db_connect();
    // }

    // function tampildata()
    // {
    //     return $this->db->table('supplier')->get();
    // }

    // function simpan($data)
    // {
    //     return $this->db->table('supplier')->insert($data);
    // }

    // function hapusdata($id_supplier)
    // {
    //     $where = array('id_supplier' => $id_supplier);
    //     $this->db->table('supplier')->where($where,'supplier')->delete(['id_supplier'=>$id_supplier]);

    //     // $this->db->where('id_supplier',$id_supplier);
    //     // $this->db->delete('supplier',$table);
    // }

    // function ambildata($id_supplier)
    // {
    //     return $this->db->table('supplier')->getWhere(['id_supplier'=>$id_supplier]);
    // }

    // function editdata($data, $id_supplier)
    // {
    //     return $this->db->table('supplier')->update($data, ['id_supplier'=>$id_supplier]);
    // }

    public function jumlahsupplier()
    {
        $query = $this->db->get('supplier');
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
