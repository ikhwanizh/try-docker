<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>MyLibrary</title>
    <script type="text/javascript" src="/chartjs/Chart.js"></script>
  </head>
  <body>
    <?php
    session_start();
    ?>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="#">MyLibrary</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Transaksi
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="data_buku.php">Peminjaman</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!--Content-->
      <div class="container">
          <div class="row">
              <div class="col-lg-12 mt-2">
                <div class="bg-light p-5 rounded-lg m-3">
                    <h1 class="display-4">Selamat Datang</h1>
                    <p class="lead">Aplikasi manajemen perpustakaan sekolah berbasis web</p>
                </div>
              </div>
          </div>

          <div class="row"  style="min-height: 250px;">
              <div class="col">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Peminjaman</h5>
                      <p class="card-text">
                      <?php
                        $koneksi=mysqli_connect("db","root","MYSQL_ROOT_PASSWORD","mylibrary");
                        $sql = "SELECT * from peminjaman LEFT JOIN member_siswa ON peminjaman.nisn = member_siswa.nisn LEFT JOIN user on member_siswa.user_id = user.id where user.username = '$_SESSION[username]'";
                        if ($result = mysqli_query($koneksi, $sql)) {
                        
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf("Jumlah transaksi peminjaman :  %d\n", $rowcount);
                         }
                      ?>
                      </p>
                      <a href="data_peminjaman.php" class="btn btn-primary">Peminjaman</a>
                    </div>
                  </div>
              </div>
              <div class="col">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Data Buku</h5>
                      <p class="card-text">
                      <?php
                        $koneksi=mysqli_connect("db","root","MYSQL_ROOT_PASSWORD","mylibrary");
                        $sql = "SELECT * from buku";
                        if ($result = mysqli_query($koneksi, $sql)) {
                        
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf("Jumlah judul buku yang tersedia :  %d\n", $rowcount);
                         }
                      ?>
                      </p>
                      <a href="data_buku.php" class="btn btn-primary">Data Buku</a>
                    </div>
                  </div>
              </div>
          </div>
      </div>

      <!--Footer-->
      <footer class="mt-2 bg-dark p-3 text-center" style="color: white; font-weight: bold;">
          <p>
              MyLibrary &copy; 2022
          </p>
      </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>