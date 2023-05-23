<!DOCTYPE html>
<html>
<head>
	<title>MyLibrary</title>	
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>MyLibrary</h1>
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}else if($_GET['pesan'] == "logout"){
      echo "<div class='alert'>Anda telah berhasil logout !</div>";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}
	}
	?>
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
 
		<form action="login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username" required="required">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password" required="required">
 
			<input type="submit" class="tombol_login" value="LOGIN">
		</form>
	</div>
</body>
</html>