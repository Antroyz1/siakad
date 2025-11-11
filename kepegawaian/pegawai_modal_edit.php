<?php

include "../koneksi.php";

$Id_pegawai	= $_GET["Id_pegawai"];

$querypegawai = mysqli_query($konek, "SELECT * FROM pegawai WHERE Id_pegawai='$Id_pegawai'");
if($querypegawai == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($pegawai = mysqli_fetch_array($querypegawai)){

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
<!-- Modal Popup pegawai -->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Pegawai</h4>
					</div>
					<div class="modal-body">
						<form action="pegawai_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>NIP</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input type="hidden" name="Id_pegawai" class="form-control" value="<?php echo $pegawai["Id_pegawai"] ?>">
										<input name="NIP" type="text" class="form-control" value="<?php echo $pegawai["NIP"]; ?>" />
									</div>
							</div>
							<div class="form-group">
								<label>Nama Pegawai</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="Nama_Pegawai" type="text" class="form-control" value="<?php echo $pegawai["Nama_Pegawai"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Tempat Lahir</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-map-marker"></i>
										</div>
										<input name="Tempat_Lahir" type="text" class="form-control" value="<?php echo $pegawai["Tempat_Lahir"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Tanggal Lahir</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input id="Tanggal_Lahir2" name="Tanggal_Lahir" type="text" class="form-control" value="<?php echo $pegawai["Tanggal_Lahir"]; ?>">
									</div>
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<select name="JK" class="form-control">
											<option value="<?php echo $pegawai["JK"]; ?>" selected>
											<?php
												if ($pegawai["JK"]=="L"){
													echo "Laki - laki";
												}
												else{
													echo "Perempuan";
												}
											?>
											</option>
											<?php
												if ($pegawai["JK"]=="L"){
													echo "<option value='P'>Perempuan</option>";
												}
												else{
													echo "<option value='L'>Laki - laki</option>";
												}
											?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>No.Handphone</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-mobile"></i>
										</div>
										<input name="No_Telp" type="text" class="form-control" value="<?php echo $pegawai["No_Telp"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Email</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-mobile"></i>
										</div>
										<input name="Email" type="text" class="form-control" value="<?php echo $pegawai["Email"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Pendidikan terakhir</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-mobile"></i>
										</div>
										<input name="Pendidikan" type="text" class="form-control" value="<?php echo $pegawai["Pendidikan"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Jabatan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-suitcase"></i>
										</div>
										<select name="Jabatan" class="form-control">
											<option value="<?php echo $pegawai["Jabatan"]; ?>" selected>
											<option value="Dosen">Dosen</option>
											<option value="Staff Lab">Staff Lab</option>
											<option value="Staff TU">Staff TU</option>
											<option value="Kepegawaian">Kepegawaian</option>
											<option value="Keuangan">Keuangan</option>
											<option value="Staff IT">Staff IT</option>
											<option value="Staff Perpus">Staff Perpustakaan</option>
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
			
			
<?php
			}

?>