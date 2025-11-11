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
						<form action="lap_transkrip.php" name="modal_popup" enctype="multipart/form-data" method="post">
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
										<input name="Nama_Mahasiswa" type="text" class="form-control" value="<?php echo $mhs["Nama_Mahasiswa"]; ?>" readonly/>
									</div>
							</div>
							<div class="form-group">
                <label>Tempat Lahir</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-map-marker"></i>
                    </div>
                    <input name="Tempat_Lahir" type="text" class="form-control" value="<?php echo $mhs["Tempat_Lahir_Mhs"]; ?>" readonly/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input id="Tanggal_Lahir" name="Tanggal_Lahir" type="text" class="form-control" value="<?php echo $mhs["Tanggal_Lahir_Mhs"]; ?>" readonly/>
                  </div>
              </div>
              <div class="form-group">
                <label>Tanggal Yudisium</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input id="Tanggal_Lahir2" name="Tgl_Yudisium" type="text" class="form-control" placeholder="Tanggal Yudisium">
                  </div>
              </div>
							 <div class="form-group">
                <label>No. Seri Ijazah</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-certificate"></i>
                    </div>
                    <input name="No_Seri" type="text" class="form-control" placeholder="No Seri Ijazah"/>
                  </div>
              </div>
              <div class="form-group">
                <label>No. Register Ijazah</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-certificate"></i>
                    </div>
                    <input name="No_Reg" type="text" class="form-control" placeholder="No. Register Ijazah"/>
                  </div>
              </div>
							<div class="form-group">
                <label>Judul KTI</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-certificate"></i>
                    </div>
                    <input name="JudulKTI" type="text" class="form-control" placeholder="Judul KTI"/>
                  </div>
              </div>
               <div class="form-group">
                <label>Nilai Rata Ujian Tulis</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-server"></i>
                    </div>
                    <input name="UTul" type="text" class="form-control" placeholder="Nilai Rata2 Ujian Tulis"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Nilai Rata Ujian Praktik</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-server"></i>
                    </div>
                    <input name="UTek" type="text" class="form-control" placeholder="Nilai Rata2 Ujian Praktek"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Nilai Ujian KTI</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-server"></i>
                    </div>
                    <input name="UKti" type="text" class="form-control" placeholder="Nilai Ujian KTI"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Nilai Yudicium</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-server"></i>
                    </div>
                    <input name="Yudisium" type="text" class="form-control" placeholder="Nilai Yudisium"/>
                  </div>
              </div>
							<div class="modal-footer">
								<button class="btn btn-success" type="submit">
									Print
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