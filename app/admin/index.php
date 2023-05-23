<!DOCTYPE html>
<html>
<head>
	<title>MyLibrary</title>
    <script type="text/javascript" src="/chartjs/Chart.js"></script>
</head>
<body>
    <style type="text/css">
        body{
            font-family: roboto;
        }
    
        table{
            margin: 0px auto;
        }
	</style>
 
	<?php 
	include '../koneksi.php';
	?>
	<h2>Halaman Admin</h2>
	
	<br/>
 
	<!-- cek apakah sudah login -->
	<?php 
	session_start();
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
	?>
 
	<h4>Selamat datang, <?php echo $_SESSION['username']; ?>! anda telah login.</h4>
 
	<br/>
	<br/>

    <div style="width: 700px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
 
	<br/>
	<br/>
 
	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>ISBN</th>
				<th>Judul Buku</th>
				<th>Tahun Terbit</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$data = mysqli_query($koneksi,"select * from buku");
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['isbn']; ?></td>
					<td><?php echo $d['judul']; ?></td>
					<td><?php echo $d['tahun_terbit']; ?></td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>

    <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
				datasets: [{
					label: '',
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
 
	<a href="logout.php">LOGOUT</a>
 
 
</body>
</html>