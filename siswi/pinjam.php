<?php

session_start();
include "../koneksi.php";
include "auth_user.php";

$daftarhari[] = "Senin";
$daftarhari[] = "Selasa";
$daftarhari[] = "Rabu";
$daftarhari[] = "Kamis";
$daftarhari[] = "Jumat";
$daftarhari[] = "Sabtu";
$daftarhari[] = "Minggu";

?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>Pinjam Alat - AKBID Panca Bhakti Pontianak</title>
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
	    						<li class="active"><a href="pinjam.php"><i class="fa fa-flask"></i><span>Form Pinjam Alat Lab.</span></a></li>
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
            Daftar Peminjaman
          </h1>
          <ol class="breadcrumb">
            <li><i class=" fa-list-alt"></i> Daftar Peminjaman</li>
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
				<a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah</button></a>
				<a href="#"><button class="btn btn-info" type="button" data-target="#ModalCetak" data-toggle="modal"><i class="fa fa-print"></i>   Print </button></a>
                  <br></br>
				  <table id="data" class="table table-bordered table-striped table-scalable">
						<?php
							$NIM  = $_SESSION["Username"];
							include "dt_pinjam.php";
						?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
		<!-- Modal Popup Dosen -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Form Pinjam Alat Lab</h4>
					</div>
					<div class="modal-body">
						<form action="pinjam_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>NIM</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="NIM_pinjam" type="text" class="form-control" value="<?php echo $_SESSION["Username"] ?>" readonly />
									</div>
							</div>
							<div class="form-group">
								<label>Matakuliah</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<select name="Kode_matkulpinjam" class="form-control">
											<?php
												
												$querykelas = mysqli_query($konek, "SELECT * FROM matakuliah");
												if($querykelas == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));	
												}
												while($kelas = mysqli_fetch_array($querykelas)){
													echo "
														<option value='$kelas[Kode_Matakuliah]'>($kelas[Kode_Matakuliah])$kelas[Nama_Matakuliah]</option>";
												}
											?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Nama Alat</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<select name="Id_barang" class="form-control">
											<?php
												
												$querykelas = mysqli_query($konek, "SELECT * FROM baranglab");
												if($querykelas == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));	
												}
												while($kelas = mysqli_fetch_array($querykelas)){
													echo "
														<option value='$kelas[Id_barang]'>$kelas[nama_barang]</option>";
												}
											?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Jumlah</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-cart-plus"></i>
										</div>
										<input name="Jumlah" type="text" class="form-control" placeholder="Jumlah Alat"/>
									</div>
							</div>
							<div class="form-group">
								<label>Tanggal Pinjam</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-cart-plus"></i>
										</div>
										<input id="Tanggal_Lahir" name="tgl_pinjam" type="text" class="form-control" placeholder="Tanggal Pinjam">
									</div>
							</div>
							<div class="form-group">
								<label>Tanggal Kembali</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-cart-plus"></i>
										</div>
										<input id="Tanggal_Kembali" name="tgl_kembali" type="text" class="form-control" placeholder="Tanggal Kembali">
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
		

		<div id="ModalCetak" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Print Logbook</h4>
          </div>
          <div class="modal-body">
            <form action="cetakLgBook.php" name="modal_popup" enctype="multipart/form-data" method="post">
              <div class="form-group">
								<label>Matakuliah</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<select name="Kode_matkulpinjam" class="form-control">
											<?php
												
												$querykelas = mysqli_query($konek, "SELECT * FROM matakuliah");
												if($querykelas == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));	
												}
												while($kelas = mysqli_fetch_array($querykelas)){
													echo "
														<option value='$kelas[Kode_Matakuliah]'>($kelas[Kode_Matakuliah])$kelas[Nama_Matakuliah]</option>";
												}
											?>
										</select>
									</div>
							</div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit" target="_blank">
                  <i class="fa fa-print"></i>Print
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
		<div id="ModalEditPeminjam" class="modal fade" tabindex="-1" role="dialog"></div>
		
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
