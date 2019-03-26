<?php
require_once "functions.php";

if(!isset($_SESSION['login'])){
	header('Location: login.php');
	exit;
}

$id = $_GET['id'];

$mhs = query("SELECT * FROM mahasiswa WHERE id = '$id'")[0];
// var_dump($mhs['nama']);

// cek apakah tombol submit sudah ditekan ata belum
if(isset($_POST['submit'])){

	if(ubah($_POST) > 0){
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href='index.php';
			</script>
		";
	}
	else{
		echo "
			<script>
				alert('data gagal diubah');
			</script>
		";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	
	<title>Tambah Data Mahassswa</title>
</head>
<body>
	<div class="container">
		<h1>Ubah data mahasiswa</h1>
		<div class="row">
			<div class="card w-50 p-1 mb-4">
				<form action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?=$mhs['id'];?>">
					<input type="hidden" name="gambarLama" value="<?=$mhs['gambar'];?>">
					<div class="form-group">
						<label for="nim">NIM : </label>
						<input type="text" class="form-control" name="nim" id="nim" required value="<?=$mhs['nim'];?>">
					</div>
					<div class="form-group">
						<label for="nama">Nama : </label>
						<input type="text" class="form-control" name="nama" id="nama" required value="<?=$mhs['nama'];?>">
					</div>
					<div class="form-group">
						<label for="email">email : </label>
						<input type="email" class="form-control" name="email" id="email" required value="<?=$mhs['email'];?>">
					</div>
					<div class="form-group">
						<label for="jurusan">jurusan : </label>
						<input type="text" class="form-control" name="jurusan" id="jurusan" required value="<?=$mhs['jurusan'];?>">
					</div>
					<div class="form-group">
						<label for="jurusan">jurusan : </label>
						<input type="text" class="form-control" name="jurusan" id="jurusan" required value="<?=$mhs['jurusan'];?>">
					</div>
					<div class="form-group">
						<label for="gambar">gambar : </label><br>
						<img src="img/<?=$mhs['gambar'];?>" width="100"><br>
						<input type="file" class="form-control-file" name="gambar" id="gambar">
					</div>
	
					<div class="float-right">
						<button type="submit" class="btn btn-primary" name="submit">Ubah Data !</button>
						<a href="index.php" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>