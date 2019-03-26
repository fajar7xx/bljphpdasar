<?php  
// belajar asosiative array dlu
// // key nya adalah string yang kita defenisikan sendiri
// $mahasiswa = [
// 	["Fajar siagian", "141112699", "fajar@mail.com", "TI"],
// 	["Fajar siag", "141132693", "fajar1@mail.com", "TI"],
// 	["Fajar ian", "141112677", "fajar12@mail.com", "TI"]
// ];
$mahasiswa = [
	[
	"nama" => "Fajar siagian", 
	"nim" => "141112699",
	"email" => "fajar@mail.com",
	"jurusan" => "Teknik Informatika",
	"gambar" => "fajar.jpg"
	],
	[
	"nama" => "Irfani Utari", 
	"nim" => "141222345",
	"email" => "fanil@mail.com",
	"jurusan" => "Akuntansi bisnis",
	"gambar" => "fani.jpg"
	]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" href="">
	<style>
		img{
			height: 100px;
			width: auto;
		}
	</style>
</head>
<body>
	<h1>Data Mahasiswa</h1>
	<?php foreach($mahasiswa as $mhs): ?>
	<ul>
		<li>Nama : <?=$mhs['nama'];?></li>
		<li>NIM : <?=$mhs['nim'];?></li>
		<li>Email : <?=$mhs['email'];?></li>
		<li>Jurusan : <?=$mhs['jurusan'];?></li>
		<li>
			<img src="img/<?=$mhs['gambar'];?>" alt="">
		</li>
	</ul>
	<?php endforeach; ?>
</body>
</html>