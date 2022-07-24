<?= $this->extend('templates/layout') ?>

<?= $this->section('title') ?>
<title>Penjualan - List</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php 
    $bulan_tes =array(
        '01'=>"Januari",
        '02'=>"Februari",
        '03'=>"Maret",
        '04'=>"April",
        '05'=>"Mei",
        '06'=>"Juni",
        '07'=>"Juli",
        '08'=>"Agustus",
        '09'=>"September",
        '10'=>"Oktober",
        '11'=>"November",
        '12'=>"Desember"
    );
?>

<div class="card">
    <!-- <div class="card-header">
        <h1>Transaksi Penjualan</h1>
    </div> -->
    <div class="card-body">

<div class="row">
    <div class="col-lg-12 main-chart">
		<h1>
			<?php if(!empty($_GET['cari'])){ ?>
				Data Laporan Penjualan <?= $bulan_tes[$_POST['bln']];?> <?= $_POST['thn'];?>
			<?php }elseif(!empty($_GET['hari'])){?>
				Data Laporan Penjualan <?= $_POST['hari'];?>
			<?php }else{?>
				Data Laporan Penjualan <?= $bulan_tes[date('m')];?> <?= date('Y');?>
			<?php }?>
		</h1>
		<br/>
		<h4>Cari Laporan Per Bulan</h4>
			<form method="post" action="index.php?page=laporan&cari=ok">
				<table class="table table-striped">
					<tr>
						<th>
							Pilih Bulan
						</th>
						<th>
							Pilih Tahun
						</th>
						<th>
						    Aksi
						</th>
					</tr>
					<tr>
						<td>
		    				<select name="bln" class="form-control">
								<option selected="selected">Bulan</option>
								<?php
									$bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
									$jlh_bln=count($bulan);
									$bln1 = array('01','02','03','04','05','06','07','08','09','10','11','12');
									$no=1;
									for($c=0; $c<$jlh_bln; $c+=1){
										echo"<option value='$bln1[$c]'> $bulan[$c] </option>";
									$no++;}
								?>
							</select>
						</td>
						<td>
							<?php
								$now=date('Y');
								echo "<select name='thn' class='form-control'>";
								echo '
								<option selected="selected">Tahun</option>';
								for ($a=2017;$a<=$now;$a++)
								{
									echo "<option value='$a'>$a</option>";
								}
								echo "</select>";
							?>
						</td>
						<td>
							<input type="hidden" name="periode" value="ya">
									<button class="btn btn-primary">
										<i class="fa fa-search"></i> Cari
									</button>
									<a href="index.php?page=laporan" class="btn btn-success">
										<i class="fa fa-refresh"></i> Refresh</a>
										
									<?php if(!empty($_GET['cari'])){?>
										<a href="excel.php?cari=yes&bln=<?=$_POST['bln'];?>&thn=<?=$_POST['thn'];?>" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }else{?>
										<a href="excel.php" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }?>
								</td>
								</tr>
							</table>
						</form>
						<form method="post" action="index.php?page=laporan&hari=cek">
							<table class="table table-striped">
								<tr>
									<th>
										Pilih Hari
									</th>
									<th>
										Aksi
									</th>
								</tr>
								<tr>
								<td>
									<input type="date" value="<?= date('Y-m-d');?>" class="form-control" name="hari">
								</td>
								<td>
									<input type="hidden" name="periode" value="ya">
									<button class="btn btn-primary">
										<i class="fa fa-search"></i> Cari
									</button>
									<a href="index.php?page=laporan" class="btn btn-success">
										<i class="fa fa-refresh"></i> Refresh</a>
										
									<?php if(!empty($_GET['hari'])){?>
										<a href="excel.php?hari=cek&tgl=<?= $_POST['hari'];?>" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }else{?>
										<a href="excel.php" class="btn btn-info"><i class="fa fa-download"></i>
										Excel</a>
									<?php }?>
								</td>
								</tr>
							</table>
						</form>
						<div class="clearfix" style="border-top:1px solid #ccc;"></div>
<?= $this->endSection() ?>