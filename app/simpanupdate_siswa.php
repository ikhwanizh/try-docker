<?php
    include "koneksi.php";
    $nisn=$_POST['nisn'];
    $nama_siswa=$_POST['nama_siswa'];
    $jenis_kelamin=$_POST['jenis_kelamin'];
    $alamat=$_POST['alamat'];
    $no_hp=$_POST['no_hp'];
    $sql = "UPDATE member_siswa SET nama_siswa = '$nama_siswa', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', no_hp = '$no_hp' WHERE nisn = '$nisn'";
    $query=mysqli_query($koneksi,$sql);
    header('location:data_siswa.php');