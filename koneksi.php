<?php
	
$konek = mysqli_connect("localhost", "akpbacid_admin01", "#Roymond012", "akpbacid_siakad01");
	
if(mysqli_connect_errno()){
	printf ("Gagal terkoneksi : ".mysqli_connect_error());
	exit();
}
	
?>