<?php
session_start();
include "../siakad/koneksi.php";

// Notif Error
$Err = "";
if(isset ($_GET ["Err"]) && !empty ($_GET ["Err"])){
	switch ($_GET ["Err"]){
		case 1:
			$Err = "Username dan Password Kosong";
		break;
		case 2:
			$Err = "Username Kosong";
		break;
		case 3:
			$Err = "Password Kosong";
		break;
		case 4:
			$Err = "Password Salah";
		break;
		case 5:
			$Err = "Username Salah";
		break;
		case 6:
			$Err = "Maaf, Terjadi Kesalahan";
		break;
	}
}

// Notif
$Notif = "";
if(isset ($_GET["Notif"]) && !empty ($_GET["Notif"])){
	switch($_GET["Notif"]){
		case 1:
			$Notif = "User berhasil dibuat, silahkan Login";
		break;
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SIAKAD - STIKES Panca Bhakti Pontianak</title>
	<!-- Icon -->
	<link rel="shortcut icon" type="image/icon" href="../siakad/favicon.ico">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../siakad/aset/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../siakad/aset/fa/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../siakad/aset/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../siakad/aset/plugins/iCheck/square/blue.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4632180625303347"
     crossorigin="anonymous"></script>
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
    <div class="login-logo"><img src="../siakad/aset/foto/logo2.png" width="120" height="120" />
    <h3><strong>STIKES PANCA BHAKTI PONTIANAK</strong></h3>
	</div><!-- /.login-logo -->
      <div class="login-box-body">
        <b><p class="login-box-msg">LOGIN SIAKAD</p></b>
        <form action="../siakad/vl_user.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="Username" class="form-control" placeholder="NIP/NIM" maxlength="50" />
            <span class="form-control-feedback"><i class="fa fa-user"></i></span> </div>
          <div class="form-group has-feedback">
            <input type="password" name="Password" class="form-control" placeholder="Password" maxlength="255" />
            <span class="form-control-feedback"><i class="fa fa-lock"></i></span> </div>
          <div class="row">
            <div class="col-xs-8"></div>
            <!-- /.col -->

            <div class="col-xs-4 col-md-4">
              <button type="submit" class="btn btn-primary">Masuk <i class="fa fa-sign-in"></i></button><br /><br />
              
            </div>
            
            <!-- /.col -->
          </div>
          <br>
          <center>
            <font style="color:red;"><?php echo $Err ?></font>
          </center>
          <center>
            <font style="color:green;"><?php echo $Notif ?></font>
          </center>
          </br>
        </form>
     
	<em class="fa fa-info-circle"></em>&nbsp; Lupa password ? Silahkan hubungi petugas Admin.</a></div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../siakad/aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../siakad/aset/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../siakad/aset/plugins/iCheck/icheck.min.js"></script>
  </body>
</html>