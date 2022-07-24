<?= $this->extend('templates/layout') ?>

<?= $this->section('title') ?>
<title>Supplier - Edit</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Data Supplier</h3> 
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
            <form action="/supplier/update/<?= $supplier['id_supplier']; ?>" method="post">
                <?= csrf_field(); ?>

                <div class="form-group mb-4">
                    <label for="nama">Kode Supplier</label>
                    <input type="text" class="form-control" id="id_supplier" name="id_supplier" value="<?= (old('id_supplier')) ? old('id_supplier') : $supplier['id_supplier']  ?>"  required>
                </div>

                <div class="form-group mb-4">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $supplier['nama']  ?>" required>
                </div>
 
                <div class="form-group mb-4">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?= (old('alamat')) ? old('alamat') : $supplier['alamat']  ?>" required/>
                </div>

                <div class="form-group mb-4">
                    <label for="no_telp">No Telp</label>
                    <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" id="telepon" name="telepon" value="<?= (old('telepon')) ? old('telepon') : $supplier['telepon']  ?>" />
                </div>
 
                <div class="form-group mb-4">
                    <a class="btn btn-secondary" href="<?= base_url('supplier/index'); ?>">Close</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>