<?php

include "../koneksi.php";

$Id_unduh	= $_GET["Id_unduh"];

if($delete = mysqli_query($konek, "DELETE FROM formulir WHERE Id_unduh='$Id_unduh'")){
	header("Location: formulir.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>