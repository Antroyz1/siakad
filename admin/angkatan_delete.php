<?php

include "../koneksi.php";

$Kode_Angkatan	= $_GET["Kode_Angkatan"];

if($delete = mysqli_query($konek, "DELETE FROM angkatan WHERE Kode_Angkatan='$Kode_Angkatan'")){
	header("Location: angkatan.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>