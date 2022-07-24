<?= $this->extend('templates/layout') ?>

<?= $this->section('title') ?>
<title>transaksi - Bayar</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Pembayaran Produk</h3>
        </div>
        <div class="card-body">
            <form action="/penjualan/save" method="post">
                <?= csrf_field(); ?>

                <div class="row">
                    <div class="form-group col-md-6 mb-4">
                        <label for="harga">Tanggal</label>
                        <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>"/>
                    </div>
                    <div class="form-group col-md-6 mb-4">
                        <label for="subtotal">Kasir</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>"/>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label>Total</label>
                    <input type="text" class="form-control" name="total" id="total" value="<?= old('total'); ?>" required>
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