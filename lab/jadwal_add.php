<?php

include "../koneksi.php";


$NIDN_Lab				= $_POST["NIDN_Lab"];
$Nama_Kelompok			= $_POST["Nama_Kelompok"];
$Kode_Ruangan_Lab		= $_POST["Kode_Ruangan_Lab"];
$Perasat				= $_POST["Perasat"];
$Hari					= $_POST["Hari"];
$Tanggal_Lahir			= $_POST["Tanggal_Lahir"];
$Jam_Mulai				= $_POST["Jam_Mulai"];
$Jam_Selesai			= $_POST["Jam_Selesai"];
$Jam					= $Jam_Mulai."-".$Jam_Selesai;


if($add = mysqli_query($konek, "INSERT INTO lab (NIDN_Lab, Nama_Kelompok, Kode_Ruangan_Lab, Perasat, Hari, Tanggal_Jadwal, Jam) VALUES 
	('$NIDN_Lab', '$Nama_Kelompok', '$Kode_Ruangan_Lab','$Perasat', '$Hari','$Tanggal_Lahir','$Jam')")){
	header("Location: jadwal.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>