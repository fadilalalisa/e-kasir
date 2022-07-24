<?= $this->extend('templates/layout') ?>

<?= $this->section('title') ?>
<title>Produk - List</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3>Data Produk</h3>
        </div>
        <div class="card-body">
            <?php if(session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <a href="<?= base_url('produk/add'); ?>" class="btn btn-primary"><i class="fa fa-plus">Tambah</i></a>
            <hr />
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Kode Produk</th>
                    <th>Nama</th>
                    <th>Harga Pokok</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
                <?php
                $no = 1;
                foreach ($produk_list as $produk) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $produk['nama']; ?></td>
                        <td><?= $produk['kode_produk']; ?></td>
                        <td><?= $produk['nama_produk']; ?></td>
                        <td>
                            Sat = <?=$produk['harga_pokok_sat'];?> <br>
                            Lsn/Pak/Rtg = <?=$produk['harga_pokok_lsn'];?> <br>
                            Krt = <?=$produk['harga_pokok_krt'];?>
                        </td>
                        <td>
                            Sat = <?= $produk['harga_jual_sat']; ?> <br>
                            Lsn/Pak/Krt = <?= $produk['harga_jual_lsn']; ?> <br>
                            Krt = <?= $produk['harga_jual_krt']; ?>
                        </td>
                        <td>
                            Sat = <?=$produk['stok_sat'];?> <br>
                            Lsn/Pak/Rtg = <?=$produk['stok_lsn'];?> <br>
                            Krt = <?=$produk['stok_krt'];?>
                        </td>
                        <td>
                            <a href="/produk/edit/<?= $produk['kode_produk']; ?>"><i data-feather="edit-2" class="align-middle"></i></a>
                            <a href="/produk/delete/<?= $produk['kode_produk']; ?>" onclick="return confirm('Apakah Anda yakin?');"><i data-feather="trash" class="align-middle"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <!-- <div class="clearfix">
									<div class="hint-text">Showing entries</div>
									<ul class="pagination">
										<li class="page-item disabled"><a href="#">Previous</a></li>
										<li class="page-item active"><a href="#" class="page-link">1</a></li>
										<li class="page-item"><a href="#" class="page-link">2</a></li>
										<li class="page-item"><a href="#" class="page-link">3</a></li>
										<li class="page-item"><a href="#" class="page-link">4</a></li>
										<li class="page-item"><a href="#" class="page-link">5</a></li>
										<li class="page-item"><a href="#" class="page-link">Next</a></li>
									</ul>
								</div> -->
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>