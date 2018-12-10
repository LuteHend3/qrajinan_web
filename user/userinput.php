
<?php 
include '../koneksi.php';
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$email = $_POST['email'];
$pass = md5($_POST['password']);
$nm_pertama = $_POST['nama_pertama'];
$nm_terakhir = $_POST['nama_terakhir'];
$nm_terakhir = $_POST['nama_terakhir'];
$tgl= date("Y-m-d", strtotime($_POST['tgl_lahir']));
$telpon = $_POST['telpon'];


mysqli_query($koneksi,"INSERT INTO user VALUES('$id_user','$username','$email','$pass','$nm_pertama','$nm_terakhir','$tgl','$telpon', CURRENT_TIME(), DEFAULT)");

header("location:page-user.php?pesan=input");
?>
