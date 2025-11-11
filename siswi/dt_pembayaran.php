				<thead>
					<tr>
						<th>Mahasiswa</th>
						<th>Angkatan</th>
						<th>Semester</th>
						<th>Total Biaya</th>
						<th>Pembayaran</th>
						<th>Sisa</th>
						<th>Denda</th>
						<th>Keterangan</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
						$querypbyrn = mysqli_query ($konek, "SELECT Id_Pembayaran, Nim_Pembayaran, Kode_Angkatan_Pembayaran, Semester, Total_Biaya, Pembayaran, Sisa, Denda, Keterangan, NIM, Nama_Mahasiswa, Kode_Angkatan, Nama_Angkatan FROM pembayaran
										INNER JOIN mahasiswa ON Nim_Pembayaran=NIM
										INNER JOIN angkatan ON Kode_Angkatan_Pembayaran=Kode_Angkatan WHERE Nim_Pembayaran ='$_SESSION[Username]'");
						if($querypbyrn == false){
							
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($bayar = mysqli_fetch_array ($querypbyrn)){
							
							echo "
								<tr>
									<td>$bayar[Nama_Mahasiswa]</td>
									<td>$bayar[Nama_Angkatan]</td>
									<td>$bayar[Semester]</td>
									<td>$bayar[Total_Biaya]</td>
									<td>$bayar[Pembayaran]</td>
									<td>$bayar[Sisa]</td>
									<td>$bayar[Denda]</td>
									<td>$bayar[Keterangan]</td>
									
								</tr>";
						}
					?>
				</tbody>