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


mysqli_query($koneksi,"UPDATE user SET id_user='$id_user', nama_user='$username', email_user='$email', password_user='$pass', nama_pertama_user='$nm_pertama', nama_terakhir_user='$nm_terakhir', tanggal_lahir_user='$tgl', phone_user='$telpon',updated_at=CURRENT_TIME() WHERE id_user='$id_user'");

header("location:page-user.php?pesan=update");

?>