<?php

include "../koneksi.php";

$NIDN	= $_GET["NIDN"];

if($delete = mysqli_query ($konek, "DELETE FROM dosen WHERE NIDN='$NIDN'")){
	header("Location: dosen.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>