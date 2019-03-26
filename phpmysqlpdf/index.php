<?php  
require_once "functions.php";

if(!isset($_SESSION['login'])){
	header('Location: login.php');
	exit;
}


// ambil data dari table mahassiwa
$mahasiswa = query("SELECT * FROM mahasiswa");

// jika tombol cari di klik
if(isset($_POST['cari'])){
	$mahasiswa = cari($_POST['keyword']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

	<title>Halaman Admin</title>
	<style>
		@media print{

		}
	</style>
	
</head>
<body>
	<div class="container">
		<h1 class="text-center">Daftar Mahasiswa</h1>
		<div class="row d-print-none">
			<div class="col-md-4">
				<a href="tambah.php" class="btn btn-info">Tambah Mahasiswa</a>
			</div>
			<div class="col-md-4">
				<form action="" method="post" class="float-left">
					<div class="input-group">
						<input type="text" class="form-control" aria-label="keyword" name="keyword" size="30" placeholder="masukkan keyword pencarian..." autofocus autocomplete="off">
						<div class="input-group-append">
							<button class="btn btn-secondary" type="submit" name="cari">Cari</button>			
						</div>
					</div>
				</form>	
			</div>
			<div class="col-md-4">
				<a href="logout.php" class="btn btn-warning float-right">Keluar</a>
			</div>
		</div>
		
		<div class="row my-4">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th class="d-print-none">Aksi</th>
						<th>Gambar</th>
						<th>NIM</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Jurusan</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1; 
					foreach($mahasiswa as $row): 
						?>
						<tr>
							<td><?=$no++;?></td>
							<td class="d-print-none">
								<a href="ubah.php?id=<?=$row['id'];?>" class="btn btn-sm btn-primary">ubah</a>
								<a href="hapus.php?id=<?=$row['id'];?>" onclick="return confirm('apakah anda yakin menghapus data ?')" class="btn btn-sm btn-danger">hapus</a>
							</td>
							<td>
								<img src="img/<?=$row['gambar'];?>" width="50">
							</td>
							<td><?=$row['nim'];?></td>
							<td><?=$row['nama'];?></td>
							<td><?=$row['email'];?></td>
							<td><?=$row['jurusan'];?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>