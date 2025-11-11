<?php

session_start();
include "../../koneksi.php";


?>
<html>
	<head>
	 	<<title>STIKES Panca Bhakti Pontianak</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>
  		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4632180625303347"
     crossorigin="anonymous"></script>
	 </head>
 <body>
  <div class="container box">
   <h3 align="center">STIKES Panca Bhakti Pontianak</h3>
   <br />
   <div class="panel panel-default">
				<div class="panel-heading">Nilai Mahasiswa D3 Kebidanan</div>
				<div class="panel-body">
					<div class="table-responsive">
   <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
     <div class="form-group">
      <select name="filter_kelas" id="filter_kelas" class="form-control" required>
      	<option value="">Select Kelas</option>
       <?php
			$querykelas = mysqli_query($konek, "SELECT * FROM kelas");
			if($querykelas == false){
				die ("Terdapat Kesalahan : ". mysqli_error($konek));	
			}
			while($kelas = mysqli_fetch_array($querykelas)){
				echo "
					<option value='$kelas[Kode_Kelas]'>$kelas[Kode_Kelas]</option>";
			}
		?>
      </select>
     </div>
     <div class="form-group">
     	<select name="filter_Kode" id="filter_Kode" class="form-control" required>
     		<option value="">Select Kode Matkul</option>
       <?php
			$querymatkul = mysqli_query($konek, "SELECT * FROM matakuliah WHERE Kode_Jurusan_Matkul = 'D3BID' ORDER BY Semester_Matakuliah ASC");
			if($querymatkul == false){
				die ("Terdapat Kesalahan : ". mysqli_error($konek));	
			}
			while($matkul = mysqli_fetch_array($querymatkul)){
				echo "
					<option value='$matkul[Kode_Matakuliah]'>($matkul[Kode_Matakuliah] ) $matkul[Nama_Matakuliah] [$matkul[SKS]SKS]/Semester- $matkul[Semester_Matakuliah]</option>";
			}
		?>
      </select>
     </div>
     <div class="form-group" align="center">
      <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>
     </div>
    </div>
    <div class="col-md-4"></div>
   </div>
   <div class="table-responsive">
    					<table id="sample_data" class="table table-bordered table-striped">
     						<thead>
								<tr>
									<th>ID</th>
									<th>NIM </th>
									<th>Nama Mhs</th>
									<th>Kode Matkul</th>
									<th>Semester</th>
									<th>Kehadiran</th>
									<th>Tugas</th>
									<th>UTS</th>
									<th>UAS</th>
									<th>Total</th>
									<th>Nilai</th>
									<th>Mutu</th>
								</tr>
							</thead>
    					</table>
    <br />
    <br />
    <br />
   </div>
</div></div></div>
  </div>
 </body>
 </html>

