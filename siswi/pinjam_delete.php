<?php

include "../koneksi.php";

$Id_detail	= $_GET["Id_detail"];

if($delete = mysqli_query($konek, "DELETE FROM detail_pinjam WHERE Id_detail='$Id_detail'")){
	header("Location: pinjam.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>