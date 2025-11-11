<?php

include "../koneksi.php";

$Id_Nilai	= $_GET["Id_Nilai"];

$daftarnilai[] = "A";
$daftarnilai[] = "B";
$daftarnilai[] = "C";
$daftarnilai[] = "D";
$daftarnilai[] = "E";

$querynilai = mysqli_query($konek, "SELECT * FROM nilai INNER JOIN krs ON Id_krs=Id_Nilai_krs WHERE Id_Nilai='$Id_Nilai'");
if($querynilai == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($nilai = mysqli_fetch_array($querynilai)){
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
						<h4 class="modal-title">Edit Nilai</h4>
					</div>
					<div class="modal-body">
						<form action="nilai_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<input type="hidden" name="Id_Nilai" value="<?php echo $nilai["Id_Nilai"]; ?>">
							<div class="form-group">
								<label>Kode Matkul(SKS)</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="Kehadiran" type="text" class="form-control" value="<?php echo $nilai["Kode_Matakuliah_krs"]."(".$nilai["SKS_krs"]."SKS )"; ?>" readonly/>
									</div>
							</div>
							<div class="form-group">
								<label>Kehadiran</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="Kehadiran" type="text" class="form-control" value="<?php echo $nilai["Kehadiran"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Tugas</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="Tugas" type="text" class="form-control" value="<?php echo $nilai["Tugas"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>UTS</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="UTS" type="text" class="form-control" value="<?php echo $nilai["UTS"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>UAS Total</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="UAS" type="text" class="form-control" value="<?php echo $nilai["UAS"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Nilai</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<select name="Nilai" class="form-control">
										<?php
										
										echo "<option value='$nilai[Nilai]' selected>$nilai[Nilai]</option>";
											for($nilai=0; $nilai<count($daftarnilai); $nilai++){
												if($nilai["Nilai"] != $daftarnilai[$nilai])
												{
													echo "<option value='$daftarnilai[$nilai]'>$daftarnilai[$nilai]</option>";
												}
												
											}
										?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Mutu</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="Mutu" type="text" class="form-control" value="<?php echo $nilai["Mutu"]; ?>"/>
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