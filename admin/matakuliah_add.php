<?php

include "../koneksi.php";

$Kode_Matakuliah	= $_POST["Kode_Matakuliah"];
$Nama_Matakuliah	= $_POST["Nama_Matakuliah"];
$Kode_jurus			= $_POST["Kode_jurusan"];
$Sifat				= $_POST["Sifat"];
$Semester			= $_POST["Semester"];
$SKS				= $_POST["SKS"];

if($add = mysqli_query($konek,"INSERT INTO matakuliah (Kode_Matakuliah, Nama_Matakuliah, Sifat, Semester_Matakuliah, SKS, Kode_Jurusan_Matkul) VALUES ('$Kode_Matakuliah', '$Nama_Matakuliah', '$Sifat', '$Semester', '$SKS', '$Kode_jurus')")){
	header("Location: matakuliah.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>