<?php
include "../koneksi.php";

$NIM_krs_Mhs				= $_POST["NIM_krs_Mhs"];
$Kode_Matakuliah_krs		= $_POST["Kode_Matakuliah_krs"];
$Semester_Ambil				= $_POST["Semester_Ambil"];
$SKS_krs				 	= $_POST["SKS_krs"];
$Status 					= $_POST["Status"];


if ($add = mysqli_query($konek, "INSERT INTO krs (NIM_krs_Mhs, Kode_Matakuliah_krs, Semester_Ambil, SKS_krs, Status) VALUES 
	('$NIM_krs_Mhs', '$Kode_Matakuliah_krs', '$Semester_Ambil', '$SKS_krs', '$Status')")){
		header("Location: krs.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>