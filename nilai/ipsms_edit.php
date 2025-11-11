<?php

include "../koneksi.php";

$Id_kum					= $_POST["Id_kum"];
$Nim_kum_Mhs			= $_POST["NIM"];
$Semester				= $_POST["Semester"];
$SKS_kum				= $_POST["SKS_kum"];
$IP_Sem					= $_POST["IP_Sem"];
$Ipkkum					= $_POST["Ipkkum"];
$Sikap					= $_POST["Sikap"];


if($edit = mysqli_query($konek, "UPDATE ipkkumulatif SET Nim_kum_Mhs='$Nim_kum_Mhs', Semester='$Semester', SKS_kum='$SKS_kum', IP_Sem='$IP_Sem', IP_Kum='$Ipkkum', Sikap='$Sikap' WHERE Id_kum='$Id_kum'")){
	header("Location: ipsms.php");
	exit();
}
die("Terdapat Kesalahan : ". mysqli_error($konek));

?>