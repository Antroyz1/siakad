<?php

session_start();
include "../koneksi.php";
include "auth_user.php";
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>DASHBOARD - STIKES Panca Bhakti Pontianak</title>
	<!-- Icon -->
	<link rel="shortcut icon" type="image/icon" href="../favicon.ico">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../aset/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../aset/fa/css/font-awesome.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../aset/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../aset/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../aset/dist/css/skins/_all-skins.min.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4632180625303347"
     crossorigin="anonymous"></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php
        include "content_header.php";  
       ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <p></p>
            </div>
          </div><!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
    				  <li class="header"><h4><b><center>MAHASISWI</center></b></h4></li>
      					<li class="active"><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
      					<li><a href="pinjam.php"><i class="fa fa-flask"></i><span>Form Pinjam Alat Lab.</span></a></li>
                <li><a href="krs.php"><i class="fa fa-sticky-note-o"></i><span>KRS</span></a></li>
                <li><a href="list_krs.php"><i class="fa fa-archive"></i><span>KRS Semua</span></a></li>
      					<li><a href="nilai.php"><i class="fa fa-book"></i><span>KHS</span></a></li>
                <li><a href="laporan.php"><i class="fa fa-download"></i><span> Unduh</span></a></li>
                <li><a href="spp.php"><i class="fa fa-money"></i><span>SPP</span></a></li>
      					<li><a href="about.php"><i class="fa fa-info-circle"></i><span>Tentang</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i> Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h1><center><b>SISTEM INFORMASI AKADEMIK</b></center></h1>
                    <center><img src="../aset/foto/logo2.png" width="225" height="225" /></center>
                    <center><h1><b>STIKES PANCA BHAKTI PONTIANAK</b></h1></center>
                    <center><h3><b>TULUS, IKHLAS, JUJUR, MENGABDI DAN BERMUTU</b></h3></center>
                </div><!-- /.box-header -->
                <div class="box-body">
					
                </div><!-- /.box-body -->
                <?php

              include "../koneksi.php";

              $NIM  = $_SESSION["Username"];

              $querybio = mysqli_query($konek, "SELECT * FROM mahasiswa WHERE NIM='$NIM'");
              if($querybio == false){
                die ("Terjadi Kesalahan : ". mysqli_error($konek));
              }
              while($bio = mysqli_fetch_array($querybio)){

        ?>
        <script src="../aset/plugins/daterangepicker/moment.min.js"></script>
        <script src="../aset/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- page script -->
         <script>
              $(function () { 
            // Daterange Picker
              $('#Tanggal_Lahir2').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                format: 'YYYY-MM-DD'
              });
              });
        </script>
    <div id="ModalUbah" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ubah Biodata</h4>
          </div>
          <div class="modal-body">
            <form action="user_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>Username</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                     <input type="hidden" name="Id_User" class="form-control" value="<?php echo "".$_SESSION["Id_User"]."" ?>" readonly />
                    <input name="Username" type="text" class="form-control" value="<?php echo "".$_SESSION["Username"].""; ?>" readonly />
                  </div>
              </div>
              
              
              <div class="form-group">
                <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-lock"></i>
                    </div>
                    <input name="Password" type="text" class="form-control" value="" placeholder="Harap diisi !!!!" />
                  </div>
              </div> 
              
              <div class="form-group">
                <label>Mahasiswa</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input name="Nama_Mahasiswa" type="text" class="form-control" value="<?php echo $bio["Nama_Mahasiswa"]; ?>" readonly/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-map-marker"></i>
                    </div>
                    <input name="Tempat_Lahir" type="text" class="form-control" value="<?php echo $bio["Tempat_Lahir_Mhs"]; ?>"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir(YYYY-MM-DD)</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input id="Tanggal_Lahir2" name="Tanggal_Lahir" type="text" class="form-control" value="<?php echo $bio["Tanggal_Lahir_Mhs"]; ?>">
                  </div>
              </div>
              <div class="form-group">
                <label>No. Telp (WA Aktif)</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <input name="No_Telp" type="text" class="form-control" value="<?php echo $bio["No_Telp_Mhs"]; ?>"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-flag"></i>
                    </div>
                    <input name="Alamat" type="text" class="form-control" value="<?php echo $bio["Alamat_Mhs"]; ?>"/>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Simpan
                </button>
                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                  Batal
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php
  }
		include	"content_footer.php";
	?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../aset/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../aset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../aset/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../aset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../aset/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../aset/dist/js/app.min.js"></script>
  </body>
</html>
