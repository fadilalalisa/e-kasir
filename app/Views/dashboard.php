<?= $this->extend('templates/layout') ?>

<?= $this->section('title') ?>
<title>Dashboard</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="header">
    <h1>Dashboard</h1>
</section>
<section class="content">
<div class="row">
    <div class="col-md-3 col-sm-12 mb-3">
        <div class="card">
            <div class="card-header bg-primary text-white">Date</div>
            <div class="card-body"><?=date('Y-m-d')?></div>
            <div class="card-footer">
                <a href="<?= base_url('detailpenjualan/index'); ?>">Transaksi Penjualan</a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12 mb-3">
        <div class="card">
            <div class="card-header bg-primary text-white">Kasir</div>
            <div class="card-body"><?= auth('nama') ?></div>
            <div class="card-footer">
                <a href="<?= base_url('laporan/index'); ?>">Profil</a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12 mb-3">
        <div class="card">
            <div class="card-header bg-primary text-white">Jumlah Produk</div>
            <div class="card-body">isi</div>
            <div class="card-footer">
                <a href="<?= base_url('produk/index'); ?>">Lihat Detail</a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12 mb-3">
        <div class="card">
            <div class="card-header bg-primary text-white">Jumlah Supplier</div>
            <div class="card-body">isi</div>
            <div class="card-footer">
                <a href="<?= base_url('supplier/index'); ?>">Lihat Detail</a>
            </div>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="harga">Masukkan Saldo Awal</label>
        <input type="text" class="form-control" id="saldoawal" name="saldoawal" value="<?= old('saldoawal'); ?>"/>
        <div class="form-group col-md-2">
            <label for="submit"></label>
            <input class="form-control btn btn-primary mb-3" type="submit" value="Simpan">
        </div>
    </div>
    <div class="col-md-6 col-sm-12 mb-3">
        <div class="card">
            <div class="card-header bg-primary text-white">Informasi Saldo Awal</div>
            <div class="card-body">isi</div>
            <div class="card-footer">
                <a href="<?= base_url('laporan/index'); ?>">Laporan Penjualan</a>
            </div>
        </div>
    </div>
</div>
</section
<?= $this->endSection() ?>