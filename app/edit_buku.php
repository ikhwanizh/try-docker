<?php
    include "header.php";
    $koneksi=mysqli_connect("localhost","root","ikhwan","mylibrary");
        $id         = $_GET['id'];
        $query=mysqli_query($koneksi,"select * from buku join kategori on kategori.id_kategori = buku.id_kategori where buku.id_buku = '$id'");
        $ambil_data=mysqli_fetch_assoc($query);
        $id_buku=$ambil_data['id_buku'];;
        $isbn=$ambil_data['isbn'];
        $judul=$ambil_data['judul'];
        $kategori=$ambil_data['id_kategori'];
        $tahun_terbit=$ambil_data['tahun_terbit'];
        $jumlah=$ambil_data['jumlah'];
        $nama_kategori=$ambil_data['nama_kategori'];
?>
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12" style="min-height: 545px;">
            <div class="card">
                <div class="card-header">
                    Edit Data Siswa
                </div>
                <div class="card-body">
                    <div class="row" >
                        <div class="col">
                            <form action="simpanupdate_buku.php" method="POST">
                                <div class="form-group mt-2">
                                    <input type="hidden" class="form-control mb-2" value=<?php echo $id_buku ?> name="id_buku">
                                    <label for="">ID Buku</label>
                                    <input type="text" class="form-control mb-2" value=<?php echo $id_buku ?> name="id_bukuview" disabled>
                                    <label for="">ISBN</label>
                                    <input type="text" class="form-control" value="<?php echo $isbn ?>" name="isbn">
                                    <label for="">Judul Buku</label>
                                    <input type="text" class="form-control" placeholder="Judul Buku" value="<?php echo $judul ?>" name="judul">
                                    <label for="">Kategori</label>
                                    <select name="kategori">
                                    <option value="<?=$kategori?>" selected><?=$nama_kategori?></option> 
                                    <?php 
                                    $sql=mysqli_query($koneksi,"select * from kategori");
                                    while ($data=mysqli_fetch_array($sql)){
                                    ?>
                                    <option value="<?=$data['id_kategori']?>"><?=$data['nama_kategori']?></option> 
                                    <?php
                                    }   
                                    ?>
                                    </select>
                                    <br>
                                    <label for="">Tahun Terbit</label>
                                    <input type="text" class="form-control" placeholder="Tahun Terbit" value="<?php echo $tahun_terbit ?>" name="tahun_terbit">
                                    <label for="">Jumlah</label>
                                    <input type="text" class="form-control" placeholder="Jumlah" value="<?php echo $jumlah ?> "name="jumlah">
                                </div>
                                <input type="submit" class="btn btn-primary mt-2" value="Simpan">
                            </form>
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