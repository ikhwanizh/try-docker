<?php
    include "header.php";
    $koneksi=mysqli_connect("localhost","root","ikhwan","mylibrary");
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12" style="min-height: 545px;">
            <div class="card">
                <div class="card-header">
                    Tambah Data Buku
                </div>
                <div class="card-body">
                    <div class="row" >
                        <div class="col">
                            <form action="simpan_buku.php" method="POST">
                                <div class="form-group mt-2">
                                    <label for="">ID Buku</label>
                                    <input type="text" class="form-control mb-2" placeholder="ID Buku" name="id_buku">
                                    <label for="">ISBN</label>
                                    <input type="text" class="form-control" placeholder="ISBN" name="isbn">
                                    <label for="">Judul Buku</label>
                                    <input type="text" class="form-control" placeholder="Judul Buku" name="judul">
                                    <label for="">Kategori</label>
                                    <select name="kategori">
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
                                    <input type="text" class="form-control" placeholder="Tahun Terbit" name="tahun_terbit">
                                    <label for="">Jumlah</label>
                                    <input type="text" class="form-control" placeholder="Jumlah" name="jumlah">
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