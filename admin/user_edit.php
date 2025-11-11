<?php
include "../koneksi.php";

$Id_User 			= $_POST["Id_User"];
$Username 			= $_POST["Username"];
$Password			= $_POST["Password"];
$Password_Hash		= password_hash($Password, PASSWORD_DEFAULT);


if ($edit = mysqli_query($konek, "UPDATE user SET Username='$Username', Password='$Password_Hash' WHERE Id_User='$Id_User'")){
		header("Location: user.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>