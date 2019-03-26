<?php  
// koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "phpdasar";

$link = mysqli_connect($host, $username, $password, $database);

if (!$link) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
?>