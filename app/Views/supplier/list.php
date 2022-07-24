<?= $this->extend('templates/layout') ?>

<?= $this->section('title') ?>
<title>Supplier - List</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1 class="h3 mb-3">Supplier</h1>

<div class="card">
  <div class="card-header">
    <h3 class="card-tittle">
      <button type="button" class="btn btn-sm btn-primary" onclick="window.location='<?=site_url('supplier/add')?>'">
        <i class="fa fa-plus"></i> Tambah Supplier
      </button>
    </h3>
    <!-- <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" tittle="Collapse">
        <i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" tittle="Remove">
        <i class="fa fa-times"></i>
      </button>
    </div> -->
  </div>
  <div class="card-body">
    <table class="table text-nowrap" id="tabel-supplier">
              <thead>
                <tr>
                  <th>Kode Supplier</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Actions</th>
                </tr>
              </thead>
      </table>
  </div>
</div>

<?= $this->endSection() ?>

