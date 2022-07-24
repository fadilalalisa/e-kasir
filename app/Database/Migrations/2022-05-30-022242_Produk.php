<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_supplier'        => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama'           => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat'         => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'telepon'        => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at'     => [
                'type'       => 'DATETIME',
            ],
            'updated_at'     => [
                'type'       => 'DATETIME',
            ],
            'deleted_at'     => [
                'type'       => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id_supplier', true);
        $this->forge->createTable('supplier');

        $this->forge->addField([
            'id_produk'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama'           => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi'      => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'harga_pokok'    => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'harga_jual'     => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'stok'           => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'satuan'         => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_supplier'    => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'created_at'     => [
                'type'       => 'DATETIME',
            ],
            'updated_at'     => [
                'type'       => 'DATETIME',
            ],
            'deleted_at'     => [
                'type'       => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id_produk', true);
        $this->forge->addForeignKey('id_supplier', 'supplier', 'id_supplier', 'cascade', 'cascade');
        $this->forge->createTable('produk');

        $this->forge->addField([
            'id_pembelian'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nota'           => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggal'        => [
                'type'       => 'DATETIME',
            ],
            'id_user'        => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'created_at'     => [
                'type'       => 'DATETIME',
            ],
            'updated_at'     => [
                'type'       => 'DATETIME',
            ],
            'deleted_at'     => [
                'type'       => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id_pembelian', true);
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'cascade', 'cascade');
        $this->forge->createTable('pembelian');
        
        $this->forge->addField([
            'id_detail_pembelian'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_pembelian'        => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'id_produk'        => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'jumlah'        => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addKey('id_detail_pembelian', true);
        $this->forge->addForeignKey('id_pembelian', 'pembelian', 'id_pembelian', 'cascade', 'cascade');
        $this->forge->addForeignKey('id_produk', 'produk', 'id_produk', 'cascade', 'cascade');
        $this->forge->createTable('detail_pembelian');
        
        $this->forge->addField([
            'id_penjualan'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nota'           => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggal'        => [
                'type'       => 'DATETIME',
            ],
            'id_user'        => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'created_at'     => [
                'type'       => 'DATETIME',
            ],
            'updated_at'     => [
                'type'       => 'DATETIME',
            ],
            'deleted_at'     => [
                'type'       => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id_penjualan', true);
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'cascade', 'cascade');
        $this->forge->createTable('penjualan');
        
        $this->forge->addField([
            'id_detail_penjualan'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_penjualan'        => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'id_produk'        => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'jumlah'        => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addKey('id_detail_penjualan', true);
        $this->forge->addForeignKey('id_penjualan', 'penjualan', 'id_penjualan', 'cascade', 'cascade');
        $this->forge->addForeignKey('id_produk', 'produk', 'id_produk', 'cascade', 'cascade');
        $this->forge->createTable('detail_penjualan');
    }

    public function down()
    {
        $this->forge->dropForeignKey('produk', 'produk_id_supplier_foreign');
        $this->forge->dropTable('supplier', true, false);
        
        $this->forge->dropForeignKey('pembelian', 'pembelian_id_user_foreign');
        $this->forge->dropForeignKey('detail_pembelian', 'detail_pembelian_id_pembelian_foreign');
        $this->forge->dropForeignKey('detail_pembelian', 'detail_pembelian_id_produk_foreign');
        $this->forge->dropTable('pembelian', true, false);
        $this->forge->dropTable('detail_pembelian', true, false);
        
        $this->forge->dropForeignKey('penjualan', 'penjualan_id_user_foreign');
        $this->forge->dropForeignKey('detail_penjualan', 'detail_penjualan_id_penjualan_foreign');
        $this->forge->dropForeignKey('detail_penjualan', 'detail_penjualan_id_produk_foreign');
        $this->forge->dropTable('penjualan', true, false);
        $this->forge->dropTable('detail_penjualan', true, false);

        $this->forge->dropTable('produk');
    }
}
