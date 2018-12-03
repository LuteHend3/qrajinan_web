<?php 

include '../koneksi.php';
$id_admin = $_POST['id_admin'];
$username = $_POST['username'];
$nama = $_POST['nama_admin'];
$pass = md5($_POST['password']);


mysqli_query($koneksi,"UPDATE admin SET id_admin='$id_admin', username='$username', password='$pass', nama_admin='$nama' WHERE id_admin='$id_admin'");

header("location:page-admin.php?pesan=update");

?>