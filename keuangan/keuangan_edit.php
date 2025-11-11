<?php

include "../koneksi.php";

$Id_Lunas				= $_POST["Id_Lunas"];
$NIM_Lunas				= $_POST["NIM_Lunas"];
$Semester_Lunas 	    = $_POST["Semester_Lunas"];
$Angsuran1		 		= $_POST["Angsuran1"];
$Tanggal_Angsuran		= $_POST["Tanggal_Angsuran"];
$Angsuran2				= $_POST["Angsuran2"];
$Tanggal_Lunas			= $_POST["Tanggal_Lunas"];
$Total					= $_POST["Total"];
$Status					= $_POST["Status"];
// $a 						= $_POST["SPP_Lunas"] - $_POST["Jmlh_Bayar"];
$a = $SPP_Lunas - $Jmlh_Bayar;

if ($edit = mysqli_query($konek, "UPDATE lunas SET NIM_Lunas='$NIM_Lunas', Semester_Lunas='$Semester_Lunas', Angsuran1='$Angsuran1', Tanggal_Angsuran='$Tanggal_Angsuran',Angsuran2='$Angsuran2', Tanggal_Lunas='$Tanggal_Lunas',Total='$Total', Status_Lunas='$Status' WHERE Id_Lunas='$Id_Lunas'")) {
	header("Location: keuangan.php");
		exit();
}
die("Terdapat Kesalahan : ".mysqli_error($konek));

// if ($Status == "Angsuran 1"){
	
	
// 	if ($ubah = mysqli_query($konek, "INSERT INTO lunas(NIM_Lunas, Semester_Lunas, SPP_Lunas, Jml_Bayar, Tanggal_Lunas, Status_Lunas) VALUES 
// 		('$NIM_Lunas', '$Semester_Lunas','$a','0','', 'Belum Lunas'), ('$NIM_Lunas', '$Semester_Lunas','$SPP_Lunas','$Jmlh_Bayar','$Tanggal_Lunas', '$Status') as new ON DUPLICATE KEY UPDATE 
// 		Jml_Bayar = '$Jmlh_Bayar',
// 		Tanggal_Lunas = '$Tanggal_Lunas',
// 		Status_Lunas = '$Status'")){
//  		header("Location: keuangan.php");
// 		exit();
//  	}
//  	die("Terdapat Kesalahan: ".mysqli_error($konek));
// } else {
// 	 if ($ubah = mysqli_query($konek, "UPDATE lunas SET NIM_Lunas='$NIM_Lunas', Semester_Lunas='$Semester_Lunas', SPP_Lunas='$SPP_Lunas', Jml_bayar='$Jmlh_Bayar', Tanggal_Lunas='$Tanggal_Lunas', Status_Lunas='$Status' WHERE Id_Lunas='$Id_Lunas'")) {
//  	header("Location: keuangan.php");
//  		exit();
//  }
//  die("Terdapat Kesalahan : ".mysqli_error($konek));
// }
?>