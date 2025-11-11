				<thead>
					<tr>
						<th rowspan="2">SEMESTER</th>
						<th rowspan="2">NO</th>
						<th>KODE</th>
						<th>MATAKULIAH(COURSE TITLE)</th>
						<th>BOBOT</th>
						<th colspan="2">NILAI</th>
						<th>BOBOT</th>
						<th rowspan="3">IP</th>
						<th>Sikap</th>
						<th>Action</th>
					</tr>
					<tr>
						<th>MA</th>
						<th>KREDIT</th>
						<th>HURUG</th>
						<th>ANGKA</th>
						<th>X NILAI</th>
					</tr>
					<tr>
						<th>Smt Grade</th>
						<th>NUm</th>
						<th>Code</th>
						<th>Scu</th>
						<th>Grade</th>
						<th>Score</th>
						<th>Scu X Score</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						$totSLS=0;
						$queryip = mysqli_query ($konek, "SELECT * FROM matakuliah ");
						if($queryip == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$rowcount=mysqli_num_rows($queryip);

						while ($qip = mysqli_fetch_array ($queryip)){
								
							echo "
								<tr>
									<td>$qip[Semester]</td>
									<td>$no</td>
									<td>$qip[Kode_Matakuliah]</td>
									<td>$qip[Nama_Matakuliah]</td>
									<td>$qip[SKS]</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>";

								$no++;

						}
					?>
				</tbody>