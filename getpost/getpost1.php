<?php  
	$mahasiswa = [
		[
			"nama" => "fajar setiawan siagian",
			"nim" => "141112699",
			"email" => "fajar@mail.com",
			"jurusan" => "teknik Informatika"
		],
		[
			"nama" => "irfani dwi utari",
			"nim" => "141332343",
			"email" => "fani@mail.com",
			"jurusan" => "akuntansi"
		]
	];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>get post</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
	<?php foreach($mahasiswa as $mhs): ?>
		<li>
			<a href="latihan2.php?nama=<?=$mhs["nama"];?>&nim=<?=$mhs['nim'];?>&email=<?=$mhs['email'];?>&jurusan=<?=$mhs['jurusan'];?>"><?=$mhs["nama"];?></a>
		</li>
	<?php endforeach; ?>
</body>
</html>