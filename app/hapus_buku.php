<?php
    $koneksi=mysqli_connect("localhost","root","ikhwan","mylibrary");
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
    if($op == 'delete'){
        $id         = $_GET['id'];
        $sql1       = "delete from buku where id_buku = '$id'";
        $q1         = mysqli_query($koneksi,$sql1);
        if($q1){
            $sukses = "Berhasil hapus data";
        }else{
            $error  = "Gagal melakukan delete data";
        }
    }
    header('location:data_buku.php');