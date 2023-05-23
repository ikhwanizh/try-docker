<?php
    include "header.php";
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
                    <div class="col">
                        <a href="tambah_buku.php" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="col-auto">
                        <form action="" class="form-inlane float-right" method="GET">
                            <input type="text" class="form-control" name="keyword">
                            <input type="submit" class="btn btn-primary ml-2" name="cari" value="Cari">
                        </form>
                    </div>
                </div>
                <div class="row mt-3 ml-3 mr-3">
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
                                <td><a href="edit_buku.php?op=edit&id=<?php echo $ambil_data['id_buku']; ?>" class="btn btn-warning">Edit</a>
                                <a href="hapus_buku.php?op=delete&id=<?php echo $ambil_data['id_buku']; ?>" class="btn btn-danger">Hapus</a></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>
                        <div class="col">
                            <a href="data_kategori.php" class="btn btn-primary">Kategori Buku</a>
                        </div>
                        <br>
                        <div class="col">
                            <a href="home.php" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<?php
    include "footer.html";
?>