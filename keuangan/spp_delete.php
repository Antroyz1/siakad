<?php

include "../koneksi.php";

$NIM	= $_GET["NIM"];

if($delete = mysqli_query ($konek, "DELETE FROM mahasiswa WHERE NIM='$NIM'")){
	header("Location: spp.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>