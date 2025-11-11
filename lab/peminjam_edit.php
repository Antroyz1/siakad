<?php

include "../koneksi.php";

$Id_detail		= $_POST["Id_detail"];
$tgl_kembali		= $_POST["tgl_kembali"];

if($edit = mysqli_query($konek, "UPDATE detail_pinjam SET  tgl_kembali='$tgl_kembali' WHERE Id_detail='$Id_detail'")){
		header("Location: barang.php");
		exit();
	}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>