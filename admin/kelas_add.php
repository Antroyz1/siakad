<?php

include "../koneksi.php";

$Kode_Kelas 		= $_POST["Kode_Kelas"];
$Nama_Kelas			= $_POST["Nama_Kelas"];
$Kode_Angkatan_Kls	= $_POST["Kode_Angkatan_Kls"];
$Semester			= $_POST["Semester"];

if($add = mysqli_query($konek, "INSERT INTO kelas (Kode_Kelas, Nama_Kelas, Kode_Angkatan_Kls, Semester,khs_kelas_tampil) VALUES ('$Kode_Kelas', '$Nama_Kelas', '$Kode_Angkatan_Kls', '$Semester','0')")){
	header("Location: kelas.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>