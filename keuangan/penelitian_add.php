<?php
include "../koneksi.php";

$NIP 				= $_POST["NIP"];
$Nama_Penelitian 	= $_POST["Nama_Penelitian"];
$Tahun 				= $_POST["Tahun"];

if ($add = mysqli_query($konek, "INSERT INTO penelitian (NIDN_Peneliti, Judul_Penelitian, Tahun) VALUES 
	('$NIP', '$Nama_Penelitian', '$Tahun')")){
		header("Location: penelitian.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>