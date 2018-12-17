<?php
$server  = 'localhost'; 
$username  = 'root'; 
$password  = ''; 
$database  = 'smartshop'; 
$connection = mysqli_connect($server,$username,$password) or die("Koneksi Gagal");

// Check connection
mysqli_select_db($connection, $database) or die("Database belum ada, silahkan import database");
 
$kota = $_GET['kota'];
$kec  = mysqli_query($connection,"SELECT id_kec, nama_kec FROM kec WHERE id_kabkot='$kota' order by nama_kec");
 
echo "<option>-- Pilih Kecamatan --</option>";
while($k = mysqli_fetch_array($kec)){
echo "<option value=\"".$k['id_kec']."\">".$k['nama_kec']."</option>\n";
}
?>