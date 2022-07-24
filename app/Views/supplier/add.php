<?= $this->extend('templates/layout') ?>

<?= $this->section('title') ?>
<title>Supplier - Add</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Data Supplier</h3> 
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
            <form method="post" action="<?= base_url('supplier/save') ?>">
                <?= csrf_field(); ?>
 
                <div class="form-group">
                    <label for="nama">Kode Supplier</label>
                    <input type="text" class="form-control" id="id_supplier" name="id_supplier" value="<?= old('id_supplier'); ?>">
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>">
                </div>
 
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat"><?= old('alamat') ?></textarea>
                </div>

                <div class="form-group">
                    <label for="no_telp">No Telp</label>
                    <input type="number" class="form-control" id="telepon" name="telepon" value="<?= old('telepon') ?>" />
                </div>
 
                <div class="form-group">
                    <input type="submit" value="Simpan" class="btn btn-info" />
                    <a href="<?= base_url('supplier/index'); ?>" class="btn btn-warning"><i class="fa fa-backward">Kembali</i></a>
                </div>
 
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>