<?php  
// cek apaqkah tidak ada data di $_GET
// dengan asuksi semua variabel yang kita gunakan
if(!isset($_GET['nama']) || 
	!isset($_GET['nim']) ||
	!isset($_GET['jurusan']) ||
	!isset($_GET['email'])){
	// redirect
	header("Location: getpost1.php");
	// script dibawah biat tidak di eksekusi
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Detail Mahasiswa</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Detail Mahasiswa</h1>
	<ul>
		<li>Nama Lengkap : <?=$_GET['nama'];?></li>
		<li>NIM : <?=$_GET['nim'];?></li>
		<li>Email : <?=$_GET['email'];?></li>
		<li>Jurusan : <?=$_GET['jurusan'];?></li>
	</ul>
	<a href="getpost1.php">Kembali Ke daftar mahasiswa</a>
</body>
</html>