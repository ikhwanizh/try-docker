<?php
    include "koneksi.php";
    $nisn=$_POST['nisn'];
    $nama_siswa=$_POST['nama_siswa'];
    $jenis_kelamin=$_POST['jenis_kelamin'];
    $alamat=$_POST['alamat'];
    $no_hp=$_POST['no_hp'];
    $query=mysqli_query($koneksi,"insert into member_siswa values ('$nisn','$nama_siswa','$jenis_kelamin','$alamat','$no_hp')");
    header('location:data_siswa.php');