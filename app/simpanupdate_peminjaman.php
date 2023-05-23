<?php
    include "koneksi.php";
    $id_peminjaman=$_POST['id_peminjaman'];
    $id_buku=$_POST['id_buku'];
    $nisn=$_POST['nisn'];
    $tanggal_pinjam=$_POST['tanggal_pinjam'];
    $tanggal_jatuh_tempo=$_POST['tanggal_jatuh_tempo'];
    $sql = "UPDATE peminjaman SET id_peminjaman = '$id_peminjaman', id_buku = '$id_buku', nisn='$nisn', tanggal_pinjam = '$tanggal_pinjam', tanggal_jatuh_tempo = '$tanggal_jatuh_tempo'WHERE id_peminjaman = '$id_peminjaman'";
    $query=mysqli_query($koneksi,$sql);
    header('location:data_peminjaman.php');