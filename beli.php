<?php
session_start();
$id_produk = $_GET['id'];
$keranjang[$id_produk] = 1;

if (isset($_SESSION['keranjang'][$id_produk])) 
{
	$_SESSION['keranjang'][$id_produk]+=1;
}
else
{
	$_SESSION['keranjang'][$id_produk] = 1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

echo "<script>alert('Produk Telah Ditambahkan ke Keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
?>