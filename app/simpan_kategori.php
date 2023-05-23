<?php
    include "koneksi.php";
    $id_kategori=$_POST['id_kategori'];
    $nama_kategori=$_POST['nama_kategori'];
    $query=mysqli_query($koneksi,"insert into kategori values ('$id_kategori','$nama_kategori')");
    header('location:data_kategori.php');