
<?php 
include '../koneksi.php';
$id_admin = $_POST['id_admin'];
$username = $_POST['username'];
$pass = md5($_POST['password']);
$nama = $_POST['nama_admin'];


mysqli_query($koneksi,"INSERT INTO admin VALUES('$id_admin','$username','$pass','$nama')");

header("location:page-admin.php?pesan=input");
?>
