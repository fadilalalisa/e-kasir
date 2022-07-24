<?= $this->extend('templates/layout') ?>

<?= $this->section('title') ?>
<title>Produk - Add</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

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
            <form action="/produk/save" method="post">
                <?= csrf_field(); ?>
            
                <div class="form-group mb-4">
                    <label for="id_supplier">Supplier</label>
                    <select class="form-control" id="id_supplier" name="id_supplier" required>
                    <?php
                        foreach ($supplier as $s) { 
                        ?>
                        <option value="<?= $s['id_supplier']; ?>"><?= $s['nama']; ?></option>
                        <?php } ?>
                    </select> 
                </div>

                <div class="form-group mb-4">
                    <label>Kode Produk</label>
                    <input type="text" class="form-control" name="kode_produk" id="kode_produk" value="<?= old('kode_produk'); ?>" autofocus required>
                </div>

                <div class="form-group mb-4">
                    <label>Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="<?= old('nama_produk'); ?>" required>
                </div>

                <div class="form-group mb-4">
                    <label>Harga Pokok</label>
                    <div class="row g-3">
                        <div class="col-sm">
                            <input type="text" class="form-control" name="harga_pokok_sat" id="harga_pokok_sat" placeholder="satuan" value="<?= old('harga_pokok_sat'); ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                        </div>
                        <div class="col-sm">
                            <input type="text" class="form-control" name="harga_pokok_lsn" id="harga_pokok_lsn" placeholder="lusin/renteng/pak" value="<?= old('harga_pokok_lsn'); ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                        </div>
                        <div class="col-sm">
                            <input type="text" class="form-control" name="harga_pokok_krt" id="harga_pokok_krt" placeholder="karton" value="<?= old('harga_pokok_krt'); ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label>Harga Jual</label>
                    <div class="row g-3">
                        <div class="col-sm">
                            <input type="text" class="form-control" name="harga_jual_sat" id="harga_jual_sat" placeholder="satuan" value="<?= old('harga_jual_sat'); ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                        </div>
                        <div class="col-sm">
                            <input type="text" class="form-control" name="harga_jual_lsn" id="harga_jual_lsn" placeholder="lusin/renteng/pak" value="<?= old('harga_jual_lsn'); ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                        </div>
                        <div class="col-sm">
                            <input type="text" class="form-control" name="harga_jual_krt" id="harga_jual_krt" placeholder="karton" value="<?= old('harga_jual_krt'); ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label>Stok</label>
                    <div class="row g-3">
                        <div class="col-sm">
                            <input type="text" class="form-control" name="stok_sat" id="stok_sat" placeholder="satuan" value="<?= old('stok_sat'); ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                        </div>
                        <div class="col-sm">
                            <input type="text" class="form-control" name="stok_lsn" id="stok_lsn" placeholder="lusin/renteng/pak" value="<?= old('stok_lsn'); ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                        </div>
                        <div class="col-sm">
                            <input type="text" class="form-control" name="stok_krt" id="stok_krt" placeholder="karton" value="<?= old('stok_krt'); ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <a class="btn btn-secondary" href="<?= base_url('produk/index'); ?>">Close</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        
        </div>
<?= $this->endSection('content'); ?>