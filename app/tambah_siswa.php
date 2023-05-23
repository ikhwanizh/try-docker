<?php
    include "header.php";
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12" style="min-height: 545px;">
            <div class="card">
                <div class="card-header">
                    Tambah Data Siswa
                </div>
                <div class="card-body">
                    <div class="row" >
                        <div class="col">
                            <form action="simpan_siswa.php" method="POST">
                                <div class="form-group mt-2">
                                    <label for="">NISN</label>
                                    <input type="text" class="form-control mb-2" placeholder="NISN" name="nisn">
                                    <label for="">Nama Siswa</label>
                                    <input type="text" class="form-control mb-2" placeholder="Nama Siswa" name="nama_siswa">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    </select><br>
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control mb-2" placeholder="Alamat" name="alamat">
                                    <label for="">Nomer HP</label>
                                    <input type="text" class="form-control" placeholder="Nomer HP" name="no_hp">
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