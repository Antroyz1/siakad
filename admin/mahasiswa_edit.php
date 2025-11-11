<?php

include "../koneksi.php";

$NIM 				= $_POST["NIM"];
$Nama_Mahasiswa		= $_POST["Nama_Mahasiswa"];
$Tempat_Lahir		= $_POST["Tempat_Lahir"];
$Tanggal_Lahir		= $_POST["Tanggal_Lahir"];
$No_Telp			= $_POST["No_Telp"];
$Alamat				= $_POST["Alamat"];
$Kode_Kelas_Mhs		= $_POST["Kode_Kelas_Mhs"];
$NIP_PA				= $_POST["NIP_PA"];
$Semester_Aktif		= $_POST["Semester_Aktif"];

if($edit = mysqli_query($konek, "UPDATE mahasiswa SET Nama_Mahasiswa='$Nama_Mahasiswa', Tempat_Lahir_Mhs='$Tempat_Lahir', Tanggal_Lahir_Mhs='$Tanggal_Lahir', No_Telp_Mhs='$No_Telp', Alamat_Mhs='$Alamat', Kode_Kelas_Mhs='$Kode_Kelas_Mhs',NIP_PA='$NIP_PA', Semester_Aktif='$Semester_Aktif' WHERE NIM='$NIM'")){
		header("Location: mahasiswa.php");
		exit();
	}
die("Terdapat Kesalahan : ".mysqli_error($konek));

?>