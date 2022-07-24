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
            <a href="<?= base_url('supplier/add'); ?>" class="btn btn-primary">Tambah</a>
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
                foreach ($supplier_list as $row) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['id_supplier']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['alamat']; ?></td>
                        <td><?= $row['telepon']; ?></td>
                        <td>
                            <a href="/supplier/edit_supplier<?= $row['id_supplier'] ?>"><i data-feather="edit-2" class="align-middle"></i></a>
                            <a href="/supplier/delete_supplier"><i data-feather="trash" class="align-middle"></i></a>
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
  document.addEventListener("DOMContentLoaded", function() {
    var datatablesButtons = $("#tabel-produk").DataTable({
      lengthChange: !1,
      buttons: ["print"]
    });
    datatablesButtons.buttons().container().appendTo("#tabel-produk_wrapper .col-md-6:eq(0)");
    document.getElementById("tabel-produk_wrapper").classList.add("p-1");
  });
</script>
<?= $this->endSection() ?>
<td><?= $no++; ?></td>
                        <td><?= $row->id_supplier ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->alamat ?></td>
                        <td><?= $row->telepon ?></td>
                        <td>

                        <button type="button" onclick="window.location='<?php echo base_url('supplier/edit') ?>'" data-feather="edit-2" class="align-middle">
                            <button type="button" onclick="hapus('<?= $row->id_supplier ?>')" data-feather="trash" class="align-middle">

                            <script>
  function hapus(id_supplier) {
    message = confirm('Yakin hapus data supplier?');

    if(message) {
      window.location.href = ("<?= base_url('supplier/delete') ?>");
    } else return false;
  }
</script>