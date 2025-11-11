<?php

include "../koneksi.php";

$Id_Usergroup_User	= $_POST["Id_Usergroup_User"];
$Username			= $_POST["User_Mahasiswa"];
$Userdisplay		= $_POST["User_Mahasiswa"];
$Password			= $_POST["User_Mahasiswa"];
$Password_Hash		= password_hash($Password, PASSWORD_DEFAULT);

if($add = mysqli_query($konek, "INSERT INTO user (Id_Usergroup_User, Username, Userdisplay, Password) VALUES ('$Id_Usergroup_User', '$Username', '$Userdisplay', '$Password_Hash')")){
	header("Location: user.php");
	exit();
}
die ("Terdapat Kesalahan : ". mysqli_error($konek));

?>