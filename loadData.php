<?php
$server  = 'localhost'; 
$username  = 'root'; 
$password  = ''; 
$database  = 'smartshop'; 
$connection = mysqli_connect($server,$username,$password) or die("Koneksi Gagal");

// Check connection
mysqli_select_db($connection, $database) or die("Database belum ada, silahkan import database");
 

 $id_provinsi  = $_GET['id_provinsi'];
 $id_kabupaten  = $_GET['id_kabupaten'];
 

 if(isset($id_provinsi)){
  $tableQry = mysqli_query($connection,"SELECT * FROM kabkot WHERE id_prov = '$id_provinsi'");

  while ($dataKabupaten = mysqli_fetch_array($tableQry)) {
   echo "<option value=" . $dataKabupaten['id_kabkot'] . ">" . $dataKabupaten['nama_kabkot'] . "</option>";
  }
 }

 if(isset($id_kabupaten)){
  $tableQry = mysqli_query($connection,"SELECT * FROM kec WHERE id_kabkot = '$id_kabupaten'");

  while ($dataKecamatan = mysqli_fetch_array($tableQry)) {
   echo "<option value=" . $dataKecamatan['id_kec'] . ">" . $dataKecamatan['nama_kec'] . "</option>";
  }
 }

?>