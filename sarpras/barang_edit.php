<?php

include "../koneksi.php";

$no_inventaris		= $_POST["no_inventaris"];
$namaBarang		= $_POST["namaBarang"];
$Jumlah				= $_POST["Jumlah"];

if($edit = mysqli_query($konek, "UPDATE sarpras SET  no_sarpras='$no_inventaris',namaBarang='$namaBarang', jumlahBarang='$Jumlah'WHERE Id_sarpras='$Id_sarpras'")){
		header("Location: barang.php");
		exit();
	}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>