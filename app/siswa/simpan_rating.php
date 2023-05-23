<?php
    include "../koneksi.php";
    $id_peminjaman=$_POST['id_peminjaman'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    $sql = "UPDATE peminjaman SET id_peminjaman = '$id_peminjaman', rating = '$rating', review = '$review' WHERE id_peminjaman = '$id_peminjaman'";
    $query=mysqli_query($koneksi,$sql);
    header('location:data_peminjaman.php');