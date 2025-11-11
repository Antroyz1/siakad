<?php

include "../koneksi.php";

$Id_penelitian		= $_POST["Id_penelitian"];
$NIDN_Peneliti 		= $_POST["NIDN_Peneliti"];
$Judul_Penelitian	= $_POST["Judul_Penelitian"];
$Tahun				= $_POST["Tahun"];

if($edit = mysqli_query($konek, "UPDATE penelitian SET NIDN_Peneliti='$NIDN_Peneliti', Judul_Penelitian='$Judul_Penelitian', Tahun='$Tahun' WHERE Id_penelitian='$Id_penelitian'")){
	header("Location: penelitian.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>