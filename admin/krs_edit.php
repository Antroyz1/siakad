<?php

include "../koneksi.php";

$Id_krs						= $_POST["Id_krs"];
$NIM_krs_Mhs				= $_POST["NIM_krs_Mhs"];
$Kode_Matakuliah_krs		= $_POST["Kode_Matakuliah_krs"];
$Semester_Ambil				= $_POST["Semester_Ambil"];
$SKS_krs				 	= $_POST["SKS_krs"];
$Status 					= $_POST["Status"];

if($edit = mysqli_query($konek, "UPDATE krs SET NIM_krs_Mhs='$NIM_krs_Mhs', $Kode_Matakuliah_krs='$$Kode_Matakuliah_krs', Semester_Ambil='$Semester_Ambil',
	SKS_krs='$SKS_krs', Status='$Status' WHERE Id_krs='$Id_krs'")){
		header("Location: krs.php");
		exit();
	}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>