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
                            <form action="">
                                <div class="form-group mt-2">
                                    <label for="">Kode Kategori</label>
                                    <input type="text" class="form-control" placeholder="Kode Kategori">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="">Nama Kategori</label>
                                    <input type="text" class="form-control" placeholder="Nama Kategori">
                                </div>
                                <input type="submit" name="" class="btn btn-primary mt-2" value="Simpan">
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