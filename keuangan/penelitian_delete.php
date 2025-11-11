<?php

include "../koneksi.php";

$Id_penelitian	= $_GET["Id_penelitian"];

if($delete = mysqli_query ($konek, "DELETE FROM penelitian WHERE Id_penelitian='$Id_penelitian'")){
	header("Location: penelitian.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>