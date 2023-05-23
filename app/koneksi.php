<?php
    $hostname = "db";
    $username = "root";
    $password = "MYSQL_ROOT_PASSWORD";
    $db = "mylibrary";
    $koneksi = mysqli_connect($hostname,$username,$password);
    mysqli_select_db($koneksi,$db);
    if(!$koneksi){
        echo "koneksi gagal";
    }