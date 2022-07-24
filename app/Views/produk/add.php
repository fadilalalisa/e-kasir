<?= $this->extend('templates/layout') ?>

<?= $this->section('title') ?>
<title>Produk - Add</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<form action="/produk/save" method="post">
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Data Produk</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4>Periksa Entrian Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <form method="post" action="<?= base_url('produk/save') ?>">
                <?= csrf_field(); ?>
             
            <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control">
                        <option value="">-Select-</option>
                        <?php foreach($kategori as $row):?>
                        <option value="<?= $row['id_kategori'];?>"><?= $row['nama_kategori'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            
                <div class="form-group">
                    <label>Kode Produk</label>
                    <input type="text" class="form-control" name="kode_produk" placeholder="Kode Produk">
                </div>

                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk">
                </div>
 
                <div class="form-group">
                    <label>Satuan</label>
                    <select name="satuan" class="form-control">
                        <option value="">-Select-</option>
                        <?php foreach($satuan as $row):?>
                        <option value="<?= $row['id_satuan'];?>"><?= $row['nama_satuan'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Harga Pokok</label>
                    <input type="text" class="form-control" name="harga_pokok" placeholder="Harga Pokok">
                </div>

                <div class="form-group">
                    <label>Harga Jual</label>
                    <input type="text" class="form-control" name="harga_jual" placeholder="Harga Jual">
                </div>

                <div class="form-group">
                    <label>Stok</label>
                    <input type="text" class="form-control" name="stok" placeholder="Stok">
                </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
    </form>
<?= $this->endSection('content'); ?>