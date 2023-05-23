<?php
    include "koneksi.php";
    $id_buku=$_POST['id_buku'];
    $isbn=$_POST['isbn'];
    $judul=$_POST['judul'];
    $kategori=$_POST['kategori'];
    $tahun_terbit=$_POST['tahun_terbit'];
    $jumlah=$_POST['jumlah'];
    $sql = "UPDATE buku SET id_buku = '$id_buku', isbn = '$isbn', id_kategori = '$kategori', tahun_terbit = '$tahun_terbit', jumlah = '$jumlah' WHERE id_buku = '$id_buku'";
    $query=mysqli_query($koneksi,$sql);
    header('location:data_buku.php');