<?php  

$angka = [3,1,3,44,2,4,5];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Array 2</title>
	<style>
		.kotak{
			width: 50px;
			height: 50px;
			line-height: 50px;
			text-align: center;
			background-color: salmon;
			margin: 3px;
			float: left;

		}
		.clear{
			clear: both;
		}
	</style>
</head>
<body>
	<?php foreach($angka as $nomor): ?>
		<div class="kotak"><?=$nomor;?></div>
	<?php endforeach; ?>
	<div class="clear"></div>
</body>
</html>