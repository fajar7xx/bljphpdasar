<?php  
require_once "functions.php";

if(!isset($_SESSION['login'])){
	header('Location: login.php');
	exit;
}

/////////////////
// pagination  //
// konfigurasi //
/////////////////
$jumlahDataPerHalaman = 4;

// cara pertama
// $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
// $jumlahData = mysqli_num_rows($result);

// cara kedua
$jumlahData = count(query("SELECT * FROM mahasiswa"));
// var_dump($jumlahData);

$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
// var_dump($jumlahHalaman);

// cara mengambil dan  mengetahui halaman aktif
// if(isset($_GET['halaman'])){
// 	$halamanAktif = $_GET['halaman'];
// }
// else{
// 	$halamanAktif = 1;
// }
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
// var_dump($halamanAktif);
// 
// halaman = 2, awal data = 5
// halaman = 3, awal data = 10

$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;


// ambil data dari table mahassiwa
$mahasiswa = query("SELECT * FROM mahasiswa  LIMIT $awalData, $jumlahDataPerHalaman");

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
	
</head>
<body>
	<div class="container">
		<h1 class="text-center">Daftar Mahasiswa</h1>
		<div class="row">
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
						<th>Aksi</th>
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
							<td>
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
			<!-- pagination -->
<!-- 			<?php if($halamanAktif > 1): ?>
				<a href="?halaman=<?=$halamanAktif - 1;?>">&laquo;</a>
			<?php endif; ?>
			
			<?php 
			for($i = 1; $i <= $jumlahHalaman; $i++): 
				if($i == $halamanAktif):
			?>
					<a href="?halaman=<?=$i;?>" class="text-danger"><?=$i;?></a>
			<?php  
				else:
			?>
					<a href="?halaman=<?=$i;?>"><?=$i;?></a>
			<?php 
				endif;
			endfor; 
			?>

			<?php if($halamanAktif < $jumlahHalaman): ?>
				<a href="?halaman=<?=$halamanAktif + 1;?>">&raquo;</a>
			<?php endif; ?> -->

			<nav aria-label="halaman">
				<ul class="pagination justify-content-end">
					<?php
						if($halamanAktif > 1):  
					?>
						<li class="page-item">
							<a href="?halaman=<?=$halamanAktif - 1;?>" class="page-link">Previous</a>
						</li>
					<?php  
						else:
					?>
						<li class="page-item disabled">
							<a href="#" class="page-link" tabindex="-1" aria-disabled="true">Previous</a>
						</li>
					<?php
						endif;  
						for($i=1; $i<= $jumlahHalaman; $i++):
							if($i == $halamanAktif):
					?>
							<li class="page-item active" aria-current="page">
								<a href="?halaman=<?=$i;?>" class="page-link">
									<?=$i;;?>
									<span class="sr-only">(current)</span>		
								</a>
							</li>
					
					<?php
							else:  
					?>
							<li class="page-item">
								<a href="?halaman=<?=$i;?>" class="page-link">
									<?=$i;;?>		
								</a>
							</li>		

					<?php
							endif;  
						endfor;
						if($halamanAktif < $jumlahHalaman):
					?>
						<li class="page-item">
							<a href="?halaman=<?=$halamanAktif + 1;?>" class="page-link">Next</a>
						</li>
					<?php  
						else:
					?>
						<li class="page-item disabled">
							<a href="#" class="page-link" tabindex="-1" aria-disabled="true">Next</a>
						</li>
					<?php  
						endif;
					?>
				</ul>
			</nav>
		</div>
	</div>

	<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>