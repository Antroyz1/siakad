<?php

session_start();
include "../koneksi.php";
include "auth_user.php";

?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>KSPI - AKBID Panca Bhakti Pontianak</title>
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
    	    		<li><a href="jadwal.php"><i class="fa fa-calendar"></i><span>Jadwal</span></a></li>
		            <li><a href="jadwalLab.php"><i class="fa fa-flask"></i><span>Jadwal Lab.</span></a></li>
		            <li><a href="pinjam.php"><i class="fa fa-flask"></i><span>Form Pinjam Lab.</span></a></li>
			        <li><a href="krs.php"><i class="fa fa-sticky-note-o"></i><span>KRS</span></a></li>
	    		    <li><a href="nilai.php"><i class="fa fa-book"></i><span>KHS</span></a></li>
	            	<li><a href="laporan.php"><i class="fa fa-download"></i><span> Unduh</span></a></li>
	            	<li class="active"><a href="kspi.php"><i class="fa fa-sticky-note-o"></i><span>KSPI</span></a></li>
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
            Keterangan
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-sticky-note-o"></i> Keterangan</li>
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
				<a href="#"><button class="btn btn-success" type="button" data-target="#ModalPrint" data-toggle="modal"><i class="fa fa-print"></i> Print SKPI</button></a>
				<a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah</button></a>
                  <br></br>
				  <table id="data" class="table table-bordered table-striped table-scalable">
						<?php
							include "dt_kspi.php";
						?>
                  </table>
                  <a>Harap teliti !! Apabila terjadi kesalahan silahkan hubungi Admin ICT.</a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		

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
              $('#Tanggal_Lahir3').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                format: 'YYYY-MM-DD'
              });
              });
        </script>
		<div id="ModalPrint" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Print</h4>
          </div>
          <div class="modal-body">
            <form action="cetakKSPI.php" name="modal_popup" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>NIM</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                     <input type="hidden" name="Id_User" class="form-control" value="<?php echo "".$_SESSION["Id_User"]."" ?>" readonly />
                    <input name="Username" type="text" class="form-control" value="<?php echo "".$_SESSION["Username"].""; ?>" readonly />
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
                    <input name="Tempat_Lahir" type="text" class="form-control" value="<?php echo $bio["Tempat_Lahir_Mhs"]; ?>"readonly/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir(YYYY-MM-DD)</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input id="Tanggal_Lahir" name="Tanggal_Lahir" type="text" class="form-control" value="<?php echo $bio["Tanggal_Lahir_Mhs"]; ?>"readonly/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tahun Masuk</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-share"></i>
                    </div>
                    <input name="thnMasuk" type="text" class="form-control"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tahun Lulus</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-flag"></i>
                    </div>
                    <input name="thnLulus" type="text" class="form-control"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Penghargaan dan Pemenang Kejuaraan</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-flag"></i>
                    </div>
                    <input name="awards" type="text" class="form-control"/>
                  </div>
              </div>
               <div class="form-group">
                <label>Pengalaman Berorganisasi</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-users"></i>
                    </div>
                    <input name="organisasi" type="text" class="form-control"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Judul Tugas Akhir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-flag"></i>
                    </div>
                    <input name="final" type="text" class="form-control"/>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
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
		<!-- Modal Popup Dosen -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah KSPI</h4>
					</div>
					<div class="modal-body">
						<form action="kspi_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>NIM</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="NIM_krs_Mhs" type="text" class="form-control" value="<?php echo "".$_SESSION["Username"].""; ?>" readonly />
									</div>
							</div>					
							<div class="form-group">
								<label>Jenis</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select name="Jenis" class="form-control">
											<option selected>Jenis</option>
											<option value="1">Penghargaan dan Pemenang Kejuaraan</option>
											<option value="2">Pengalaman Organisasi</option>
											<option value="3">Pelatihan</option>
											
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Keterangan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-university"></i>
										</div>
										 <input name="Ket" type="text" class="form-control" placeholder="Cth. "/>
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
		
		<!-- Modal Popup Dosen Edit -->
		<div id="ModalEditAngkatan" class="modal fade" tabindex="-1" role="dialog"></div>
		
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
}
		include	"content_footer.php";
	?>
    </div><!-- ./wrapper -->
	<!-- Library Scripts -->
	<?php
		include "bundle_script.php";
	?>
  </body>
</html>
