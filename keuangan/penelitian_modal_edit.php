<?php

include "../koneksi.php";

$Id_penelitian	= $_GET["Id_penelitian"];

$querykelas = mysqli_query($konek, "SELECT * FROM penelitian WHERE Id_penelitian='$Id_penelitian'");
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
						<h4 class="modal-title">Ubah Penelitian / Buku </h4>
					</div>
					<div class="modal-body">
						<form action="penelitian_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>NIDN Peneliti</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-circle-o"></i>
										</div>
										<input type="hidden" name="Id_penelitian" class="form-control" value="<?php echo $kelas["Id_penelitian"]; ?>" >
										<input name="NIDN_Peneliti" type="text" class="form-control" value="<?php echo $kelas["NIDN_Peneliti"]; ?>" readonly />
									</div>
							</div>
							<div class="form-group">
								<label>Judul Penelitian/Buku</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input name="Judul_Penelitian" type="text" class="form-control" value="<?php echo $kelas["Judul_Penelitian"]; ?>" />
									</div>
							</div>
							<div class="form-group">
								<label>Tahun</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input name="Tahun" type="text" class="form-control" value="<?php echo $kelas["Tahun"]; ?>"/>
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