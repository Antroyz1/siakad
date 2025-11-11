<?php

include "../koneksi.php";

$Kode_Kelas			= $_POST["Kode_Kelas"];
$Nama_Kelas			= $_POST["Nama_Kelas"];
$Kode_Angkatan_Kls	= $_POST["Kode_Angkatan_Kls"];
$Semester			= $_POST["Semester"];
$khs_kelas_tampil	= $_POST["khs_kelas_tampil"];

if($edit = mysqli_query($konek, "UPDATE kelas SET Nama_Kelas='$Nama_Kelas', Kode_Angkatan_Kls='$Kode_Angkatan_Kls', Semester='$Semester', khs_kelas_tampil='$khs_kelas_tampil' WHERE Kode_Kelas='$Kode_Kelas'")){
	$mhs = mysqli_query($konek, "UPDATE mahasiswa SET Semester_Aktif='$Semester', khs_tampil='$khs_kelas_tampil' WHERE Kode_Kelas_Mhs='$Kode_Kelas'");
	header("Location: kelas.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>