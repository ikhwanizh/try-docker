<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>MyLibrary</title>
    <script type="text/javascript" src="/chartjs/Chart.js"></script>
  </head>
  <body>
    <?php
      include "koneksi.php";
    ?>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="#">MyLibrary</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Data Master
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="data_buku.php">Buku</a></li>
                  <li><a class="dropdown-item" href="data_kategori.php">Kategori</a></li>
                  <li><a class="dropdown-item" href="data_siswa.php">Siswa</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Transaksi
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="data_buku.php">Peminjaman</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<!-- //navbar -->

      <!--Content-->
      <div class="container">
          <div class="row">
              <div class="col-lg-12 mt-2">
                <div class="bg-light p-5 rounded-lg m-3">
                    <h1 class="display-4">Selamat Datang</h1>
                    <p class="lead">Aplikasi manajemen perpustakaan sekolah berbasis web</p>
                </div>
              </div>
          </div>
          <!--Content Table-->
          <div class="row m-3">
                    <div class="col">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>NO</th>
                                <th>Judul</th>
                                <th>Rating (1-5)</th>
                                <th>Jumlah Peminjaman</th>
                                <th>Bobot</th>
                            </tr>
                            <?php
                              $queryTotal=mysqli_query($koneksi,"select COUNT(peminjaman.id_peminjaman) as jumlah_peminjaman from peminjaman");
                              $ambil_data=mysqli_fetch_array($queryTotal);
                            ?>
                            <?php
                                $query=mysqli_query($koneksi,"select buku.id_buku,
                                buku.judul, 
                                AVG(peminjaman.rating) as rating, 
                                COUNT(peminjaman.id_buku) as jumlah_peminjaman, 
                                COUNT(peminjaman.id_peminjaman) as jumlah,
                                (((AVG(peminjaman.rating)/5)*60/100) + ((COUNT(peminjaman.id_peminjaman)/". $ambil_data[0] .")*40/100)) as weight 
                                from buku left join peminjaman on peminjaman.id_buku = buku.id_buku 
                                where peminjaman.id_peminjaman IS NOT NULL 
                                Group by buku.id_buku 
                                ORDER BY weight DESC 
                                limit 5");
                                $no=1;
                                while($ambil_data=mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $ambil_data['judul']; ?></td>
                                <td><?php echo round($ambil_data['rating'],1) ?></td>
                                <td><?php echo $ambil_data['jumlah_peminjaman']; ?></td>
                                <td><?php echo round($ambil_data['weight'],2) ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
          <!--Chart-->
          <div style="width: 700px;margin: 0px auto;">
            <canvas id="myChart"></canvas>
          </div>
          <div class="row"  style="min-height: 250px;">
              <div class="col">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Peminjaman</h5>
                      <p class="card-text">
                      <?php
                        $koneksi=mysqli_connect("localhost","root","ikhwan","mylibrary");
                        $sql = "SELECT * from peminjaman where status='Belum Dikembalikan'";
                        if ($result = mysqli_query($koneksi, $sql)) {
                        
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf("Jumlah transaksi peminjaman :  %d\n", $rowcount);
                         }
                      ?>
                      </p>
                      <a href="data_peminjaman.php" class="btn btn-primary">Peminjaman</a>
                    </div>
                  </div>
              </div>
              <div class="col">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Pengembalian</h5>
                      <p class="card-text">
                      <?php
                        $koneksi=mysqli_connect("localhost","root","ikhwan","mylibrary");
                        $sql = "SELECT * from peminjaman where status='Belum Dikembalikan'";
                        if ($result = mysqli_query($koneksi, $sql)) {
                        
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf("Jumlah buku yang belum dikembalikan :  %d\n", $rowcount);
                         }
                      ?>
                      </p>
                      <a href="data_pengembalian.php" class="btn btn-primary">Pengembalian</a>
                    </div>
                  </div>
              </div>
              <div class="col">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Data Buku</h5>
                      <p class="card-text">
                      <?php
                        $koneksi=mysqli_connect("localhost","root","ikhwan","mylibrary");
                        $sql = "SELECT * from buku";
                        if ($result = mysqli_query($koneksi, $sql)) {
                        
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf("Jumlah judul buku yang tersedia :  %d\n", $rowcount);
                         }
                      ?>
                      </p>
                      <a href="data_buku.php" class="btn btn-primary">Data Buku</a>
                    </div>
                  </div>
              </div>
              <div class="col">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Data Siswa</h5>
                      <p class="card-text">
                      <?php
                        $koneksi=mysqli_connect("localhost","root","ikhwan","mylibrary");
                        $sql = "SELECT * from member_siswa";
                        if ($result = mysqli_query($koneksi, $sql)) {
                        
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf("Jumlah data member siswa :  %d\n", $rowcount);
                         }
                      ?>
                      </p>
                      <a href="data_siswa.php" class="btn btn-primary">Data Siswa</a>
                    </div>
                  </div>
              </div>
          </div>
      </div>

      <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
				datasets: [{
					label: 'Jumlah Peminjaman Per Bulan',
					data: [
					<?php
					$jumlah_januari = mysqli_query($koneksi,"SELECT * FROM `peminjaman` WHERE MONTH(tanggal_pinjam) = 1");
					echo mysqli_num_rows($jumlah_januari);
					?>,
					<?php 
					$jumlah_februari = mysqli_query($koneksi,"SELECT * FROM `peminjaman` WHERE MONTH(tanggal_pinjam) = 2");
					echo mysqli_num_rows($jumlah_februari);
					?>,
					<?php
					$jumlah_maret = mysqli_query($koneksi,"SELECT * FROM `peminjaman` WHERE MONTH(tanggal_pinjam) = 3");
					echo mysqli_num_rows($jumlah_maret);
					?>,
					<?php
					$jumlah_april = mysqli_query($koneksi,"SELECT * FROM `peminjaman` WHERE MONTH(tanggal_pinjam) = 4");
					echo mysqli_num_rows($jumlah_april);
					?>,
					<?php
					$jumlah_mei = mysqli_query($koneksi,"SELECT * FROM `peminjaman` WHERE MONTH(tanggal_pinjam) = 5");
					echo mysqli_num_rows($jumlah_mei);
					?>,
					<?php
					$jumlah_juni = mysqli_query($koneksi,"SELECT * FROM `peminjaman` WHERE MONTH(tanggal_pinjam) = 6");
					echo mysqli_num_rows($jumlah_juni);
					?>,
					<?php
					$jumlah_juli = mysqli_query($koneksi,"SELECT * FROM `peminjaman` WHERE MONTH(tanggal_pinjam) = 7");
					echo mysqli_num_rows($jumlah_juli);
					?>,
					<?php
					$jumlah_agustus = mysqli_query($koneksi,"SELECT * FROM `peminjaman` WHERE MONTH(tanggal_pinjam) = 8");
					echo mysqli_num_rows($jumlah_agustus);
					?>,
					<?php
					$jumlah_september = mysqli_query($koneksi,"SELECT * FROM `peminjaman` WHERE MONTH(tanggal_pinjam) = 9");
					echo mysqli_num_rows($jumlah_september);
					?>,
					<?php
					$jumlah_oktober = mysqli_query($koneksi,"SELECT * FROM `peminjaman` WHERE MONTH(tanggal_pinjam) = 10");
					echo mysqli_num_rows($jumlah_oktober);
					?>,
					<?php
					$jumlah_november = mysqli_query($koneksi,"SELECT * FROM `peminjaman` WHERE MONTH(tanggal_pinjam) = 11");
					echo mysqli_num_rows($jumlah_november);
					?>,
					<?php
					$jumlah_desember = mysqli_query($koneksi,"SELECT * FROM `peminjaman` WHERE MONTH(tanggal_pinjam) = 12");
					echo mysqli_num_rows($jumlah_desember);
					?>,
					],
					backgroundColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
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

      <!--Footer-->
      <footer class="mt-2 bg-dark p-3 text-center" style="color: white; font-weight: bold;">
          <p>
              MyLibrary &copy; 2022
          </p>
      </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>