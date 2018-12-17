
<?php
 $hostname  = "localhost"; 
 $dbusername = "root"; /*Nama username database Anda*/
 $dbpassword     = ""; /*Password database Anda*/
 $dbname  = "combobox_bertingkat"; /*Nama database Anda*/

 $connection = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);

 if(!$connection){
  die("Database connection failed");
 }
?>

