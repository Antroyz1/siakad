<?php

include "../koneksi.php";

$no_inventaris		= $_POST["no_inventaris"];
$nama_barang		= $_POST["nama_barang"];
$Jumlah				= $_POST["Jumlah"];

if($edit = mysqli_query($konek, "UPDATE baranglab SET  no_inventaris='$no_inventaris',nama_barang='$nama_barang', jumlah_barang='$Jumlah'WHERE Id_barang='$Id_barang'")){
		header("Location: barang.php");
		exit();
	}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>