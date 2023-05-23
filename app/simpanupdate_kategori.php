<?php
    include "koneksi.php";
    $id_kategori=$_POST['id_kategori'];
    $nama_kategori=$_POST['nama_kategori'];
    $sql = "UPDATE kategori SET id_kategori='$id_kategori', nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori'";
    $query=mysqli_query($koneksi,$sql);
    header('location:data_kategori.php');