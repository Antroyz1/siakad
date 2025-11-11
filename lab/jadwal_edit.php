<?php

include "../koneksi.php";

$NIDN_Lab				= $_POST["NIDN_Lab"];
$Kode_Kelas_Lab			= $_POST["Kode_Kelas_Lab"];
$Hari					= $_POST["Hari"];
$Jam_Mulai				= $_POST["Jam_Mulai"];
$Jam_Selesai			= $_POST["Jam_Selesai"];
$Jam					= $Jam_Mulai."-".$Jam_Selesai;

if($edit = mysqli_query($konek, "UPDATE lab SET  Kode_Kelas_Lab='$Kode_Kelas_Lab',NIP_Lab='$NIP_Lab', Hari='$Hari', Jam='$Jam' WHERE Id_lab='$Id_lab'")){
		header("Location: jadwal.php");
		exit();
	}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>