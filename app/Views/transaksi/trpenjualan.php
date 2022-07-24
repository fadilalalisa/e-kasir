<?= $this->extend('templates/layout') ?>

<?= $this->section('title') ?>
<title>Transaksi - Penjualan</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card">
       
        <div class="card-body">
        <h2>Transaksi Penjualan</h2>
        <div class="row">
            <div class="form-group col-md-6 mb-4">
                <label for="date" class="col-sm-2 col-form-label">Date</label>
                <input id="tanggal" value="<?=date('Y-m-d')?>" class="form-control">
            </div>
            <div class="form-group col-md-6 mb-4">
                <label for="user" class="col-sm-2 col-form-label">Kasir</label>
                <input type="text" id="nama" value="<?= auth('nama') ?>" class="form-control">
            </div>
        </div>

            <form id="#tambahproduk">
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
                    <label for="satuan">Satuan </label>
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
                <br>
                <a href="#" id="tambahproduk" class="btn btn-primary" role="button">
	                Tambah Produk
                </a>
                </div>
            </div>

            <br>
  
            </form>
            <table class="table table-stiped table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                    <th>Action</th>        
                </tr>
                <tbody id="tbody">

                </tbody>
                
            </table>

            <div class="row">
                    <div class="form-group mb-4">
                        <label for="harga">Total Belanja</label>
                        <input type="text" class="form-control" id="totalharga" name="tanggal" value=""/>
                    </div>
                    <div class="form-group col-md-6 mb-4">
                        <label for="subtotal">Bayar</label>
                        <input type="text" class="form-control" id="bayar" name="nama" value=""/>
                    </div>
                    <div class="form-group col-md-6 mb-4">
                        <label for="subtotal">Kembali</label>
                        <input type="text" class="form-control" id="kembali" name="nama" value=""/>
                    </div>
                </div>
                
                <a href="" class="btn btn-warning">Simpan & Cetak Struk</a>
                </div>
            </div>

        </div>
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

        var rowIdx = 0;
        var myarray = []; 
        var sum = 0;

        $('#tambahproduk').click(function(e){
            e.preventDefault();
            
                    var kode_produk = $('#kode_produk').val();
                    console.log(kode_produk);
                    var jumlah = $('#jumlah').val();
                    var satuan = $('#satuan').val();
                    var harga = $('#harga').val();
                    var subtotal = $('#subtotal').val();
                    
                    myarray.push(subtotal);
                    myarray = myarray.map(function (x) { 
                    return parseInt(x, 10); 
                    });
                    sum = myarray.reduce((partialSum, a) => partialSum + a, 0);
                    $('#totalharga').val(sum);
                    
                    $('#tbody').append(
                        `<tr id="R${++rowIdx}">
                            <td class="row-index text-center">
                                <p> ${rowIdx}</p>
                            </td>
                            <td class="row-index text-center">
                                <p> ${kode_produk}</p>
                            </td>
                            <td class="row-index text-center">
                                <p> ${jumlah}</p>
                            </td>
                            <td class="row-index text-center">
                                <p> ${satuan}</p>
                            </td>
                            <td class="row-index text-center">
                                <p> ${harga}</p>
                            </td>
                            <td class="row-index text-center">
                                <p> ${subtotal}</p>
                            </td>
                            
                            <td class="text-center">
                                <button class="btn btn-danger remove" type="button">Hapus</button>
                            </td>
                        </tr>`
                    );

            })

            $('#bayar').change(function(){
                var bayar = $('#bayar').val();
                var kembali = bayar-sum;

                if(kembali<0) {
                    alert('Uang Anda Kurang')
                } else {
                    $('#kembali').val(kembali);
                }
            });

        
</script>


<?= $this->endSection() ?>