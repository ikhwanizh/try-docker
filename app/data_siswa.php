<?php
    include "header.php";
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12" style="min-height: 545px;">
        <div class="card">
        <div class="card-header">
            Data Siswa
        </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <a href="tambah_siswa.php" class="btn btn-primary">Tambah Data</a>
                    </div>
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
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Nomer HP</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                                if (isset($_GET['cari'])){
                                    $keyword=$_GET['keyword'];
                                    $query=mysqli_query($koneksi,"select * from member_siswa where nama_siswa like '%$keyword%'"); 
                                }else{
                                    $query=mysqli_query($koneksi,"select * from member_siswa");
                                }
                                $no=1;
                                while($ambil_data=mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $ambil_data['nisn']; ?></td>
                                <td><?php echo $ambil_data['nama_siswa']; ?></td>
                                <td><?php echo $ambil_data['jenis_kelamin']; ?></td>
                                <td><?php echo $ambil_data['alamat']; ?></td>
                                <td><?php echo $ambil_data['no_hp']; ?></td>
                                <td><a href="edit_siswa.php?op=edit&id=<?php echo $ambil_data['nisn']; ?>" class="btn btn-warning">Edit</a>
                                <a href="hapus_siswa.php?op=delete&id=<?php echo $ambil_data['nisn']; ?>" class="btn btn-danger">Hapus</a></td>
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