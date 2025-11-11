<?php
include "../koneksi.php";

$Id_User 			= $_POST["Id_User"];
$Username 			= $_POST["Username"];
$Password			= $_POST["Password"];
$Password_Hash		= password_hash($Password, PASSWORD_DEFAULT);
$Nama_Mahasiswa		= $_POST["Nama_Mahasiswa"];
$Tempat_Lahir		= $_POST["Tempat_Lahir"];
$Tanggal_Lahir		= $_POST["Tanggal_Lahir"];
$No_Telp			= $_POST["No_Telp"];
$Alamat				= $_POST["Alamat"];


if ($edit = mysqli_query($konek, "UPDATE user SET Username='$Username', Password='$Password_Hash' WHERE Id_User='$Id_User'")){
		if($editbio = mysqli_query($konek, "UPDATE mahasiswa SET Nama_Mahasiswa='$Nama_Mahasiswa', Tempat_Lahir_Mhs='$Tempat_Lahir', Tanggal_Lahir_Mhs='$Tanggal_Lahir', No_Telp_Mhs='$No_Telp', Alamat_Mhs='$Alamat' WHERE NIM='$Username'")){
		header("Location: index.php");
		exit();}
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>