
<?php 
include '../koneksi.php';
$id = $_GET['id_admin'];
mysqli_query($koneksi,"DELETE FROM admin WHERE id_admin='$id'")or die(mysqli_error());
header("location:page-admin.php?pesan=hapus");
?>
