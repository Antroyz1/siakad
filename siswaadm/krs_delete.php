<?php

include "../koneksi.php";

$Id_krs	= $_GET["Id_krs"];

if($delete = mysqli_query($konek, "DELETE FROM krs WHERE Id_krs='$Id_krs'")){
	$hapus = mysqli_query($konek, "DELETE FROM nilai WHERE Id_Nilai_krs='$Id_krs'");
	header("Location: krs.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>