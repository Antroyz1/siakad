<?php

include "../koneksi.php";

$Kehadiran=0;
$Tugas=0;
$UTS=0;

$Total = 0;
$UAS=0;

$Id_Nilai				= $_POST["Id_Nilai"];
$Kehadirana			= $_POST["Kehadiran"];
$Tugasa					= $_POST["Tugas"];
$UTSa					  = $_POST["UTS"];
$UASa   				= $_POST["UAS"];
$Nilai					= $_POST["Nilai"];
$Mutu					  = $_POST["Mutu"];

$Kehadiran = $Kehadirana*0.1;
$Tugas    =  $Tugasa*0.2;
$UTS       = $UTSa*0.3;
$UAS       = $UASa*0.4;
$Total     = $Kehadiran+$Tugas+$UTS+$UAS;
// if(isset($UTeka) && !isset($UTulisa)){
//     $UTek=$UTeka*0.4;
//     $UAS=$UTek;
//     $Total=$Kehadiran+$Tugas+$UTS+$UTek;
//   }elseif(isset($UTulisa) && !isset($UTeka)){
//     $UTulis=$UTulisa*0.4;
//     $UAS=$UTulis;
//     $Total=$Kehadiran+$Tugas+$UTS+$UTulis;
//   }
//   //&& == AND
//   if(isset($UTulisa) && isset($UTeka)){
//     $UTulis=$UTulisa*0.65;
//     $UTek=$UTeka*0.35;
//     $UAS=($UTulis + $UTek)*0.4;
//     $Total=$Kehadiran+$Tugas+$UTS+$UAS;
//   }
if($edit = mysqli_query($konek, "UPDATE nilai SET Kehadiran='$Kehadiran', Tugas='$Tugas', UTS='$UTS',  UAS='$UAS', Total='$Total', Nilai='$Nilai', Mutu='$Mutu' WHERE Id_Nilai='$Id_Nilai'")){
	header("Location: nilai.php");
	exit();
}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>