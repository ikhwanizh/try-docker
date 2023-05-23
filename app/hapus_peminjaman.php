<?php
    $koneksi=mysqli_connect("localhost","root","ikhwan","mylibrary");
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
    if($op == 'delete'){
        $id         = $_GET['id'];
        $sql1       = "Update peminjaman set status='Dikembalikan' where id_peminjaman = '$id'";
        $q1         = mysqli_query($koneksi,$sql1);
        if($q1){
            $sukses = "Berhasil update data";
        }else{
            $error  = "Gagal melakukan update data";
        }
    }
    header('location:data_pengembalian.php');