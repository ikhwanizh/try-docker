<?php
    include "header.php";
    $koneksi=mysqli_connect("localhost","root","ikhwan","mylibrary");
        $id         = $_GET['id'];
        $query=mysqli_query($koneksi,"select * from member_siswa where nisn = '$id'");
        $ambil_data=mysqli_fetch_assoc($query);
        $nisn=$ambil_data['nisn'];
        $nama_siswa=$ambil_data['nama_siswa'];
        $jenis_kelamin=$ambil_data['jenis_kelamin'];
        $alamat=$ambil_data['alamat'];
        $no_hp=$ambil_data['no_hp'];
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
                            <form action="simpanupdate_siswa.php" method="POST">
                                <div class="form-group mt-2">
                                    <input type="hidden" class="form-control mb-2" value=<?php echo $nisn ?> name="nisn">
                                    <label for="">NISN</label>
                                    <input type="text" class="form-control mb-2" value=<?php echo $nisn ?> name="nisnview" disabled>
                                    <label for="">Nama Siswa</label>
                                    <input type="text" class="form-control mb-2" value="<?php echo $nama_siswa ?>" name="nama_siswa">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin">
                                        <?php if ($jenis_kelamin == "Laki-laki") {
                                            echo '<option value="Laki-laki" selected>Laki-laki</option>';
                                            echo '<option value="Perempuan">Perempuan</option>';
                                        }else{
                                            echo '<option value="Laki-laki">Laki-laki</option>';
                                            echo '<option value="Perempuan" selected>Perempuan</option>';
                                        }
                                        ?>
                                    
                                    </select><br>
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control mb-2" value="<?php echo $alamat ?>" name="alamat">
                                    <label for="">Nomer HP</label>
                                    <input type="text" class="form-control" value="<?php echo 
                                    $no_hp ?>" name="no_hp">
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