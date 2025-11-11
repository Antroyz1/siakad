<?php
include('koneksi.php');
require_once("aset/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$querykhsa = mysqli_query ($konek, "SELECT NIM, Nama_Mahasiswa, Kode_Kelas_Mhs, Semester_Aktif,NIP_PA,NIP, Nama_Pegawai FROM mahasiswa 
			INNER JOIN pegawai ON NIP=NIP_PA WHERE NIM='$_SESSION[Username]'");
			  if($querykhsa == false){
			 	die ("Terjadi Kesalahan :". mysqli_error($konek));
			 	}
$no = 1;
$kreditsks = 0;
$bobot=0;
$tgl=date('d/m/Y');
$khst=0;
$html = '<table style="width: 100%; border-spacing: 0.1px;" >
					<tr>
						<th rowspan="4"><img src="../aset/foto/logo.png" width="100px"></th>
						<th>AKADEMI KEBIDANAN PANCA BHAKTI PONTIANAK</th>
					</tr>
					<tr>
						<th>Jl.Ahmad Yani II, Komp.Akbid Panca Bhakti Pontianak, Kubu Raya 78391</th>						
					</tr>
					<tr>
						<th>Telp.(0561)6726777, Fax.(0561)711260</th>
					</tr>
					<tr>
						<th>E-mail : akbidpbpontianak@gmail.com</th>
					</tr>
				</table><br />';
$html .= '<center>
				<h1>Kartu Hasil Studi</h1>
				
				<br><br>
					<table cellpadding="3" style="width:90%;">';

while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$no."</td>
 <td>".$row['nama']."</td>
 <td>".$row['kelas']."</td>
 <td>".$row['alamat']."</td>
 </tr>";
 $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A5', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_siswa.pdf');
?>