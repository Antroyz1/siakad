<?php

include "../koneksi.php";

$Kode_Angkatan	= $_GET["Kode_Angkatan"];

$queryangkatan = mysqli_query($konek, "SELECT * FROM angkatan WHERE Kode_Angkatan='$Kode_Angkatan'");
if($queryangkatan == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($angkatan = mysqli_fetch_array($queryangkatan)){

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
						<h4 class="modal-title">Ubah Angkatan</h4>
					</div>
					<div class="modal-body">
						<form action="angkatan_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Kode Angkatan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<input name="Kode_Angkatan" type="text" class="form-control" value="<?php echo $angkatan["Kode_Angkatan"]; ?>" readonly />
									</div>
							</div>
							<div class="form-group">
								<label>Angkatan</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<input name="Nama_Angkatan" type="text" class="form-control" value="<?php echo $angkatan["Nama_Angkatan"]; ?>"/>
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