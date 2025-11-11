<div style="width: 800px;margin: 0px auto;">
    <canvas id="myChartJK"></canvas>
  </div>
 
  <br/>
  <br/>

  <div style="width: 800px;margin: 0px auto;">
    <canvas id="myChartStrata"></canvas>
  </div>
 
  <br/>
  <br/>
 
  <script>
    var ctx = document.getElementById("myChartJK").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Pria", "Wanita"],
        datasets: [{
          label: '',
          data: [
          <?php 
          $jumlah_pria = mysqli_query($koneksi,"select * from pegawai where JK='L'");
          echo mysqli_num_rows($jumlah_pria);
          ?>, 
          <?php 
          $jumlah_wanita = mysqli_query($koneksi,"select * from pegawai where JK='P'");
          echo mysqli_num_rows($jumlah_wanita);
          ?>
          ],
          backgroundColor: [
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 99, 132, 0.2)'
          ],
          borderColor: [
          'rgba(54, 162, 235, 1)',
          'rgba(255,99,132,1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });

    var ctx1 = document.getElementById("myChartStrata").getContext('2d');
    var myChart1 = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["D3", "S1", "S2", "S3"],
        datasets: [{
          label: '',
          data: [
          <?php 
          $jumlah_amd = mysqli_query($koneksi,"select * from pegawai where Strata='D3'");
          echo mysqli_num_rows($jumlah_amd);
          ?>, 
          <?php 
          $jumlah_sarjana = mysqli_query($koneksi,"select * from pegawai where Strata='S1'");
          echo mysqli_num_rows($jumlah_sarjana);
          ?>, 
          <?php 
          $jumlah_master = mysqli_query($koneksi,"select * from pegawai where Strata='S2'");
          echo mysqli_num_rows($jumlah_master);
          ?>, 
          <?php 
          $jumlah_doktor = mysqli_query($koneksi,"select * from pegawai where Strata='S3'");
          echo mysqli_num_rows($jumlah_doktor);
          ?>
          ],
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>