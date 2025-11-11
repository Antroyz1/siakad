<?php

include "../koneksi.php";


$Id_barang			= $_POST["Id_barang"];
$Kode_matkulpinjam	= $_POST["Kode_matkulpinjam"];
$Jumlah				= $_POST["Jumlah"];
$NIM_peminjam 		= $_POST["NIM_pinjam"];
$tgl_pinjam			= $_POST["tgl_pinjam"];
$tgl_kembali		= $_POST["tgl_kembali"];


if($add = mysqli_query($konek, "INSERT INTO detail_pinjam(Id_barang_pinjam, jumlah_barang_pinjam, NIM_peminjam, Kode_matkulPinjam, tgl_pinjam, tgl_kembali) VALUES 
	('$Id_barang', '$Jumlah','$NIM_peminjam', '$Kode_matkulpinjam', '$tgl_pinjam', '$tgl_kembali')")){
	header("Location: peminjam.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>