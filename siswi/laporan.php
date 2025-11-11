<?php

session_start();
include "../koneksi.php";
include "auth_user.php";
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>LAPORAN - STIKES Panca Bhakti Pontianak</title>
	<!-- Library CSS -->
	<?php
		include "bundle_css.php";
	?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php
        include 'content_header.php';
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
              <li><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
    					<li><a href="pinjam.php"><i class="fa fa-flask"></i><span>Form Pinjam Lab.</span></a></li>
              <li><a href="krs.php"><i class="fa fa-sticky-note-o"></i><span>KRS</span></a></li>
              <li><a href="list_krs.php"><i class="fa fa-archive"></i><span>KRS Semua</span></a></li>
              <li><a href="nilai.php"><i class="fa fa-book"></i><span>KHS</span></a></li>
    					<li class="active"><a href="laporan.php"><i class="fa fa-download"></i><span> Unduh</span></a></li>
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
            Laporan
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-download"></i> Laporan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body">
					            <table id="data" class="table table-bordered table-striped table-scalable">
                          <?php
                            include "dt_unduh.php";
                          ?>
                        </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
	
		
    </div><!-- /.content-wrapper -->
	<?php

		include	"content_footer.php";
	?>
    </div><!-- ./wrapper -->
	<!-- Library Scripts -->
	<?php
		include "bundle_script.php";
	?>
  </body>
</html>
