<?php

include "../koneksi.php";

$Id_sarpras	= $_GET["Id_sarpras"];

if($delete = mysqli_query($konek, "DELETE FROM sarpras WHERE Id_sarpras='$Id_sarpras'")){
	header("Location: barang.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>