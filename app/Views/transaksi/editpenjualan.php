<?= $this->extend('templates/layout') ?>

<?= $this->section('title') ?>
<title>Transaksi - Penjualan</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
        <div class="card-header">
            <h1>Transaksi Penjualan</h1>
        </div>
        <div class="card-body">
            <div class="from-group row mb-2">
                <label for="date" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10 col-md-2">
                        <input id="tanggal" value="<?=date('Y-m-d')?>" class="form-control">
                    </div>
            </div>
            <div class="from-group row mb-5">
                <label for="user" class="col-sm-2 col-form-label">Kasir</label>
                    <div class="col-sm-10 col-md-2">
                        <input type="text" id="nama" value="<?= auth('nama') ?>" class="form-control">
                    </div>
            </div>

            <form action="<?php echo base_url('detailpenjualan/add') ?>" action = "Get">
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="kode_produk">Pilih produk</label>
                    <select class="form-control" id="kode_produk" name="kode_produk" required>
                    <?php
                        foreach ($produk as $p) { 
                        ?>
                        <option value="<?= $p['kode_produk']; ?>"><?= $p['nama_produk']; ?></option>
                        <?php } ?>
                    </select> 
                </div>
                <div class="form-group col-md-2">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= old('jumlah'); ?>"/>
                </div>
                <div class="form-group col-md-2">
                    <label for="satuan">Satuan: </label>
                    <select class="form-select" name="satuan" id="satuan">
                        <option selected>pilih</option>
                        <option value="sat">Pcs</option>
                        <option value="lsn">Rtg/Lsn/Pak</option>
                        <option value="krt">Krt</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= old('harga'); ?>"/>
                </div>
                <div class="form-group col-md-2">
                    <label for="subtotal">Subtotal</label>
                    <input type="text" class="form-control" id="subtotal" name="subtotal" value="<?= old('subtotal'); ?>"/>
                </div>
                <div class="form-group col-md-2">
                    <label for="submit"></label>
                    <input class="form-control btn btn-primary mb-3" type="submit" value="Tambah Produk">
                </div>
            </div>

            <script>
        function generate(){
            var kode_produk = $('#kode_produk').val();
            var satuan = $('#satuan').val();
            console.log(kode_produk);
            console.log(satuan);

            if(kode_produk=='' || satuan=='') {
                alert('pilih produk dahulu');

            } else {
                $.ajax({
                url : '<?= base_url('getdetailproduk'); ?>',
                type: 'POST',
                data: {"kode_produk":kode_produk, "satuan":satuan},
                success: function(data){
                    var hasil = JSON.parse(data);
                    var subtotal = hasil.harga * $('#jumlah').val(); 
                    $('#harga').val(hasil.harga);
                    $('#subtotal').val(subtotal);

                },
                error: function(err){
                    alert(err);
                }
            });

            }

        }
        $("#satuan").change(function(){
           generate();
           
        });
        $("#jumlah").change(function(){
           
            generate();
        });


</script>


<?= $this->endSection() ?>