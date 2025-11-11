<?php
include "../koneksi.php";

$NIM_Lunas 	 = $_POST["NIM_Lunas"];
$Semester_Lunas = $_POST["Semester_Lunas"];
$SPP_Lunas		 = $_POST["SPP_Lunas"];
$Status_Lunas				 = $_POST["Status_Lunas"];

if ($add = mysqli_query($konek, "INSERT INTO pembayaran (NIM_Lunas, Semester_Lunas, SPP_Lunas, Status_Lunas) VALUES 
	('$NIM_Lunas','$Semester_Lunas', '$SPP_Lunas', '$Status_Lunas')")){
	header("Location: keuangan.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>