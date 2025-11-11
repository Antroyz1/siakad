<?php

include "../koneksi.php";

$Id_krs	= $_GET["Id_krs"];

$querykrs = mysqli_query($konek, "SELECT * FROM krs WHERE Id_krs='$Id_krs'");
if($querykrs == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($krs = mysqli_fetch_array($querykrs)){

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
						<h4 class="modal-title">Edit Kartu Rencana Studi</h4>
					</div>
					<div class="modal-body">
						<form action="mahasiswa_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>NIM</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="NIM_krs_Mhs" type="text" class="form-control" value="<?php echo $krs["NIM_krs_Mhs"]; ?>" readonly />
									</div>
							</div>
							<div class="form-group">
								<label>Kode Matakuliah</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="Kode_Matakuliah_krs" type="text" class="form-control" value="<?php echo $krs["Kode_Matakuliah_krs"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Semester</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select name="Semester_Ambil" class="form-control">
											<option>Semester Sekarang</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>SKS</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-phone"></i>
										</div>
										<input name="SKS_krs" type="text" class="form-control" value="<?php echo $sks["SKS"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Status</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select name="Status" class="form-control">
											<option selected>Status</option>
											<option value="Baru">Baru</option>
											<option value="Ulang">Ulang</option>
											<option value="Perbaikan">Perbaikan</option>
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