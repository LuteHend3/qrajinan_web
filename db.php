<?php
 $hostname  = "localhost"; 
 $dbusername = "root"; /*Nama username database Anda*/
 $dbpassword     = ""; /*Password database Anda*/
 $dbname  = "qrajinandb"; /*Nama database Anda*/

 $connection = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);

 if(!$connection){
  echo "Koneksi ke database gagal!";
 }
?>