<?php
include "../koneksi.php";

$NIP 			= $_POST["NIP"];
$Nama_Pegawai 	= $_POST["Nama_Pegawai"];
$Tempat_Lahir 	= $_POST["Tempat_Lahir"];
$Tanggal_Lahir 	= $_POST["Tanggal_Lahir"];
$JK 			= $_POST["JK"];
$No_Telp 		= $_POST["No_Telp"];
$Email			= $_POST["Email"];
$Pendidikan		= $_POST["Pendidikan"];

if ($edit = mysqli_query($konek, "UPDATE pegawai SET Nama_Pegawai='$Nama_Pegawai', Tempat_Lahir='$Tempat_Lahir', Tanggal_Lahir='$Tanggal_Lahir', JK='$JK', No_Telp='$No_Telp', Email='$Email', Pendidikan='$Pendidikan' WHERE NIP='$NIP'")){
		header("Location: dosen.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>