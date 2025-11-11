<?php

include "../koneksi.php";


$no_inventaris		= $_POST["No_inventaris"];
$namaBarang			= $_POST["namaBarang"];
$Jumlah				= $_POST["Jumlah"];


if($add = mysqli_query($konek, "INSERT INTO sarpras(no_sarpras, namaBarang, jumlahBarang) VALUES ('$no_inventaris', '$namaBarang', '$Jumlah')")){
	header("Location: barang.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>