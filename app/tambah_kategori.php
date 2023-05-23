<?php
    include "header.php";
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12" style="min-height: 545px;">
            <div class="card">
                <div class="card-header">
                    Tambah Data Kategori
                </div>
                <div class="card-body">
                    <div class="row" >
                        <div class="col">
                            <form action="simpan_kategori.php" method="POST">
                                <div class="form-group mt-2">
                                    <label for="">ID Kategori</label>
                                    <input type="text" class="form-control mb-2" placeholder="ID Kategori" name="id_kategori">
                                    <label for="">Nama Kategori</label>
                                    <input type="text" class="form-control" placeholder="Nama Kategori" name="nama_kategori">
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