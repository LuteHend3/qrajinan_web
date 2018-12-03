<?php
$server  = 'localhost'; 
$username  = 'root'; 
$password  = ''; 
$database  = 'qrajinandb'; 

$koneksi = mysqli_connect($server,$username,$password) or die("Koneksi Gagal");

// Check connection
mysqli_select_db($koneksi, $database) or die("Database belum ada, silahkan import database");
?>