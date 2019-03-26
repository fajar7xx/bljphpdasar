<?php 
// belajar asosiative array
$hari = ["senin", "selasa", "rabu"];
$bulan = ["Jan", "Feb", "Mar"];
$tgl = [1,2,3,4,5,6];
$arr = [100, "teks", true];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Asosiative array</title>
	<link rel="stylesheet" href="">
	<style>
		.kotak{
			width: 50px;
			height: 50px;
			line-height: 50px;
			float: left;
			background-color: #BADA55;
			margin: 3px;
			text-align: center;
			transition: 0.5s;

		}
		.kotak:hover{
			transform: rotate(360deg);
			border-radius: 50%;
		}
		.clear{
			clear: both;
		}
	</style>
</head>
<body>
	<?php 
	$angka = [[1,2,3],[4,5,6],[7,8,9]];
	foreach($angka as $a):
		foreach ($a as $b):
	?>
		<div class="kotak"><?=$b;?></div>
	<?php  
		endforeach;
		echo '<div class="clear"></div>';
	endforeach;
	?>
	
	
</body>
</html>