<?php

include "../koneksi.php";

$NIM				= $_POST["NIM"];
$Semester_Aktif 	= $_POST["Semester_Aktif"];
$SPP		 		= $_POST["SPP"];
$Tanggal_Lunas		= $_POST["Tanggal_Lunas"]
$Status				= $_POST["Status"];


if ($Status=="Lunas"){
	if($edit = mysqli_query($konek, "UPDATE mahasiswa SET Semester_Aktif='$Semester_Aktif', SPP='$SPP', Status_Bayar='$Status' WHERE NIM='$NIM'")){
		$add = mysqli_query($konek, "INSERT INTO lunas(NIM_Lunas, Semester_Lunas, SPP_Lunas,Tanggal_Lunas, Status_Lunas) VALUES ('$NIM', '$Semester_Aktif', '$SPP','$Tanggal_Lunas' ,'$Status')");
	header("Location: spp.php");
	exit();
}
} else {
	if($edit = mysqli_query($konek, "UPDATE mahasiswa SET Semester_Aktif='$Semester_Aktif', SPP='$SPP', Status_Bayar='Belum Lunas' WHERE NIM='$NIM'")){
	header("Location: spp.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));
}
?>