<?php
include "../koneksi.php";

$Id_pegawai		= $_POST["Id_pegawai"];
$NIP 			= $_POST["NIP"];
$Nama_Pegawai 	= $_POST["Nama_Pegawai"];
$Tempat_Lahir 	= $_POST["Tempat_Lahir"];
$Tanggal_Lahir 	= $_POST["Tanggal_Lahir"];
$JK 			= $_POST["JK"];
$Jabatan 		= $_POST["Jabatan"];
$No_Telp 		= $_POST["No_Telp"];
$Email			= $_POST["Email"];
$Pendidikan		= $_POST["Pendidikan"];


if ($edit = mysqli_query($konek, "UPDATE pegawai SET NIP='$NIP', Nama_Pegawai='$Nama_Pegawai', Tempat_Lahir='$Tempat_Lahir', Tanggal_Lahir='$Tanggal_Lahir', JK='$JK', Jabatan='$Jabatan', No_Telp='$No_Telp', Email='$Email', Pendidikan='$Pendidikan' WHERE Id_pegawai='$Id_pegawai'")){
		header("Location: pegawai.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>