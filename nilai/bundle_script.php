
    <!-- jQuery 2.1.4 -->
    <script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="http://www.appelsiini.net/download/jquery.jeditable.mini.js"></script>
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
	<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
 </head>
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
		//NILAI
		$('#data').on('click', 'a.open_modal', function (e) {
	       e.preventDefault();

	        var m = $(this).attr("id");
					$.ajax({
						url: "nilai_modal_edit.php",
						type: "GET",
						data : {Id_Nilai: m,},
						success: function (ajaxData){
						$("#ModalEditNilai").html(ajaxData);
						$("#ModalEditNilai").modal('show',{backdrop: 'true'});
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
		//ip semester
		$('#data').on('click', 'a.open_modal', function (e) {
	       e.preventDefault();

	        var m = $(this).attr("id");
					$.ajax({
						url: "ipsms_modal_edit.php",
						type: "GET",
						data : {Id_kum: m,},
						success: function (ajaxData){
						$("#ModalEditIPSem").html(ajaxData);
						$("#ModalEditIPSem").modal('show',{backdrop: 'true'});
						}
					});
	 			} );
		});
		//mahasiswa
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

		//transkripNilai
		$('#data').on('click', 'a.transkrip_modal', function (e) {
	       e.preventDefault();

	        var m = $(this).attr("id");
					$.ajax({
						url: "transkrip_print.php",
						type: "GET",
						data : {NIM: m,},
						success: function (ajaxData){
						$("#ModalEditTranskrip").html(ajaxData);
						$("#ModalEditTranskrip").modal('show',{backdrop: 'true'});
						}
					});
	 			} );
		//kelas
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
	</script>
	
	<!-- Javascript Delete -->
	<script>
		function confirm_delete(delete_url){
			$("#modal_delete").modal('show', {backdrop: 'static'});
			document.getElementById('delete_link').setAttribute('href', delete_url);
		}
	</script>