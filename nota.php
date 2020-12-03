<?php
session_start();
include 'koneksi.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php'; ?>

<section class="konten">
	<div class="container">
		<h2>Data Pembelian</h2>

<?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan
	WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc()
?>



<p>
	Tanggal: <?php echo $detail['tanggal_pembelian'];?> <br>
	Total: <?php echo $detail['total_pembelian'];?>
</p>

<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
		Tanggal : <?php echo number_format($detail['total_pembelian']); ?><br>
		Total : Rp. <?php echo number_format($detail['total_pembelian']) ?>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong>
	<?php echo $detail['nama_pelanggan'];?>
</strong> <br>
		<p>
	<?php echo $detail['telepon_pelanggan'];?> <br>
	<?php echo $detail['email_pelanggan'];?>
</p>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong>
	<?php echo $detail['nama_kota'];?>
</strong> <br>
Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']); ?><br>
Alamat : <?php echo $detail['alamat_pengiriman'] ?>
	</div>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Berat</th>
			<th>Jumlah</th>
			<th>Subberat</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'");?>
		<?php while($pecah = $ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
			<td><?php echo $pecah['berat']; ?> Gr</td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td><?php echo $pecah['subberat'];?> Gr
			</td>
			<td>Rp. <?php echo number_format($pecah['subharga']);?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>

<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				Silahkan Melakukan Pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
				<strong>BANK BRI 111-223344-5566 AN. Bariq Pribadi</strong>
			</p>
		</div>
	</div>
</div>

	</div>
</section>

</body>
</html>