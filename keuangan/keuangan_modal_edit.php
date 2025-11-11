<?php

include "../koneksi.php";

$Id_Lunas	= $_GET["Id_Lunas"];

$querykelas = mysqli_query($konek, "SELECT * FROM lunas INNER JOIN mahasiswa ON NIM=NIM_Lunas WHERE Id_Lunas='$Id_Lunas'");
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
       $(function () {	
		// Daterange Picker
		  $('#Tanggal_Lunas').daterangepicker({
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
						<h4 class="modal-title">Edit SPP</h4>
					</div>
					<div class="modal-body">
						<form action="keuangan_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>NIM</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-address-card"></i>
										</div>
										<input name="Id_Lunas" type="hidden" value="<?php echo $kelas["Id_Lunas"]; ?>">
										<input name="NIM_Lunas" type="text" class="form-control" value="<?php echo $kelas["NIM_Lunas"]; ?>" readonly />
									</div>
							</div>
							<div class="form-group">
								<label>Nama Mahasiswa</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-university"></i>
										</div>
										<input name="Nama_Mahasiswa" type="text" class="form-control" value="<?php echo $kelas["Nama_Mahasiswa"]; ?>" readonly />
									</div>
							</div>
							<div class="form-group">
								<label>Semester</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input name="Semester_Lunas" type="text" class="form-control" value="<?php echo $kelas["Semester_Lunas"]; ?>" readonly />
									</div>
							</div>
							<div class="form-group">
								<label>Angsuran-1 </label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-money"></i>
										</div>
										<input name="Angsuran1" type="text" class="form-control" value="<?php echo $kelas["Angsuran1"]; ?>"/>
									</div>
							</div>
							
							<div class="form-group">
								<label>Tanggal Angsuran1 (YYYY-MM-DD)</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input id="Tanggal_Lahir2" name="Tanggal_Angsuran" type="text" class="form-control" value="<?php echo $kelas["Tanggal_Angsuran"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Angsuran 2</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-money"></i>
										</div>
										<input name="Angsuran2" type="text" class="form-control" value="<?php echo $kelas["Angsuran2"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Tanggal Angsuran 2 (YYYY-MM-DD)</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input id="Tanggal_Lunas" name="Tanggal_Lunas" type="text" class="form-control" value="<?php echo $kelas["Tanggal_Lunas"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Total</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-money"></i>
										</div>
										<input name="Total" type="text" class="form-control" value="<?php echo $kelas["Total"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Status</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<select name="Status" class="form-control" >
											<option value="Lunas">Lunas</option>
											<option  selected value="Belum Lunas">Belum Lunas</option>
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