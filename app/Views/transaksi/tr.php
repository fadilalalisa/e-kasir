<input type="hidden" name="id_penjualan" value="{{ $id_penjualan }}">
                            <input type="hidden" name="total" id="total">
                            <input type="hidden" name="total_item" id="total_item">
                            <input type="hidden" name="bayar" id="bayar">
                            <input type="hidden" name="id_member" id="id_member" value="{{ $memberSelected->id_member }}">

                            <div class="form-group row">
                                <label for="totalrp" class="col-lg-2 control-label">Total</label>
                                <div class="col-lg-8">
                                    <input type="text" id="totalrp" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_member" class="col-lg-2 control-label">Member</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="kode_member" value="{{ $memberSelected->kode_member }}">
                                        <span class="input-group-btn">
                                            <button onclick="tampilMember()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="diskon" class="col-lg-2 control-label">Diskon</label>
                                <div class="col-lg-8">
                                    <input type="number" name="diskon" id="diskon" class="form-control" 
                                        value="{{ ! empty($memberSelected->id_member) ? $diskon : 0 }}" 
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bayar" class="col-lg-2 control-label">Bayar</label>
                                <div class="col-lg-8">
                                    <input type="text" id="bayarrp" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="diterima" class="col-lg-2 control-label">Diterima</label>
                                <div class="col-lg-8">
                                    <input type="number" id="diterima" class="form-control" name="diterima" value="{{ $penjualan->diterima ?? 0 }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kembali" class="col-lg-2 control-label">Kembali</label>
                                <div class="col-lg-8">
                                    <input type="text" id="kembali" name="kembali" class="form-control" value="0" readonly>
                                </div>
                            </div>
                        </form>
                        <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sm btn-flat pull-right btn-simpan"><i class="fa fa-floppy-o"></i> Simpan Transaksi</button>
            </div>

            <?= $this->extend('templates/layout') ?>

<?= $this->section('title') ?>
<title>Transaksi - Penjualan</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="card">
        <div class="card-header">
            <h3>Transaksi Penjualan</h3>
            <br>
            <h5>Kasir : <?= auth('nama') ?></h5>
            <h5>Tanggal : <?= date("Y-d-m"); ?></h5>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url('detailpenjualan/add') ?>" action = "Get">
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="produk">Pilih produk</label>
                    <input class="form-control" list="produk"/>
                    <datalist id="produk">
                    <?php
                        foreach ($produk as $p) { 
                        ?>
                        <option value="<?= $p['kode_produk']; ?>"><?= $p['nama_produk']; ?></option>
                        <?php } ?>
                    </datalist> 
                </div>
                <div class="form-group col-md-2">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= old('jumlah'); ?>"/>
                </div>
                <div class="form-group col-md-2">
                    <label for="satuan">Satuan: </label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>pilih</option>
                        <option value="<?= old('satuan'); ?>">Pcs</option>
                        <option value="<?= old('satuan'); ?>">Rtg/Lsn/Pak</option>
                        <option value="<?= old('satuan'); ?>">Krt</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="submit"></label>
                    <input class="form-control btn btn-primary mb-3" type="submit" value="Tambah Produk">
                </div>
            </div>
  
            </form>
            <table class="table table-stiped table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Satuan</th>
                    <th>Subtotal</th>
                    <th>Action</th>        
                </tr>
                <?php
                $no = 1;
                foreach ($detailpenjualan as $row) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_produk'] ?></td>
                    <td><?= $row['jumlah'] ?></td>
                    <td><?= $row['harga'] ?></td>
                    <td><?= $row['satuan'] ?></td>
                    <td><?= $row['subtotal'] ?></td>
                    <td>
                        <a href="/detailpenjualan/edit/<?= $row['id_detail_penjualan']; ?>"><i data-feather="edit-2" class="align-middle"></i></a>
                        <a href="/detailpenjualan/delete/<?= $row['id_supplier_penjualan']; ?>" onclick="return confirm('Apakah Anda yakin?');"><i data-feather="trash" class="align-middle"></i></a>
                    </td>
                </tr>
                <?php
                    }
                ?>
                
            </table>

        </div>
    </div>


<?= $this->endSection() ?>