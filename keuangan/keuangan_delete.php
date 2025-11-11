<?php

include "../koneksi.php";

$Id_bayar	= $_GET["Id_bayar"];

if($delete = mysqli_query ($konek, "DELETE FROM pembayaran WHERE Id_bayar='$Id_bayar'")){
	header("Location: keuangan.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>