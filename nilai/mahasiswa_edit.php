<?php

include "../koneksi.php";

$NIM 				= $_POST["NIM"];
$Nama_Mahasiswa		= $_POST["Nama_Mahasiswa"];
$Semester_Aktif		= $_POST["Semester_Aktif"];
$khs_tampil			= $_POST["khs_tampil"];
$no_skpi			= $_POST["no_skpi"];
$no_ijazah			= $_POST["no_ijazah"];

if($edit = mysqli_query($konek, "UPDATE mahasiswa SET Nama_Mahasiswa='$Nama_Mahasiswa', Semester_Aktif='$Semester_Aktif', khs_tampil='$khs_tampil', no_skpi='$no_skpi', no_ijazah='$no_ijazah' WHERE NIM='$NIM'")){
		header("Location: mahasiswa.php");
		exit();
	}
die("Terdapat Kesalahan : ".mysqli_error($konek));

?>