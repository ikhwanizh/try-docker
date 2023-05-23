<?php
    include "header.php";
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12" style="min-height: 545px;">
        <div class="card">
        <div class="card-header">
            Data Kategori
        </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <a href="" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="col-auto">
                        <form action="" class="form-inlane float-right">
                            <input type="text" class="form-control">
                        </form>
                    </div>
                    <div class="col-auto">
                        <form form action="" class="form-inlane float-right">
                            <input type="submit" class="btn btn-primary ml-2" value="Kirim">
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>No</th>
                                <th>Kode Kategori</th>
                                <th>Nama Kategori</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>K-001</td>
                                <td>Science</td>
                            </tr>
                        </table>
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