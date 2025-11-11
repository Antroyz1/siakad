<?php

session_start();
include "../koneksi.php";
include "auth_user.php";


$daftarnilai[] = "A";
$daftarnilai[] = "B";
$daftarnilai[] = "C";
$daftarnilai[] = "D";
$daftarnilai[] = "E";
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
    			<li><a  target=”_blank” href="nilai/index.php"><i class="fa fa-book"></i><span>Nilai Mahasiswa</span></a></li>
              	<li><a href="ipsms.php"><i class="fa fa-book"></i><span>IP Semester</span></a></li>
              	<li class="active"><a href="nilai.php"><i class="fa fa-book"></i><span>Lap. Nilai</span></a></li>
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
            <li><i class="fa fa-book"></i> Laporan</li>
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
                	<div class="form-group"></div>
                	<a href="#"><button class="btn btn-success" type="button" data-target="#ModalCetak" data-toggle="modal"><i class="fa fa-print"></i> Print per Matkul</button></a>
                	<a href="#"><button class="btn btn-success" type="button" data-target="#ModalCetakTotal" data-toggle="modal"><i class="fa fa-print"></i> Print per Kelas</button></a>
                	<!-- <a href="#"><button class="btn btn-info" type="button" data-target="#ModalAkhir" data-toggle="modal"><i class="fa fa-print"></i> Print Laporan Akhir </button></a>	 -->
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
		<!-- Modal Popup Dosen -->
		<div id="ModalCetak" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Print Nilai</h4>
					</div>
					<div class="modal-body">
						<form action="laporan_nilai.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Matakuliah</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<select name="Kode_Matakuliah_Nilai" class="form-control">
										<?php
										
											$querymtk = mysqli_query($konek, "SELECT Kode_Matakuliah, Nama_Matakuliah FROM matakuliah");
											if($querymtk == false){
												die("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($mtk = mysqli_fetch_array($querymtk)){
												echo "<option value='$mtk[Kode_Matakuliah]'>($mtk[Kode_Matakuliah]) $mtk[Nama_Matakuliah]</option>";
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
										<select name="Kode_Kelas" class="form-control">
											<?php
												
												$querykelas = mysqli_query($konek, "SELECT * FROM kelas");
												if($querykelas == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));	
												}
												while($kelas = mysqli_fetch_array($querykelas)){
													echo "
														<option value='$kelas[Kode_Kelas]'>$kelas[Kode_Kelas]</option>";
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
<!-- Modal CetakTotal -->
		<div id="ModalCetakTotal" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Print Nilai</h4>
					</div>
					<div class="modal-body">
						<form action="laporan_akhir.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Kelas</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<select name="Kode_Kelas" class="form-control">
											<?php
												
												$querykelas = mysqli_query($konek, "SELECT * FROM kelas");
												if($querykelas == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));	
												}
												while($kelas = mysqli_fetch_array($querykelas)){
													echo "
														<option value='$kelas[Kode_Kelas]'>$kelas[Kode_Kelas]</option>";
												}
											?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Semester</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<select name="Semester" class="form-control">
											<option selected>Pilih Semester</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
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
		<div id="ModalFilter" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Filters Nilai</h4>
					</div>
					<div class="modal-body">
						<form action="filter_nilai.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Matakuliah</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<select name="Kode_Matakuliah_Nilai" class="form-control">
										<?php
										
											$querymtk = mysqli_query($konek, "SELECT Kode_Matakuliah, Nama_Matakuliah,  Kode_Matakuliah_krs FROM matakuliah 
												INNER JOIN krs ON Kode_Matakuliah=Kode_Matakuliah_krs");
											if($querymtk == false){
												die("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($mtk = mysqli_fetch_array($querymtk)){
												echo "<option value='$mtk[Kode_Matakuliah]'>($mtk[Kode_Matakuliah]) $mtk[Nama_Matakuliah]</option>";
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
										<select name="Kode_Kelas" class="form-control">
											<?php
												
												$querykelas = mysqli_query($konek, "SELECT * FROM kelas");
												if($querykelas == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));	
												}
												while($kelas = mysqli_fetch_array($querykelas)){
													echo "
														<option value='$kelas[Kode_Kelas]'>$kelas[Kode_Kelas]</option>";
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
		
		<div id="ModalAkhir" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Print Nilai</h4>
					</div>
					<div class="modal-body">
						<form action="laporan_akhir.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Semester</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select name="Semester" class="form-control">
											<option selected>Pilih Semester</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Kelas</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<select name="Kode_Kelas_krs" class="form-control">
											<?php
												
												$querykelas = mysqli_query($konek, "SELECT * FROM kelas");
												if($querykelas == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));	
												}
												while($kelas = mysqli_fetch_array($querykelas)){
													echo "
														<option value='$kelas[Kode_Kelas]'>$kelas[Kode_Kelas]</option>";
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
		include	"content_footer.php";
	?>
    </div><!-- ./wrapper -->
	<!-- Library Scripts -->
	<script type="text/javascript" language="javascript" >
		$(document).ready(function(){

		 var dataTable = $('#data_nilai').DataTable({
		  "processing" : true,
		  "serverSide" : true,
		  "order" : [],
		  "ajax" : {
		   url:"fetch.php",
		   type:"POST"
		  }
		 });

		 $('#data_nilai').on('draw.dt', function(){
		  $('#data_nilai').Tabledit({
		   url:'action.php',
		   dataType:'json',
		   columns:{
		    identifier : [0, 'Id_Nilai'],
		    editable:[ [1, 'Id_Nilai_krs'], [2, 'Kehadiran'], [3, 'Tugas'],[4, 'UTS'],[5, 'UAS'],[6, 'Total'], [7, 'Nilai', '{"A":"A","B":"B","C":"C","D":"D","E":"E"}'],[8, 'Mutu']]
		   },
		   restoreButton:false,
		   onSuccess:function(data, textStatus, jqXHR)
		   {
		    if(data.action == 'delete')
		    {
		     $('#' + data.Id_Nilai).remove();
		     $('#data_nilai').DataTable().ajax.reload();
		    }
		   }
		  });
		 });
		  
		}); 
	</script>
	<?php

		include "bundle_script.php";
	?>
  </body>
</html>
