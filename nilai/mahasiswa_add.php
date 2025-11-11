<?php
include "../koneksi.php";

$NIM 				= $_POST["NIM"];
$Nama_Mahasiswa		= $_POST["Nama_Mahasiswa"];
$Tempat_Lahir 		= $_POST["Tempat_Lahir"];
$Tanggal_Lahir 		= $_POST["Tanggal_Lahir"];
$No_Telp 			= $_POST["No_Telp"];
$Alamat 			= $_POST["Alamat"];
$Kode_Kelas_Mhs 	= $_POST["Kode_Kelas_Mhs"];
$NIP_PA				= $_POST["NIP_PA"];
$Semester_Aktif		= $_POST["Semester_Aktif"];

if ($add = mysqli_query($konek, "INSERT INTO mahasiswa (NIM, Nama_Mahasiswa, Tempat_Lahir_Mhs, Tanggal_Lahir_Mhs, No_Telp_Mhs, Alamat_Mhs, Kode_Kelas_Mhs,NIP_PA, Semester_Aktif) VALUES 
	('$NIM', '$Nama_Mahasiswa', '$Tempat_Lahir', '$Tanggal_Lahir', '$No_Telp', '$Alamat', '$Kode_Kelas_Mhs','$NIP_PA', '$Semester_Aktif')")){
		header("Location: mahasiswa.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>