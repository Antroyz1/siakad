<?php
session_start();
include "../siakad/koneksi.php";

$Username = $_POST["Username"];
$Password = $_POST["Password"];

$query = mysqli_query ($konek, "SELECT * FROM user WHERE Username='$Username' AND Password='$Password'");

// Validasi Login
if ($_POST){
	
	$queryuser = mysqli_query ($konek, "SELECT * FROM user WHERE Username='$Username'");
		
	$user = mysqli_fetch_array ($queryuser);
	
	if($user){
			if (password_verify($Password, $user["Password"])){
				
				$_SESSION["Username"] 			= $user["Username"];
				$_SESSION["Password"] 			= $user["Password"];
				$_SESSION["Id_Usergroup_User"] 	= $user["Id_Usergroup_User"];
				$_SESSION["Userdisplay"]		= $user["Userdisplay"];
				$_SESSION["Id_User"] 			= $user["Id_User"];
				$_SESSION["Foto"]				= $user["Foto"];
				$_SESSION["Login"] 				= true;
				
				if ($_SESSION["Id_Usergroup_User"] == 1){
					header ("Location: admin/index.php");
					exit();
				}
				else if($_SESSION["Id_Usergroup_User"] == 2){
					header ("Location: nilai/index.php");
					exit();
				}
				else if($_SESSION["Id_Usergroup_User"] == 3){
					header ("Location: siswi/index.php");
					exit();
				}
				else if($_SESSION["Id_Usergroup_User"] == 4){
					header ("Location: dosenbdn/index.php");
					exit();
				}
				else if($_SESSION["Id_Usergroup_User"] == 5){
					header ("Location: lab/index.php");
					exit();
				}
				else if($_SESSION["Id_Usergroup_User"] == 6){
					header ("Location: keuangan/index.php");
					exit();
				}
				else if($_SESSION["Id_Usergroup_User"] == 7){
					header ("Location: sarpras/index.php");
					exit();
				}else if($_SESSION["Id_Usergroup_User"] == 8){
					header ("Location: siswaadm/index.php");
					exit();
				}else if($_SESSION["Id_Usergroup_User"] == 9){
					header ("Location: kepegawaian/index.php");
					exit();
				}else if($_SESSION["Id_Usergroup_User"] == 10){
					header ("Location: dosenadm/index.php");
					exit();
				}
				else{
					header("Location :pagenotfound.php");
					exit();
				}
			}
			else
			{
				header ("Location: index.php?Err=4");
				exit();
			}
	}
	else if (empty ($Username) && empty ($Password)){
		header ("Location: index.php?Err=1");
		exit();
	}
	else if(empty ($Username)){
		header ("Location: index.php?Err=2");
		exit();
	}
	else if(empty ($Password)){
		header ("Location: index.php?Err=3");
		exit();
	}
	else{
		header ("Location: index.php?Err=5");
		exit();
	}
}
	
?>