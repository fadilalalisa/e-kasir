<?= $this->extend('templates/layout') ?>

<?= $this->section('title') ?>
<title>Supplier - List</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3>Data Supplier</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('message'))) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <a href="<?= base_url('supplier/add'); ?>" class="btn btn-primary"><i class="fa fa-plus">Tambah</i></a>
            <hr />
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Kode Supplier</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Action</th>
                </tr>
                <?php
                $no = 1;
                foreach ($supplier as $row) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['id_supplier'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['telepon'] ?></td>
                        <td>
                            <a href="/supplier/edit/<?= $row['id_supplier']; ?>"><i data-feather="edit-2" class="align-middle"></i></a>
                            <a href="/supplier/delete/<?= $row['id_supplier']; ?>" onclick="return confirm('Apakah Anda yakin?');"><i data-feather="trash" class="align-middle"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>


<?= $this->endSection('content'); ?>

<?= $this->section('contentScript') ?>
<!-- Script Content Page -->
<script>
  function hapus(id_supplier) {
    message = confirm('Yakin hapus data supplier?');

    if(message) {
      window.location.href = ("<?= base_url('supplier/delete') ?>");
    } else return false;
  }
</script>
<?= $this->endSection() ?>