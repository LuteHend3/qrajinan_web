
<?php 
include '../koneksi.php';
$id = $_GET['id_user'];
mysqli_query($koneksi,"DELETE FROM user WHERE id_user='$id'")or die(mysqli_error());
header("location:page-user.php?pesan=hapus");
?>
