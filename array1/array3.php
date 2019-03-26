<?php  

$mhs = [
	['Fajar siagian', '141112699', 'TI', 'fajar@mail.com'],
	['Abis abbas', '141112630', 'TI', 'abil@mail.com'],
	['Bambang Gustiawan', '141122630', 'TI', 'bang@mail.com']
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Data mahasiswa</title>
	
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
	<?php foreach($mhs as $mahasiswa): ?>
		<ul>	
			<li>Nama: <?=$mahasiswa[0];?></li>
			<li>NIM: <?=$mahasiswa[1];?></li>
			<li>Jurusan :<?=$mahasiswa[2];?></li>
			<li>Email :<?=$mahasiswa[3];?></li>	
		</ul>
	<?php endforeach; ?>
</body>
</html>