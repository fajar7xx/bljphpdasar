<?php

session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "phpdasar";

$conn = mysqli_connect($host, $username, $password, $database);

function query($query){
	// var global untuk mengambil variabel di luar fungsi
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];

	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}

	return $rows;
}

function tambah($data){

	global $conn;


	$nim = htmlspecialchars($data['nim']);
	$nama = htmlspecialchars($data['nama']);
	$email = htmlspecialchars($data['email']);
	$jurusan = htmlspecialchars($data['jurusan']);

	// upload gambar dulu
	$gambar = upload();
	if(!$gambar){
		return false;
	}

	$query = "INSERT INTO mahasiswa
				VALUES
				('', '$nim', '$nama', '$email', '$jurusan', '$gambar')
				";

	mysqli_query($conn, $query);


	return mysqli_affected_rows($conn);

}


function upload(){

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang di upload
	if($error === 4){
		echo "
			<script>
				alert('Pilih Gambar Terlebih dahulu, gambar belum di upload');
			</script>
		";
		return false;
	}

	// cek yang di upload gambar atau bukan
	$ekstensiGambarValid = ['jpg' , 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
		echo "
			<script>
				alert('Harap upload gambar.');
			</script>
		";
		return false;
	}

	// cek jika ukuran terlalu besar dari 1MB
	if($ukuranFile > 1000000){
		echo "
			<script>
				alert('Ukuran File terlalu besar. Ukuran Maks 1MB');
			</script>
		";
		return false;
	}

	// lolos pengecekan, gambar siap upload
	// generate nama baru 
	
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;	

	move_uploaded_file($tmpName, 'img/'.$namaFileBaru);

	return $namaFileBaru;

}

function hapus($id){

	global $conn;

	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = '$id'");

	return mysqli_affected_rows($conn);

}

function ubah($data){
	global $conn;

	$id = $data['id'];
	$nim = htmlspecialchars($data['nim']);
	$nama = htmlspecialchars($data['nama']);
	$email = htmlspecialchars($data['email']);
	$jurusan = htmlspecialchars($data['jurusan']);
	$gambarLama = htmlspecialchars($data['gambarLama']);

	// cek apakah user pilih gambar baru atau tidak
	if($_FILES['gambar']['error'] === 4){
		$gambar = $gambarLama;
	}
	elseif($_FILES['gambar']['error'] === 0){
		$gambar = upload();
	}

	$query = "UPDATE mahasiswa SET
				nim = '$nim',
				nama = '$nama',
				email = '$email',
				jurusan = '$jurusan',
				gambar = '$gambar'
			WHERE id = '$id'
				";

	mysqli_query($conn, $query);


	return mysqli_affected_rows($conn);
}


function cari($keyword){

	// global $conn;
	$query = "SELECT * FROM mahasiswa 
				WHERE 
			nama LIKE '%$keyword%' OR
			nim LIKE '%$keyword%' OR
			email LIKE '%$keyword%' OR
			jurusan LIKE '%$keyword%'
			";

	return query($query);
}

function register($data){
	global $conn;

	// menghilangkan slah dan membuat semua huruf kecil
	$username = strtolower(stripslashes($data['username']));
	$pass = mysqli_real_escape_string($conn, $data['pass']);
	$pass2 = mysqli_real_escape_string($conn, $data['pass2']);
	
	
	// cek username sudah atau belum
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

	if(mysqli_fetch_assoc($result)){
		echo "
			<script>
				alert('username sudah terdaftar, harap menggunakan username baru');
			</script>
		";
		return false;
	}

	// cek konfirmasi password
	if($pass !== $pass2){
		echo "
			<script>
				alert('konfirmasi password tidak sesuai');
			</script>
		";
		return false;
	}

	// enkripsi password
	// parameter 1 variabel yang mau di enkripsi
	// parameter 2 algoritma yang akan di gunakan
	// defaultnya PASSWORD_DEFAULT
	$pass = password_hash($pass, PASSWORD_DEFAULT);

	// var_dump($pass);
	// die();

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$pass')");

	return mysqli_affected_rows($conn);
}

?>