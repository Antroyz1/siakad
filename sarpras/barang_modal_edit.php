<?php

include "../koneksi.php";

$Id_barang	= $_GET["Id_barang"];

$daftarhari[] = "Senin";
$daftarhari[] = "Selasa";
$daftarhari[] = "Rabu";
$daftarhari[] = "Kamis";
$daftarhari[] = "Jumat";
$daftarhari[] = "Sabtu";
$daftarhari[] = "Minggu";

$querylab = mysqli_query($konek, "SELECT * FROM sarpras WHERE Id_sarpras='$Id_sarpras'");
if($querylab == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($lab = mysqli_fetch_array($querylab)){

?>
	<link rel="stylesheet" href="../aset/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
	<script src="../aset/plugins/daterangepicker/moment.min.js"></script>
	<script src="../aset/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="../aset/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
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
	<!-- Date Time Picker -->
	<script>
		$(function (){
			$('#Jam_Mulai2').datetimepicker({
				format: 'HH:mm'
			});
			
			$('#Jam_Selesai2').datetimepicker({
				format: 'HH:mm'
			});
		});
	</script>
<!-- Modal Popup Dosen -->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Ubah Inventaris</h4>
					</div>
					<div class="modal-body">
						<form action="barang_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<input name="Id_barang" type="hidden" value="<?php echo "$lab[Id_sarpras]"; ?>">
							<div class="form-group">
								<label>No Inventaris</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-tachometer"></i>
										</div>
										<input name="no_inventaris" type="text" class="form-control" value="<?php echo $lab["no_sarpras"]; ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label>Nama Inventaris</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-archive"></i>
										</div>
										<input name="nama_barang" type="text" class="form-control" value="<?php echo $lab["namaBarang"]; ?>">
									</div>
							</div>
							<div class="form-group">
								<label>Jumlah</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-cart-plus"></i>
										</div>
										<input name="Jumlah" type="text" class="form-control" value="<?php echo $lab["jumlahBarang"]; ?>">
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