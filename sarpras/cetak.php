<html>
<head>
	<title>CETAK INVENTARIS</title>
	<?php 
			session_start();
			include "../koneksi.php";
			include "auth_user.php";
			$querykrs = mysqli_query ($konek, "SELECT * FROM sarpras");
			 if($querykrs == false){
				die ("Terjadi Kesalahan :". mysqli_error($konek));
				}
				
		$no = 1;
		$sks = 0;
		$bobot=0;
		$tgl=date('d/m/Y');
		$nm;
		$pa;
		?>
</head>
<body>
	
				<table style="width: 100%; border-spacing: 0.1px;" >
					<tr>
						<th rowspan="4"><img src="../aset/foto/logo.png" width="100px"></th>
						<th>AKADEMI KEBIDANAN PANCA BHAKTI PONTIANAK</th>
					</tr>
					<tr>
						<th>Jl.Ahmad Yani II, Komp.Akbid Panca Bhakti Pontianak, Kubu Raya 78391</th>						
					</tr>
					<tr>
						<th>Telp.(0561)6726777, Fax.(0561)711260</th>
					</tr>
					<tr>
						<th>E-mail : akbidpbpontianak@gmail.com</th>
					</tr>
				</table>
				<hr width="100%">
				<center>
				<h1>DATA INVENTARIS</h1>
				
				<br><br>
					
				<table border='1' style='width:90%; cellpadding:5;'>
					<?php 
					include "dt_cetak.php"; ?>
				</table>
				<br>
				
				</center>
				<script>
					window.print();
				</script>
			

</body>
</html>