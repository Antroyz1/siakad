<?php

include "../koneksi.php";

$NIM	= $_GET["NIM"];

$querymhs = mysqli_query($konek, "SELECT * FROM mahasiswa WHERE NIM='$NIM'");
if($querymhs == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($mhs = mysqli_fetch_array($querymhs)){

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
						<h4 class="modal-title">Edit Mahasiswa</h4>
					</div>
					<div class="modal-body">
						<form action="mahasiswa_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>NIM</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="NIM" type="text" class="form-control" value="<?php echo $mhs["NIM"]; ?>" readonly />
									</div>
							</div>
							<div class="form-group">
								<label>Mahasiswa</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="Nama_Mahasiswa" type="text" class="form-control" value="<?php echo $mhs["Nama_Mahasiswa"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Tempat Lahir</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-map-marker"></i>
										</div>
										<input name="Tempat_Lahir" type="text" class="form-control" value="<?php echo $mhs["Tempat_Lahir_Mhs"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Tanggal Lahir</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input id="Tanggal_Lahir2" name="Tanggal_Lahir" type="text" class="form-control" value="<?php echo $mhs["Tanggal_Lahir_Mhs"]; ?>">
									</div>
							</div>
							<div class="form-group">
								<label>No. Telp</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-phone"></i>
										</div>
										<input name="No_Telp" type="text" class="form-control" value="<?php echo $mhs["No_Telp_Mhs"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Alamat</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<input name="Alamat" type="text" class="form-control" value="<?php echo $mhs["Alamat_Mhs"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Kelas</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<select name="Kode_Kelas_Mhs" class="form-control">
										<?php
										
											$querymhsjrs=mysqli_query($konek, "SELECT Kode_Kelas_Mhs, Kode_Kelas, Kode_Kelas FROM mahasiswa INNER JOIN kelas ON Kode_Kelas_Mhs=Kode_Kelas WHERE NIM='$NIM'");
											if($querymhsjrs==false){
												die("Terdapat Kesalahan : ".mysqli_error($konek));
											}
											while($mhsjrs=mysqli_fetch_array($querymhsjrs)){
												echo "<option value=$mhsjrs[Kode_Kelas_Mhs] selected>$mhsjrs[Kode_Kelas]</option>";
											}
										
											$queryjrs = mysqli_query($konek, "SELECT * FROM kelas");
											if($queryjrs==false){
												die("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($jrs=mysqli_fetch_array($queryjrs)){
												if($jrs["Kode_Kelas"]!=$mhs["Kode_Kelas_Mhs"]){
													echo "<option value=$jrs[Kode_Kelas]>$jrs[Kode_Kelas]</option>";
												}
											}
											
										?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Nama PA</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<select name="NIP_PA" class="form-control">
											<?php
												
												$querynippa = mysqli_query($konek, "SELECT * FROM pegawai");
												if($querynippa == false){
													die ("Terdapat Kesalahan : ". mysqli_error($konek));	
												}
												while($nippa = mysqli_fetch_array($querynippa)){
													echo "
														<option value='$nippa[NIP]'>$nippa[Nama_Pegawai]</option>";
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
										<select name="Semester_Aktif" class="form-control">
											<option value="<?php echo $mhs["Semester_Aktif"]; ?>"></option>
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