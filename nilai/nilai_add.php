<?php

include "../koneksi.php";

$Id_Nilai				= $_GET["Id_Nilai"];
$Kehadiran				= $_POST["Kehadiran"];
$Tugas					= $_POST["Tugas"];
$UTS					= $_POST["UTS"];
$UAS					= $_POST["UAS"];
$Nilai					= $_POST["Nilai"];
$Mutu					= $_POST["Mutu"];

if($add = mysqli_query($konek, "INSERT INTO nilai (Kehadiran, Tugas, UTS, UAS, Nilai) VALUES ('$Kehadiran', '$Tugas', '$UTS', '$UAS', '$Nilai') WHERE Id_Nilai='$Id_Nilai'")){
	header("Location: nilai.php");
	exit();
}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>