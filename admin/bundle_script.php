
    <!-- jQuery 2.1.4 -->
    <script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../aset/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../aset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../aset/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../aset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../aset/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../aset/dist/js/app.min.js"></script>
	<!-- Daterange Picker -->
	<script src="../aset/plugins/daterangepicker/moment.min.js"></script>
	<script src="../aset/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="../aset/plugins/select2/select2.full.min.js"></script>
	<script src="../aset/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<!-- page script -->
    <script>
      $(function () {	
		// Daterange Picker
		$('#Tanggal_Lahir').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			format: 'YYYY-MM-DD'
		});
		
		  // Data Table
        $("#data").dataTable({
			scrollX: true
		});		
      });
    </script>
	
	<!-- Date Time Picker -->
	<script>
		$(function (){
			$('#Jam_Mulai').datetimepicker({
				format: 'HH:mm'
			});
			
			$('#Jam_Selesai').datetimepicker({
				format: 'HH:mm'
			});
		});
	</script>
	
	<!-- Javascript Edit--> 
	<script type="text/javascript">
		$(document).ready(function () {
		
		// Dosen
		$('#data').on('click', 'a.open_modal', function (e) {
	       e.preventDefault();

	        var m = $(this).attr("id");
					$.ajax({
						url: "dosen_modal_edit.php",
						type: "GET",
						data : {NIP: m,},
						success: function (ajaxData){
						$("#ModalEditDosen").html(ajaxData);
						$("#ModalEditDosen").modal('show',{backdrop: 'true'});
						}
					});
	 			} );
		// User
		$('#data').on('click', 'a.open_modal', function (e) {
	       e.preventDefault();

	        var m = $(this).attr("id");
					$.ajax({
						url: "user_modal_edit.php",
						type: "GET",
						data : {Id_User: m,},
						success: function (ajaxData){
						$("#ModalEditUser").html(ajaxData);
						$("#ModalEditUser").modal('show',{backdrop: 'true'});
						}
					});
	 			} );
		// Mahasiswa
		$('#data').on('click', 'a.open_modal', function (e) {
	       e.preventDefault();

	        var m = $(this).attr("id");
					$.ajax({
						url: "mahasiswa_modal_edit.php",
						type: "GET",
						data : {NIM: m,},
						success: function (ajaxData){
						$("#ModalEditMahasiswa").html(ajaxData);
						$("#ModalEditMahasiswa").modal('show',{backdrop: 'true'});
						}
					});
	 			} );
			
		// Ruangan
		$('#data').on('click', 'a.open_modal', function (e) {
	       e.preventDefault();

	        var m = $(this).attr("id");
					$.ajax({
						url: "ruangan_modal_edit.php",
						type: "GET",
						data : {Kode_Ruangan: m,},
						success: function (ajaxData){
						$("#ModalEditRuangan").html(ajaxData);
						$("#ModalEditRuangan").modal('show',{backdrop: 'true'});
						}
					});
	 			} );
		

		// Matakuliah
		$('#data').on('click', 'a.open_modal', function (e) {
	       e.preventDefault();

	        var m = $(this).attr("id");
					$.ajax({
						url: "matakuliah_modal_edit.php",
						type: "GET",
						data : {Kode_Matakuliah: m,},
						success: function (ajaxData){
						$("#ModalEditMatakuliah").html(ajaxData);
						$("#ModalEditMatakuliah").modal('show',{backdrop: 'true'});
						}
					});
	 			} );
		
		// Kelas
		$('#data').on('click', 'a.open_modal', function (e) {
	       e.preventDefault();

	        var m = $(this).attr("id");
					$.ajax({
						url: "kelas_modal_edit.php",
						type: "GET",
						data : {Kode_Kelas: m,},
						success: function (ajaxData){
						$("#ModalEditKelas").html(ajaxData);
						$("#ModalEditKelas").modal('show',{backdrop: 'true'});
						}
					});
	 			} );
		
			
		// Angkatan
		$('#data').on('click', 'a.open_modal', function (e) {
	       e.preventDefault();

	        var m = $(this).attr("id");
					$.ajax({
						url: "angkatan_modal_edit.php",
						type: "GET",
						data : {Kode_Angkatan: m,},
						success: function (ajaxData){
						$("#ModalEditAngkatan").html(ajaxData);
						$("#ModalEditAngkatan").modal('show',{backdrop: 'true'});
						}
					});
	 			} );
			
		// Jadwal
		$('#data').on('click', 'a.open_modal', function (e) {
	       e.preventDefault();

	        var m = $(this).attr("id");
					$.ajax({
						url: "jadwal_modal_edit.php",
						type: "GET",
						data : {Id_Jadwal: m,},
						success: function (ajaxData){
						$("#ModalEditJadwal").html(ajaxData);
						$("#ModalEditJadwal").modal('show',{backdrop: 'true'});
						}
					});
	 			} );
		//krs
		$('#data').on('click', 'a.open_modal', function (e) {
	       e.preventDefault();

	        var m = $(this).attr("id");
					$.ajax({
						url: "krs_modal_edit.php",
						type: "GET",
						data : {Id_krs: m,},
						success: function (ajaxData){
						$("#ModalEditKRS").html(ajaxData);
						$("#ModalEditKRS").modal('show',{backdrop: 'true'});
						}
					});
	 			} );
		});
	</script>
	
	<!-- Javascript Delete -->
	<script>
		function confirm_delete(delete_url){
			$("#modal_delete").modal('show', {backdrop: 'static'});
			document.getElementById('delete_link').setAttribute('href', delete_url);
		}
	</script>