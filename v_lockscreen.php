<?php
session_start();
include "../siakad/koneksi.php";

$Username = $_SESSION["Username"];
$Password = $_POST["Password"];

$query = mysqli_query ($konek, "SELECT * FROM user WHERE Username='$Username' AND Password='$Password'");

// Validasi Login
if ($_POST){
	
	$queryuser = mysqli_query ($konek, "SELECT * FROM user WHERE Username='$Username'");
		
	$user = mysqli_fetch_array ($queryuser);
	
	if($user){
			if (password_verify($Password, $user["Password"])){
				
				$_SESSION["Username"] 		= $user["Username"];
				$_SESSION["Password"] 		= $user["Password"];
				$_SESSION["Id_Usergroup"] 	= $user["Id_Usergroup"];
				$_SESSION["Userdisplay"]	= $user["Userdisplay"];
				$_SESSION["Id_User"] 		= $user["Id_User"];
				$_SESSION["Foto"]			= $user["Foto"];
				$_SESSION["Login"] 			= true;
				
				if ($_SESSION["Id_Usergroup"] == 1){
					header ("Location: admin/index.php");
					exit();
				}
				else if($_SESSION["Id_Usergroup"] == 2){
					header ("Location: nilai/index.php");
					exit();
				}
				else if($_SESSION["Id_Usergroup"] == 3){
					header ("Location: siswi/index.php");
					exit();
				}
				else if($_SESSION["Id_Usergroup"] == 4){
					header ("Location: dosen/index.php");
					exit();
				}
				else{
					header("Location :pagenotfound.php");
					exit();
				}
			}
			else
			{
				header ("Location: changepassword.php?Err=4");
				exit();
			}
	}
	else if (empty ($Username) && empty ($Password)){
		header ("Location: changepassword.php?Err=1");
		exit();
	}
	else if(empty ($Username)){
		header ("Location: changepassword.php?Err=2");
		exit();
	}
	else if(empty ($Password)){
		header ("Location: changepassword.php?Err=3");
		exit();
	}
	else{
		header ("Location: changepassword.php?Err=5");
		exit();
	}
}
	
?>