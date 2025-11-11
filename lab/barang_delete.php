<?php

include "../koneksi.php";

$Id_barang	= $_GET["Id_barang"];

if($delete = mysqli_query($konek, "DELETE FROM baranglab WHERE Id_barang='$Id_barang'")){
	header("Location: barang.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>