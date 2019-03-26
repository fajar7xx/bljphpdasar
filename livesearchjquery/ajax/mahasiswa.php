<?php  
require_once '../functions.php';

$keyword = $_GET['keyword'];

$query = "SELECT * FROM mahasiswa 
			WHERE 
		nama LIKE '%$keyword%' OR
		nim LIKE '%$keyword%' OR
		email LIKE '%$keyword%' OR
		jurusan LIKE '%$keyword%'";
$mahasiswa = query($query);


?>

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