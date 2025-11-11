<?php

include "../koneksi.php";

$Id_detail	= $_GET["Id_detail"];

$daftarhari[] = "Senin";
$daftarhari[] = "Selasa";
$daftarhari[] = "Rabu";
$daftarhari[] = "Kamis";
$daftarhari[] = "Jumat";
$daftarhari[] = "Sabtu";
$daftarhari[] = "Minggu";

$querypinjam = mysqli_query($konek, "SELECT Id_detail, Id_barang_pinjam, jumlah_barang_pinjam, NIM_peminjam, Kode_matkulPinjam, tgl_pinjam, tgl_kembali, no_inventaris, nama_barang, NIM, Nama_Mahasiswa, Kode_Kelas_Mhs, Semester_Aktif, Kode_Matakuliah, Nama_Matakuliah 
							FROM detail_pinjam 
							INNER JOIN baranglab ON Id_barang=Id_barang_pinjam
							INNER JOIN matakuliah ON Kode_Matakuliah = Kode_matkulpinjam 
							INNER JOIN mahasiswa ON NIM_Peminjam=NIM WHERE Id_detail='$Id_detail' ORDER BY Id_detail ASC");
if($querypinjam == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($pinjam = mysqli_fetch_array($querypinjam)){

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
			  format: 'YYYY-MM-DD',
			  minDate: <?php echo $pinjam["tgl_pinjam"]; ?>,
			  orientation: "auto right"
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
						<h4 class="modal-title">Pengembalian</h4>
					</div>
					<div class="modal-body">
						<form action="peminjam_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<input name="Id_detail" type="hidden" value="<?php echo "$pinjam[Id_detail]"; ?>">
							<div class="form-group">
								<label>Tanggal Kembali</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input id="Tanggal_Lahir2" name="tgl_kembali" type="text" class="form-control" placeholder="Tanggal Pinjam">
									</div>
							</div>
							<div class="form-group">
								<label>Peminjam</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-users"></i>
										</div>
										<input name="NIM_Peminjam" type="text" class="form-control" value="<?php echo $pinjam["NIM_peminjam"]; ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label>Kode Mata kuliah</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input name="Kode_matkulpinjam" type="text" class="form-control" value="<?php echo $pinjam["Kode_matkulPinjam"]; ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label>Nama Barang</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input name="nama_barang" type="text" class="form-control" value="<?php echo $pinjam["nama_barang"]; ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label>Jumlah</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-columns"></i>
										</div>
										<input name="jumlah_barang_pinjam" type="text" class="form-control" value="<?php echo $pinjam["jumlah_barang_pinjam"]; ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label>Tanggal Pinjam</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input id="Tanggal_Lahir" name="tgl_pinjam" type="text" class="form-control" value="<?php echo $pinjam["tgl_pinjam"]; ?>" readonly>
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