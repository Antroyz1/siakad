<?php

include "../koneksi.php";

$Semester				= $_POST["Semester"];
$Kode_Matakuliah_Jadwal	= $_POST["Kode_Matakuliah_Jadwal"];
$NIP_Jadwal				= $_POST["NIP_Jadwal"];
$Kode_Ruangan_Jadwal	= $_POST["Kode_Ruangan_Jadwal"];
$Kode_Kelas_Jadwal		= $_POST["Kode_Kelas_Jadwal"];
$Hari					= $_POST["Hari"];
$Jam_Mulai				= $_POST["Jam_Mulai"];
$Jam_Selesai			= $_POST["Jam_Selesai"];
$Jam					= $Jam_Mulai."-".$Jam_Selesai;

if($add = mysqli_query($konek, "INSERT INTO jadwal(Kode_Matakuliah_Jadwal, NIP_Jadwal, Kode_Ruangan_Jadwal, Kode_Kelas_Jadwal,Semester_Jadwal, Hari, Jam) VALUES ('$Kode_Matakuliah_Jadwal', '$NIP_Jadwal', '$Kode_Ruangan_Jadwal', '$Kode_Kelas_Jadwal','$Semester', '$Hari', '$Jam')")){
	header("Location: jadwal.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>