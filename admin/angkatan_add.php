<?php

include "../koneksi.php";

$Kode_Angkatan	= $_POST["Kode_Angkatan"];
$Nama_Angkatan	= $_POST["Nama_Angkatan"];

if($add = mysqli_query($konek, "INSERT INTO angkatan(Kode_Angkatan, Nama_Angkatan) VALUES ('$Kode_Angkatan', '$Nama_Angkatan')")){
	header("Location: angkatan.php");
	exit();
}
die("Terdapat Kesalahan : ".mysqli_error($konek));

?>