<script type="text/javascript" language="javascript">
$(document).ready(function(){

  fill_datatable();

  function fill_datatable(filter_kelas = '', filter_Kode = '')
  {
    var dataTable = $('#sample_data').DataTable({
      "processing" : true,
      "serverSide" : true,
      "order" : [],
      "searching" : false,
      "ajax" : {
        url:"fetch.php",
        type:"POST",
        data:{ filter_kelas:filter_kelas, filter_Kode:filter_Kode }
      },
      createdRow:function(row, data, rowIndex)
      {
        $.each($('td', row), function(colIndex){
          if(colIndex == 1){ $(this).attr({'data-name':'NIM_krs_Mhs','class':'NIM_krs_Mhs','data-type':'text','data-pk':data[0]}); }
          if(colIndex == 2){ $(this).attr({'data-name':'Nama_Mahasiswa','class':'Nama_Mahasiswa','data-type':'text','data-pk':data[0]}); }
          if(colIndex == 3){ $(this).attr({'data-name':'Kode_Matakuliah_krs','class':'Kode_Matakuliah_krs','data-type':'text','data-pk':data[0]}); }
          if(colIndex == 4){ $(this).attr({'data-name':'Semester_Ambil','class':'Semester_Ambil','data-type':'text','data-pk':data[0]}); }
          if(colIndex == 5){ $(this).attr({'data-name':'Kehadiran','class':'Kehadiran','data-type':'text','data-pk':data[0]}); }
          if(colIndex == 6){ $(this).attr({'data-name':'Tugas','class':'Tugas','data-type':'text','data-pk':data[0]}); }
          if(colIndex == 7){ $(this).attr({'data-name':'UTS','class':'UTS','data-type':'text','data-pk':data[0]}); }
          if(colIndex == 8){ $(this).attr({'data-name':'UAS','class':'UAS','data-type':'text','data-pk':data[0]}); }
          if(colIndex == 9){ $(this).attr({'data-name':'Total','class':'Total','data-type':'text','data-pk':data[0]}); }
          if(colIndex == 10){ $(this).attr({'data-name':'Nilai','class':'Nilai','data-type':'text','data-pk':data[0]}); }
          if(colIndex == 11){ $(this).attr({'data-name':'Mutu','class':'Mutu','data-type':'text','data-pk':data[0]}); }
        });
      }
    });

    // semua kolom editable
    $('#sample_data').editable({ container:'body', selector:'td.Kehadiran', url:'update.php', title:'Kehadiran', type:'POST',
      validate:function(value){ if($.trim(value) == '') return 'This field is required'; }
    });
    $('#sample_data').editable({ container:'body', selector:'td.Tugas', url:'update.php', title:'Tugas', type:'POST',
      validate:function(value){ if($.trim(value) == '') return 'This field is required'; }
    });
    $('#sample_data').editable({ container:'body', selector:'td.UTS', url:'update.php', title:'UTS', type:'POST',
      validate:function(value){ if($.trim(value) == '') return 'This field is required'; }
    });
    $('#sample_data').editable({ container:'body', selector:'td.UAS', url:'update.php', title:'UAS', type:'POST',
      validate:function(value){ if($.trim(value) == '') return 'This field is required'; }
    });
    $('#sample_data').editable({ container:'body', selector:'td.Total', url:'update.php', title:'Total', type:'POST',
      validate:function(value){ if($.trim(value) == '') return 'This field is required'; }
    });
    $('#sample_data').editable({ container:'body', selector:'td.Nilai', url:'update.php', title:'Nilai', type:'POST',
      validate:function(value){ if($.trim(value) == '') return 'This field is required'; }
    });
    $('#sample_data').editable({ container:'body', selector:'td.Mutu', url:'update.php', title:'Mutu', type:'POST',
      validate:function(value){ if($.trim(value) == '') return 'This field is required'; }
    });

    // fungsi hitung total
    function hitungTotal(row){
      var kehadiran = parseInt($(row).find('td.Kehadiran').text()) || 0;
      var tugas     = parseInt($(row).find('td.Tugas').text()) || 0;
      var uts       = parseInt($(row).find('td.UTS').text()) || 0;
      var uas       = parseInt($(row).find('td.UAS').text()) || 0;
      var total = kehadiran + tugas + uts + uas;

      // update tampilan
      $(row).find('td.Total').text(total);

      // opsional update ke database
      $.post("update.php", {
        name: "Total",
        value: total,
        pk: $(row).find('td.Total').attr('data-pk')
      });
    }

    // event setelah edit salah satu kolom
    $('#sample_data').on('save', function(e, params){
      var row = $(params.$el).closest('tr');
      hitungTotal(row);
    });

  } // end fill_datatable

  // tombol filter
  $('#filter').click(function(){
    var filter_kelas = $('#filter_kelas').val();
    var filter_Kode = $('#filter_Kode').val();
    $('#sample_data').DataTable().destroy();
    if(filter_kelas != '' && filter_Kode != ''){
      fill_datatable(filter_kelas, filter_Kode);
    }else{
      alert('Select Both filter option');
      fill_datatable();
    }
  });

});
</script>