<?php
    include "header.php";
    session_start();
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12" style="min-height: 545px;">
        <div class="card">
        <div class="card-header">
            Data Buku
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
                                <th>ID Buku</th>
                                <th>ISBN</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Tahun Terbit</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                                if (isset($_GET['cari'])){
                                    $keyword=$_GET['keyword'];
                                    $query=mysqli_query($koneksi,"select * from buku where judul like '%$keyword%'"); 
                                }else{
                                    $query=mysqli_query($koneksi,"select * from buku join kategori on kategori.id_kategori = buku.id_kategori");
                                }
                                $no=1;
                                while($ambil_data=mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $ambil_data['id_buku']; ?></td>
                                <td><?php echo $ambil_data['isbn']; ?></td>
                                <td><?php echo $ambil_data['judul']; ?></td>
                                <td><?php echo $ambil_data['nama_kategori']; ?></td>
                                <td><?php echo $ambil_data['tahun_terbit']; ?></td>
                                <td><?php echo $ambil_data['jumlah']; ?></td>
                                <form action="simpan_peminjaman.php" method="POST">
                                    <input type="hidden" name="id_buku" value="<?php echo $ambil_data['id_buku']; ?>">
                                    <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">  
                                    <input type="hidden" name="tanggal_pinjam" value="<?php echo date('Y-m-d'); ?>">
                                    <input type="hidden" name="tanggal_jatuh_tempo" value="<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 7 days')); ?>">
                                    <td><input type="submit" class="btn btn-primary" name="pinjam" value="Pinjam"></td>
                                </form>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>
                        <div class="col">
                            <a href="index.php" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<?php
    include "../footer.html";
?>