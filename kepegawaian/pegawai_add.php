<?php
include "../koneksi.php";

$NIP 			= $_POST["NIP"];
$Nama_Pegawai 	= $_POST["Nama_Pegawai"];
$Tempat_Lahir 	= $_POST["Tempat_Lahir"];
$Tanggal_Lahir 	= $_POST["Tanggal_Lahir"];
$JK 			= $_POST["JK"];
$Jabatan 		= $_POST["Jabatan"];
$No_Telp 		= $_POST["No_Telp"];
$Email			= $_POST["Email"];
$Pendidikan		= $_POST["Pendidikan"];

if ($add = mysqli_query($konek, "INSERT INTO pegawai (NIP, Nama_Pegawai, Tempat_Lahir, Tanggal_Lahir, JK, Email, No_Telp, Pendidikan, Jabatan) VALUES 
	('$NIP', '$Nama_Pegawai', '$Tempat_Lahir', '$Tanggal_Lahir', '$JK', '$Email', '$No_Telp', '$Pendidikan', '$Jabatan')")){
		header("Location: pegawai.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>