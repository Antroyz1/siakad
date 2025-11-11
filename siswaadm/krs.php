<?php

session_start();
include "../koneksi.php";
include "auth_user.php";

?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>KRS - STIKES Panca Bhakti Pontianak</title>
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
    	    		<li class="header"><h4><b><center>MAHASISWA</center></b></h4></li>
    	    		<li><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
    	    		<li><a href="pinjam.php"><i class="fa fa-flask"></i><span>Form Pinjam Lab.</span></a></li>
			        <li class="active"><a href="krs.php"><i class="fa fa-sticky-note-o"></i><span>KRS</span></a></li>
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
            Kartu Rencana Studi
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-sticky-note-o"></i> Kartu Rencana Studi</li>
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
				<a href="#"><button class="btn btn-success" type="button" data-target="#ModalPaket" data-toggle="modal"><i class="fa fa-plus"></i> Paket Semester </button></a>
				<a href="cetakKRS.php" target="_blank"><button class="btn btn-info" type="button" ><i class="fa fa-print"></i> Print KRS </button></a>
                  <br></br>
				  <table id="data" class="table table-bordered table-striped table-scalable">
						<?php
							include "dt_krs.php";
						?>
                  </table>
                  <a href="https://wa.me/628974000723?text=Saya%20Nama[NIM]%20dengan%20masalah%20 .........">Harap teliti !! Jangan Lupa di Print KRS. Bilah terjadi kesalahan silahkan diklik tautan ini.</a>
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
		<div id="ModalPaket" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Paket Semester</h4>
          </div>
          <div class="modal-body">
            <form action="paket_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
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
                <label>Mahasiswa</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input name="Nama_Mahasiswa" type="text" class="form-control" value="<?php echo $bio["Nama_Mahasiswa"]; ?>" readonly/>
                  </div>
              </div>
              <div class="form-group">
				<label>Kelas</label>
					<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-graduation-cap"></i>
					</div>
					<select name="Kode_krs_Kelas" class="form-control">
						<?php

							$querymhsjrs=mysqli_query($konek, "SELECT Kode_Kelas_Mhs, Kode_Kelas, Nama_Kelas FROM mahasiswa INNER JOIN kelas ON Kode_Kelas_Mhs=Kode_Kelas WHERE NIM='$NIM'");
											if($querymhsjrs==false){
												die("Terdapat Kesalahan : ".mysqli_error($konek));
											}
											while($mhsjrs=mysqli_fetch_array($querymhsjrs)){
												echo "<option value=$mhsjrs[Kode_Kelas_Mhs] selected>$mhsjrs[Nama_Kelas]</option>";
											}
										
											$queryjrs = mysqli_query($konek, "SELECT * FROM kelas");
											if($queryjrs==false){
												die("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($jrs=mysqli_fetch_array($queryjrs)){
												if($jrs["Kode_Kelas"]!=$mhs["Kode_Kelas_Mhs"]){
													echo "<option value=$jrs[Kode_Kelas]>$jrs[Nama_Kelas]</option>";
												}
											}
											
						?>
					</select>
					</div>
				</div>
              <div class="form-group">
				<label>Paket Semester</label>
					<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-graduation-cap"></i>
					</div>
					<select name="Paket" class="form-control">
                      
                    <?php 
                    $KHS=0;
                    $khsTampil= mysqli_query($konek, "SELECT Semester_Aktif FROM mahasiswa WHERE NIM = '$_SESSION[Username]'"); 
                    if($khsTampil == false){
                            die ("Terjadi Kesalahan : ". mysqli_error($konek));
                          }
                          while ($KT = mysqli_fetch_array ($khsTampil)){
                            $KHS = $KT['Semester_Aktif'];
                          }
                           
                            for ($i=$KHS; $i > 0; $i--){
                      ?>
                    
                      <option value="<?php echo $i ?>"><?php echo $i ?></option>
                      
                    
                    <?php 
                        }
                    ?>
                    </select>
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
						<h4 class="modal-title">Tambah KRS</h4>
					</div>
					<div class="modal-body">
						<form action="krs_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
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
								<label>Kode Matakuliah</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<select name="Kode_Matakuliah_krs" class="form-control">
											<?php
												$querymhs = mysqli_query($konek,"SELECT Semester_Aktif FROM mahasiswa WHERE NIM='$_SESSION[Username]'");
												$sms = mysqli_fetch_array($querymhs);

												if ($sms[Semester_Aktif] % 2 ==0){
													$querymatkul = mysqli_query($konek, "SELECT * FROM matakuliah WHERE Kode_Jurusan_Matkul = 'S1ADM' AND Semester_Matakuliah % 2 = 0 ORDER BY  Semester_Matakuliah ASC");
												
												while($matkul = mysqli_fetch_array($querymatkul)){
													echo "
														<option value='$matkul[Kode_Matakuliah]'>($matkul[Kode_Matakuliah] ) $matkul[Nama_Matakuliah] [$matkul[SKS]SKS]/Semester- $matkul[Semester_Matakuliah]</option>";
													}
												}
													else{
														$querymatkul = mysqli_query($konek, "SELECT * FROM matakuliah WHERE Kode_Jurusan_Matkul = 'S1ADM' AND Semester_Matakuliah % 2 = 1 ORDER BY  Semester_Matakuliah ASC");
												if($querymatkul == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));	
												}
												while($matkul = mysqli_fetch_array($querymatkul)){
													echo "
														<option value='$matkul[Kode_Matakuliah]'>($matkul[Kode_Matakuliah] ) $matkul[Nama_Matakuliah] [$matkul[SKS]SKS]/Semester- $matkul[Semester_Matakuliah]</option>";
													}
												}
											?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Kelas</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<select name="Kode_krs_Kelas" class="form-control">
											<?php
												
												$querymhsjrs=mysqli_query($konek, "SELECT Kode_Kelas_Mhs, Kode_Kelas, Nama_Kelas FROM mahasiswa INNER JOIN kelas ON Kode_Kelas_Mhs=Kode_Kelas WHERE NIM='$NIM'");
											if($querymhsjrs==false){
												die("Terdapat Kesalahan : ".mysqli_error($konek));
											}
											while($mhsjrs=mysqli_fetch_array($querymhsjrs)){
												echo "<option value=$mhsjrs[Kode_Kelas_Mhs] selected>$mhsjrs[Nama_Kelas]</option>";
											}
										
											$queryjrs = mysqli_query($konek, "SELECT * FROM kelas");
											if($queryjrs==false){
												die("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($jrs=mysqli_fetch_array($queryjrs)){
												if($jrs["Kode_Kelas"]!=$mhs["Kode_Kelas_Mhs"]){
													echo "<option value=$jrs[Kode_Kelas]>$jrs[Nama_Kelas]</option>";
												}
											}
											
											?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Semester ke-</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select name="Semester_Ambil" class="form-control">
											 <?php 
                    $KHS=0;
                    $khsTampil= mysqli_query($konek, "SELECT Semester_Aktif FROM mahasiswa WHERE NIM = '$_SESSION[Username]'"); 
                    if($khsTampil == false){
                            die ("Terjadi Kesalahan : ". mysqli_error($konek));
                          }
                          while ($KT = mysqli_fetch_array ($khsTampil)){
                            $KHS = $KT['Semester_Aktif'];
                          }
                           
                            for ($i=$KHS; $i > 0; $i--){
                      ?>
                    
                      <option value="<?php echo $i ?>"><?php echo $i ?></option>
                      
                    
                    <?php 
                        } ?>
											
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>SKS (Hanya angka saja!!!)</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-university"></i>
										</div>
										 <input name="SKS_krs" type="text" class="form-control" placeholder="SKS bisa diliat diatas" onkeypress="return event.charCode >= 48 && event.charCode <=57"/>
									</div>
							</div>
							<div class="form-group">
								<label>Status</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select name="Status" class="form-control">
											<option value="Baru" selected>Baru</option>
											<option value="Ulang">Ulang</option>
											<option value="Perbaikan">Perbaikan</option>
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
