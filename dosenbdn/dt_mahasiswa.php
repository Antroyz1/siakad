				<thead>
					<tr>
						<th>No</th>
						<th>Nama Mahasiswa</th>
						<th>NPM</th>
						<th>Semester</th>
						<th>IP Semester</th>
						<th>IP Kumulatif</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
						$querynilai = mysqli_query ($konek, "SELECT NIM, Nama_Mahasiswa,Id_kum, Semester, NIM_kum_Mhs, IP_Sem, IP_kum FROM mahasiswa
							INNER JOIN ipkkumulatif ON NIM_kum_Mhs = NIM Where NIP_PA='$_SESSION[Userdisplay]' ORDER BY NIM DESC, Semester ASC");
						if($querynilai == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}

						while ($nilai = mysqli_fetch_array ($querynilai)){
								echo "
								<tr>
									<td>$no</td>
									<td>$nilai[Nama_Mahasiswa]</td>
									<td>$nilai[NIM]</td>
									<td>$nilai[Semester]</td>
									<td>$nilai[IP_Sem]</td>
									<td>$nilai[IP_kum]</td>
								</tr>";

								$no++;
						}
					?>
				</tbody>