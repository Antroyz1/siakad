<?php

include "../koneksi.php";

$Kode_Kelas	= $_GET["Kode_Kelas"];

$querykelas = mysqli_query($konek, "SELECT * FROM kelas WHERE Kode_Kelas='$Kode_Kelas'");
if($querykelas == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($kelas = mysqli_fetch_array($querykelas)){

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
						<h4 class="modal-title">Edit Kelas</h4>
					</div>
					<div class="modal-body">
						<form action="kelas_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Kode Kelas</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-university"></i>
										</div>
										<input name="Kode_Kelas" type="text" class="form-control" value="<?php echo $kelas["Kode_Kelas"]; ?>" readonly />
									</div>
							</div>
							<div class="form-group">
								<label>Kelas</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-university"></i>
										</div>
										<input name="Nama_Kelas" type="text" class="form-control" value="<?php echo $kelas["Nama_Kelas"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Angkatan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<select name="Kode_Angkatan_Kls" class="form-control">
											<?php
												
												$queryjrsjnj = mysqli_query($konek, "SELECT Kode_Angkatan_Kls, Kode_Angkatan, Nama_Angkatan FROM kelas INNER JOIN angkatan ON Kode_Angkatan_Kls = Kode_Angkatan WHERE Kode_Kelas='$Kode_Kelas'");
												if($queryjrsjnj == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));	
												}
												while($jnjjrs = mysqli_fetch_array($queryjrsjnj)){
													echo "<option value='$jnjjrs[Kode_Angkatan_Kls]' selected>$jnjjrs[Nama_Angkatan]</option>";
												}
												
												$queryjnj = mysqli_query($konek, "SELECT * FROM angkatan");
												if($queryjnj == false){
													die("Terdapat Kesalahan : ". mysqli_error($konek));
												}
												while($jnj = mysqli_fetch_array($queryjnj)){
													if($jnj["Kode_Angkatan"]!=$kelas["Kode_Angkatan_Kls"]){
														echo "<option value='$jnj[Kode_Angkatan]'>$jnj[Nama_Angkatan]</option>";
													}
												}
											?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Semester</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select name="Semester" class="form-control">
											<option value="<?php echo $kelas["Semester"]; ?>"></option>
											<option value="0">0</option>
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