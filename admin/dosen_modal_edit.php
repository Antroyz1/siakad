<?php

include "../koneksi.php";

$NIP	= $_GET["NIP"];

$querydosen = mysqli_query($konek, "SELECT * FROM pegawai WHERE NIP='$NIP'");
if($querydosen == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($dosen = mysqli_fetch_array($querydosen)){

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
<!-- Modal Popup Dosen -->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Dosen</h4>
					</div>
					<div class="modal-body">
						<form action="dosen_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>NIDN</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="NIP" type="text" class="form-control" value="<?php echo $dosen["NIP"]; ?>" readonly />
									</div>
							</div>
							<div class="form-group">
								<label>Nama Dosen</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="Nama_Pegawai" type="text" class="form-control" value="<?php echo $dosen["Nama_Pegawai"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Tempat Lahir</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-map-marker"></i>
										</div>
										<input name="Tempat_Lahir" type="text" class="form-control" value="<?php echo $dosen["Tempat_Lahir"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Tanggal Lahir</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input id="Tanggal_Lahir2" name="Tanggal_Lahir" type="text" class="form-control" value="<?php echo $dosen["Tanggal_Lahir"]; ?>">
									</div>
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<select name="JK" class="form-control">
											<option value="<?php echo $dosen["JK"]; ?>" selected>
											<?php
												if ($dosen["JK"]=="L"){
													echo "Laki - laki";
												}
												else{
													echo "Perempuan";
												}
											?>
											</option>
											<?php
												if ($dosen["JK"]=="L"){
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
								<label>Email</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-at"></i>
										</div>
										<input name="Email" type="text" class="form-control" placeholder="E-mail" value="<?php echo $dosen["Email"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>No.Handphone</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-mobile"></i>
										</div>
										<input name="No_Telp" type="text" class="form-control" placeholder="No Telpon" value="<?php echo $dosen["No_Telp"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Pendidikan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<input name="Pendidikan" type="text" class="form-control" placeholder="Pendidikan Terakhir" value="<?php echo $dosen["Pendidikan"]; ?>"/>
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