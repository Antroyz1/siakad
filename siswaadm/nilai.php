<?php

session_start();
include "../koneksi.php";
include "auth_user.php";

$daftarnilai[] = "A";
$daftarnilai[] = "B";
$daftarnilai[] = "C";
$daftarnilai[] = "D";
$daftarnilai[] = "E";

?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>KHS - STIKES Panca Bhakti Pontianak</title>
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
                <li><a href="list_krs.php"><i class="fa fa-sticky-note-o"></i><span>KRS Semua</span></a></li>
          			<li class="active"><a href="nilai.php"><i class="fa fa-book"></i><span>KHS</span></a></li>
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
            Kartu Hasil Studi
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-book"></i> Kartu Hasil Studi</li>
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
                	<a href="#"><button class="btn btn-info" type="button" data-target="#ModalCetak" data-toggle="modal"><i class="fa fa-print"></i>   Print </button></a>
                	<br><br>
				<table id="data" class="table table-bordered table-striped table-scalable">
						<?php
            
							include "dt_nilai.php";
						?>
                  </table>
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
              $('#Tanggal_Lahir2').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                format: 'YYYY-MM-DD'
              });
              });
        </script>
         <div id="ModalCetak" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Print Nilai</h4>
          </div>
          <div class="modal-body">
            <form action="cetakKHS.php" name="modal_popup" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>Semester</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-graduation-cap"></i>
                    </div>
                    <select name="Semester_Skr" class="form-control">
                      <option selected>Semester Sekarang</option>
                    <?php 
                    $KHS=0;
                    $khsTampil= mysqli_query($konek, "SELECT khs_tampil FROM mahasiswa WHERE NIM = '$_SESSION[Username]'"); 
                    if($khsTampil == false){
                            die ("Terjadi Kesalahan : ". mysqli_error($konek));
                          }
                          while ($KT = mysqli_fetch_array ($khsTampil)){
                            $KHS = $KT['khs_tampil'];
                          }
                            
                            for ($i=1; $i <= $KHS; $i++){
                      ?>
                    
                      <option value="<?php echo $i ?>"><?php echo $i ?></option>
                      
                    
                    <?php 
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
		<!-- Modal Popup Dosen -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Ruangan</h4>
					</div>
					<div class="modal-body">
						<form action="nilai_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								
								<label>Mahasiswa</label>
								
								
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-users"></i>
										</div>
										<select name="NIM_Nilai" class="form-control">
											<?php
												
												$querymhs = mysqli_query($konek, "SELECT * FROM mahasiswa");
												if($querymhs == false){
													die("Terdapat Kesalahan : ". mysqli_error($konek));
												}
												while($mhs = mysqli_fetch_array($querymhs)){
													echo "<option value='$mhs[NIM]'>$mhs[Nama_Mahasiswa]</option>";
												}
											?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Matakuliah</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<select name="Kode_Matakuliah_Nilai" class="form-control">
										<?php
										
											$querymtk = mysqli_query($konek, "SELECT * FROM matakuliah");
											if($querymtk == false){
												die("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($mtk = mysqli_fetch_array($querymtk)){
												echo "<option value='$mtk[Kode_Matakuliah]'>$mtk[Nama_Matakuliah]</option>";
											}
										?>
										</select>
									</div>
							</div>
							</div>
							<div class="form-group">
								<label>Nilai</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<select name="Nilai" class="form-control">
										<?php
											for($nilai=0; $nilai<count($daftarnilai); $nilai++)
											{
												echo "<option value='$daftarnilai[$nilai]'>$daftarnilai[$nilai]</option>";
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
		
		<!-- Modal Popup Dosen Edit -->
		<div id="ModalEditNilai" class="modal fade" tabindex="-1" role="dialog"></div>
		
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
