<?php
    include "header.php";
    $koneksi=mysqli_connect("localhost","root","ikhwan","mylibrary");
        $id         = $_GET['id'];
        $query=mysqli_query($koneksi,"select * from peminjaman join buku on buku.id_buku = peminjaman.id_buku join member_siswa on member_siswa.nisn = peminjaman.nisn where peminjaman.id_peminjaman = '$id'");
        $ambil_data=mysqli_fetch_assoc($query);
        $id_peminjaman=$ambil_data['id_peminjaman'];
        $id_buku=$ambil_data['id_buku'];
        $nisn=$ambil_data['nisn'];
        $tanggal_pinjam=$ambil_data['tanggal_pinjam'];
        $tanggal_jatuh_tempo=$ambil_data['tanggal_jatuh_tempo'];
        $nama_siswa=$ambil_data['nama_siswa'];
        $judul=$ambil_data['judul'];
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
                            <form action="simpanupdate_peminjaman.php" method="POST">
                                <div class="form-group mt-2">
                                    <input type="hidden" class="form-control mb-2" value=<?php echo $id_peminjaman ?> name="id_peminjaman">
                                    <label for="">ID Peminjaman</label>
                                    <input type="text" class="form-control mb-2" value=<?php echo $id_peminjaman ?> name="id_peminjamanview" disabled>
                                    <label for="">Nama Peminjam</label>
                                    <select name="nisn">
                                    <option value="<?=$nisn?>" selected><?=$nama_siswa?></option>
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
                                    <option value="<?=$id_buku?>" selected><?=$judul?></option>
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
                                    <input type="date" value="<?php echo $tanggal_pinjam ?>" name="tanggal_pinjam">
                                    <label for="">Tanggal Jatuh Tempo</label>
                                    <input type="date" value="<?php echo $tanggal_jatuh_tempo ?>" name="tanggal_jatuh_tempo">
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