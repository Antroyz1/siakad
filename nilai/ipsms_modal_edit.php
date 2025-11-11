<?php

include "../koneksi.php";

$Id_kum	= $_GET["Id_kum"];

$daftarsikap[] = "A";
$daftarsikap[] = "B";
$daftarsikap[] = "C";
$daftarsikap[] = "D";
$daftarsikap[] = "E";
$bobot=0;
$querykum = mysqli_query($konek, "SELECT * FROM ipkkumulatif WHERE Id_kum='$Id_kum'");
if($querykum == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($qkum = mysqli_fetch_array($querykum)){
	$nim=$qkum['NIM_kum_Mhs'];
	$SA=$qkum['Semester'];
	$querybobot= mysqli_query($konek,"SELECT Id_krs, Mutu FROM krs WHERE NIM_krs_Mhs='$nim' AND Semester_Ambil='$SA'");
	if($querybobot == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
	}
		while($qbot = mysqli_fetch_array($querybobot)){
			$bobot+=(floatval($qbot['Mutu']));
	}
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
						<h4 class="modal-title">Edit IP Semester</h4>
					</div>
					<div class="modal-body">
						<form action="ipsms_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<input type="hidden" name="Id_kum" value="<?php echo $qkum["Id_kum"]; ?>">
							<div class="form-group">
								<label>NPM</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="NIM" type="text" class="form-control" value="<?php echo $qkum["NIM_kum_Mhs"]; ?>" readonly/>
									</div>
							</div>
							<div class="form-group">
								<label>Semester</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="Semester" type="text" class="form-control" value="<?php echo $qkum["Semester"]; ?>" readonly/>
									</div>
							</div>
							<div class="form-group">
								<label>SKS</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="SKS_kum" type="text" class="form-control" value="<?php echo $qkum["SKS_kum"]; ?>" readonly/>
									</div>
							</div>
							<div class="form-group">
								<label>IP Sem.</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<?php 
											$ipksms=number_format(($bobot/$qkum["SKS_kum"]),2);?>
										<input name="IP_Sem" type="text" class="form-control" value="<?php echo $ipksms; ?>" readonly/>
									</div>
							</div>
							<div class="form-group">
								<label>IP Kumulatif</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<?php 
										$bobotu=0;
										$skum=0;
										$queryipkum = mysqli_query($konek,"SELECT Id_krs, Mutu, SKS_krs, Kode_Matakuliah_krs, Status FROM krs WHERE NIM_krs_Mhs='$nim' AND Semester_Ambil<='$SA' "); 
										if($queryipkum == false){
											die ("Terjadi Kesalahan : ". mysqli_error($konek));
											}
										while($qipkum = mysqli_fetch_array($queryipkum)){
											$bobotu+=(floatval($qipkum['Mutu']));
											$skum+=($qipkum['SKS_krs']);}
											$ipkkum=number_format(($bobotu/$skum),2);?>
										<input name="Ipkkum" type="text" class="form-control" value="<?php echo $ipkkum; ?>" readonly/>
									</div>
							</div>
							<div class="form-group">
								<label>Sikap</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select name="Sikap" class="form-control">
											<option selected>Pilih Sikap</option>
											<option value="Baik">Baik</option>
											<option value="Cukup">Cukup</option>
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