<?php
    include "header.php";
    session_start();
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12" style="min-height: 545px;">
        <div class="card">
        <div class="card-header">
            Data Peminjaman
        </div>
            <div class="card-body">
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
                                    $query=mysqli_query($koneksi,"SELECT * from peminjaman join buku on buku.id_buku = peminjaman.id_buku LEFT JOIN member_siswa ON peminjaman.nisn = member_siswa.nisn LEFT JOIN user on member_siswa.user_id = user.id where user.username = '$_SESSION[username]'");
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
                                <td><a href="tambah_rating.php?op=edit&id=<?php echo $ambil_data['id_peminjaman']; ?>" class="btn btn-warning">Rating</a></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="col">
                        <a href="index.php" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<?php
    include "../footer.html";
?>