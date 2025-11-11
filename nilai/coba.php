<?php

session_start();
include "../koneksi.php";
include "auth_user.php";
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>AKBID Panca Bhakti Pontianak</title>
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
    				  <li class="header"><h4><b><center>ADMIN NILAI</center></b></h4></li>
    					<li><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
              <li><a href="kelas.php"><i class="fa fa-university"></i><span>Kelas</span></a></li>
              <li><a href="mahasiswa.php"><i class="fa fa-users"></i><span>Mahasiswa</span></a></li>
    					<li><a  target=”_blank” href="nilai/index.php"><i class="fa fa-book"></i><span>Nilai Mahasiswa</span></a></li>
              <li><a href="ipsms.php"><i class="fa fa-book"></i><span>IP Semester</span></a></li>
              <li><a href="nilai.php"><i class="fa fa-book"></i><span>Lap. Nilai</span></a></li>
              <li  class="active"><a href="coba.php"><i class="fa fa-book"></i><span>Coba Nilai</span></a></li>
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
            Tentang
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-info-circle"></i> Tentang</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <a href="#"><button class="btn btn-success" type="button" data-target="#ModalFilter" data-toggle="modal"><i class="fa fa-plus"></i> Filter</button></a>
                  <table id="data" class="table table-bordered table-striped table-scalable">
                      <?php
                        include "dt_coba.php";
                      ?>
                    </table>					
                </div><!-- /.box-header -->
                <div class="box-body">
					
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

        <div id="ModalFilter" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Filter Nilai</h4>
              </div>
              <div class="modal-body">
                <form action="nilai_filter.php" name="modal_popup" enctype="multipart/form-data" method="post">
                  <div class="form-group">
                      <label>Angkatan</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-graduation-cap"></i>
                          </div>
                          <select name="Kode_Angkatan" class="form-control">
                            <?php
                              
                              $queryangkatan = mysqli_query($konek, "SELECT * FROM angkatan");
                              if($queryangkatan == false){
                                die ("Terdapat Kesalahan : ". mysqli_error($konek));  
                              }
                              while($angkatan = mysqli_fetch_array($queryangkatan)){
                                echo "
                                  <option value='$angkatan[Kode_Angkatan]'>$angkatan[Kode_Angkatan]</option>";
                              }
                            ?>
                          </select>
                        </div>
                    </div>
                  <div class="form-group">
                <label>Kode Matakuliah</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-graduation-cap"></i>
                    </div>
                    <select name="Kode_Makul" class="form-control">
                      <?php                        
                        $querymakul = mysqli_query($konek, "SELECT * FROM matakuliah");
                        if($querymakul == false){
                          die ("Terdapat Kesalahan : ". mysqli_error($konek));  
                        }
                        while($makul = mysqli_fetch_array($querymakul)){
                          echo "
                            <option value='$makul[Kode_Matakuliah]'>$makul[Nama_Matakuliah]</option>";
                        }
                      ?>
                    </select>
                  </div>
              </div>
                  <div class="modal-footer">
                    <button class="btn btn-success" type="submit">
                      Tambah
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
