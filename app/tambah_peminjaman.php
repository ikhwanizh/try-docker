<?php
    include "header.php";
    $koneksi=mysqli_connect("localhost","root","ikhwan","mylibrary");
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12" style="min-height: 545px;">
            <div class="card">
                <div class="card-header">
                    Tambah Data Peminjaman
                </div>
                <div class="card-body">
                    <div class="row" >
                        <div class="col">
                            <form action="simpan_peminjaman.php" method="POST">
                                <div class="form-group mt-2">
                                    <label for="">Nama Peminjam</label>
                                    <select name="nisn">
                                    <?php 
                                    $sql=mysqli_query($koneksi,"select * from member_siswa");
                                    while ($data=mysqli_fetch_array($sql)){
                                    ?>
                                    <option value="<?=$data['nisn']?>"><?=$data['nisn']?> - <?=$data['nama_siswa']?></option> 
                                    <?php
                                    }   
                                    ?>
                                    </select><br>
                                    <label for="">Judul Buku</label>
                                    <select name="id_buku">
                                    <?php 
                                    $sql=mysqli_query($koneksi,"select * from buku");
                                    while ($data=mysqli_fetch_array($sql)){
                                    ?>
                                    <option value="<?=$data['id_buku']?>"><?=$data['id_buku']?> - <?=$data['judul']?></option> 
                                    <?php
                                    }   
                                    ?>
                                    </select><br>
                                    <label for="">Tanggal Peminjaman</label>
                                    <input type="date" name="tanggal_pinjam">
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