<?php
    include "header.php";
    $koneksi=mysqli_connect("localhost","root","ikhwan","mylibrary");
        $id         = $_GET['id'];
        $query=mysqli_query($koneksi,"select * from kategori where id_kategori = '$id'");
        $ambil_data=mysqli_fetch_assoc($query);
        $id_kategori=$ambil_data['id_kategori'];
        $nama_kategori=$ambil_data['nama_kategori'];
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
                            <form action="simpanupdate_kategori.php" method="POST">
                                <div class="form-group mt-2">
                                    <input type="hidden" class="form-control mb-2" value=<?php echo $id_kategori ?> name="id_kategori">
                                    <label for="">ID Kategori</label>
                                    <input type="text" class="form-control mb-2" value=<?php echo $id_kategori ?> name="id_kategoriview" disabled>
                                    <label for="">Nama Kategori</label>
                                    <input type="text" class="form-control mb-2" value="<?php echo $nama_kategori ?>" name="nama_kategori">
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