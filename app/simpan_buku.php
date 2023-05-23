<?php
    include "koneksi.php";
    $id_buku=$_POST['id_buku'];
    $isbn=$_POST['isbn'];
    $judul=$_POST['judul'];
    $kategori=$_POST['kategori'];
    $tahun_terbit=$_POST['tahun_terbit'];
    $jumlah=$_POST['jumlah'];
    $query=mysqli_query($koneksi,"insert into buku values ('$id_buku','$isbn','$judul','$kategori','$tahun_terbit','$jumlah')");
    header('location:data_buku.php');
    // echo $id_buku;
    // echo $isbn;
    // echo $judul;
    // echo $id_kategori;
    // echo $tahun_terbit;
    // echo $jumlah;