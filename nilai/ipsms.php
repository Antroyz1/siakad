<?php

session_start();
include "../koneksi.php";
include "auth_user.php";


$kreditsks = 0;
$bobot=0;

?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>NILAI - AKBID Panca Bhakti Pontianak</title>
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
                <li><a  target=”_blank” href="nilai/index.php"><i class="fa fa-book"></i><span>Nilai Mhs D3 Bidan</span></a></li>
                <li><a  target=”_blank” href="nilaiAdm/index.php"><i class="fa fa-book"></i><span>Nilai Mhs S1 Adm</span></a></li>
                <li class="active"><a href="ipsms.php"><i class="fa fa-book"></i><span>IP Semester</span></a></li>
                <li><a href="nilai.php"><i class="fa fa-book"></i><span>Lap. Nilai</span></a></li>
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
            IP Semester
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-book"></i> IP Semester</li>
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
							include "dt_ip.php";
						?>
                  </table>
                  <a>Klik Ubah bila IP Sem. belum berubah lalu di Simpan</a>
				  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
		<!-- Modal Popup Dosen Edit -->
		<div id="ModalEditIPSem" class="modal fade" tabindex="-1" role="dialog"></div>
		<!-- Modal Popup Cetak Transkip -->
    <div id="ModalCetak" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">TRANSKRIP AKADEMIK</h4>
          </div>
          <div class="modal-body">
            <form action="lap_transkrip.php" name="modal_popup" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>NIM</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <select name="NIM" class="form-control">
                      <?php
                        $querynippa = mysqli_query($konek, "SELECT * FROM mahasiswa ORDER BY NIM ASC");
                        if($querynippa == false){
                          die ("Terdapat Kesalahan : ". mysqli_error($konek));  
                        }
                        while($nippa = mysqli_fetch_array($querynippa)){
                          echo "
                            <option value='$nippa[NIM]'>($nippa[NIM])  $nippa[Nama_Mahasiswa]</option>";
                        }
                      ?>
                    </select>
              </div>
              <div class="form-group">
                <label>Nama Mahasiswa</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input name="Nama_Mahasiswa" type="text" class="form-control" placeholder="Nama Mahasiswa"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-map-marker"></i>
                    </div>
                    <input name="Tempat_Lahir" type="text" class="form-control" placeholder="Tempat Lahir"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input id="Tanggal_Lahir" name="Tanggal_Lahir" type="text" class="form-control" placeholder="Tanggal Lahir">
                  </div>
              </div>
              <div class="form-group">
                <label>Tanggal Yudisium</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input id="Tanggal_Lahir" name="Tgl_Yudisium" type="text" class="form-control" placeholder="Tanggal Yudisium">
                  </div>
              </div>
              <div class="form-group">
                <label>No. Seri Ijazah</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-certificate"></i>
                    </div>
                    <input name="No_Seri" type="text" class="form-control" placeholder="No Seri Ijazah"/>
                  </div>
              </div>
              <div class="form-group">
                <label>No. Register Ijazah</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-certificate"></i>
                    </div>
                    <input name="No_Reg" type="text" class="form-control" placeholder="No. Register Ijazah"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Judul KTI</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-certificate"></i>
                    </div>
                    <input name="JudulKTI" type="text" class="form-control" placeholder="Judul KTI"/>
                  </div>
              </div>
               <div class="form-group">
                <label>Nilai Rata Ujian Tulis</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-server"></i>
                    </div>
                    <input name="UTul" type="text" class="form-control" placeholder="Nilai Rata2 Ujian Tulis"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Nilai Rata Ujian Praktik</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-server"></i>
                    </div>
                    <input name="UTek" type="text" class="form-control" placeholder="No. Register Ijazah"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Nilai Ujian KTI</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-server"></i>
                    </div>
                    <input name="UKti" type="text" class="form-control" placeholder="Nilai Ujian KTI"/>
                  </div>
              </div>
              <div class="form-group">
                <label>IPK Kumulatif</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-server"></i>
                    </div>
                    <input name="IPKKum" type="text" class="form-control" placeholder="Nilai Ujian KTI"/>
                  </div>
              </div>
             <div class="modal-footer">
                <button class="btn btn-success" type="submit"><i class="fa fa-print"></i>
                  Print
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
    
		<!-- Modal Popup untuk delete--> 
		<div class="modal fade" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Anda yakin ingin menghapus informasi ini ?</h4>
					</div>    
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-danger" id="delete_link">Hapus</a>
						<button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
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
