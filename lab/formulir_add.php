<?php

include "../koneksi.php";


$Judul			= $_POST["Judul"];
$Link			= $_POST["Link"];


if($add = mysqli_query($konek, "INSERT INTO formulir(Judul, Link) VALUES ('$Judul', '$Link')")){
	header("Location: formulir.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>