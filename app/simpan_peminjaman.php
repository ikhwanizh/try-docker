<?php
    include "koneksi.php";
    $nisn=$_POST['nisn'];
    $id_buku=$_POST['id_buku'];
    $tanggal_pinjam=$_POST['tanggal_pinjam'];
    $tanggal_jatuh_tempo=date('Y-m-d', strtotime($tanggal_pinjam. ' + 7 days'));
    // echo $nisn;
    // echo $id_buku;
    // echo $tanggal_pinjam;
    // echo $tanggal_jatuh_tempo;

    $query=mysqli_query($koneksi,"insert into peminjaman (id_buku, nisn, tanggal_pinjam, tanggal_jatuh_tempo) values ('$id_buku','$nisn', '$tanggal_pinjam','$tanggal_jatuh_tempo')");
    header('location:data_peminjaman.php');