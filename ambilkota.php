<?php
$server  = 'localhost'; 
$username  = 'root'; 
$password  = ''; 
$database  = 'smartshop'; 
$connection = mysqli_connect($server,$username,$password) or die("Koneksi Gagal");

// Check connection
mysqli_select_db($connection, $database) or die("Database belum ada, silahkan import database");

$propinsi = $_GET['propinsi'];
$kota = mysqli_query($connection,"SELECT id_kabkot,nama_kabkot FROM kabkot WHERE id_prov='$propinsi' order by nama_kabkot");
echo "<option>-- Pilih Kabupaten/Kota --</option>";
while($k = mysqli_fetch_array($kota)){
echo "<option value=\"".$k['id_kabkot']."\">".$k['nama_kabkot']."</option>\n";
}
?>