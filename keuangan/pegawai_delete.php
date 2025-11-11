<?php

include "../koneksi.php";

$Id_pegawai	= $_GET["Id_pegawai"];

if($delete = mysqli_query ($konek, "DELETE FROM pegawai WHERE Id_pegawai='$Id_pegawai'")){
	header("Location: pegawai.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>