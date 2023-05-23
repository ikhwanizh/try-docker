<?php
    include "../koneksi.php";
    session_start();
    $username=$_POST['username'];
    $result = mysqli_query($koneksi, "SELECT nisn FROM member_siswa LEFT JOIN user on member_siswa.user_id = user.id where user.username = '$username' ");
    $nisn = mysqli_fetch_array($result)[0];
    $id_buku=$_POST['id_buku'];
    $tanggal_pinjam=$_POST['tanggal_pinjam'];
    $tanggal_jatuh_tempo=date('Y-m-d', strtotime($tanggal_pinjam. ' + 7 days'));

    $query=mysqli_query($koneksi,"insert into peminjaman (id_buku, nisn, tanggal_pinjam, tanggal_jatuh_tempo) values ('$id_buku','$nisn', '$tanggal_pinjam','$tanggal_jatuh_tempo')");
    header('location:data_peminjaman.php');