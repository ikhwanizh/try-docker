<?php
    include "header.php";
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12" style="min-height: 545px;">
        <div class="card">
        <div class="card-header">
            Data Peminjaman
        </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-auto">
                        <form action="" class="form-inlane float-right" method="GET">
                            <input type="text" class="form-control" name="keyword">
                            <input type="submit" class="btn btn-primary ml-2" name="cari" value="Cari">
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>NO</th>
                                <th>ID Peminjaman</th>
                                <th>Nama Peminjam</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Jatuh Tempo</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                                if (isset($_GET['cari'])){
                                    $keyword=$_GET['keyword'];
                                    $query=mysqli_query($koneksi,"select * from peminjaman join buku on buku.id_buku = peminjaman.id_buku where judul like '%$keyword%'"); 
                                }else{
                                    $query=mysqli_query($koneksi,"select * from peminjaman join buku on buku.id_buku = peminjaman.id_buku join member_siswa on member_siswa.nisn = peminjaman.nisn where status='Belum Dikembalikan'");
                                }
                                $no=1;
                                while($ambil_data=mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $ambil_data['id_peminjaman']; ?></td>
                                <td><?php echo $ambil_data['nama_siswa']; ?></td>
                                <td><?php echo $ambil_data['judul']; ?></td>
                                <td><?php echo $ambil_data['tanggal_pinjam']; ?></td>
                                <td><?php echo $ambil_data['tanggal_jatuh_tempo']; ?></td>
                                <td><a href="hapus_peminjaman.php?op=delete&id=<?php echo $ambil_data['id_peminjaman']; ?>" class="btn btn-danger">Kembalikan</a></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="col">
                        <a href="home.php" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<?php
    include "footer.html";
?>