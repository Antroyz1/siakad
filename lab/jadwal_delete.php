<?php

include "../koneksi.php";

$Id_lab	= $_GET["Id_lab"];

if($delete = mysqli_query($konek, "DELETE FROM lab WHERE Id_lab='$Id_lab'")){
	header("Location: jadwal.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>