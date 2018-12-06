<?php
include('koneksi.php');

$username = $_POST['username'];
$password = md5($_POST['password']);

if ($_POST['password']=='') {
	$sql=mysqli_query($con,"INSERT INTO admin (id_admin, username, password)
	VALUES('','$username',DEFAULT)");
} else {

$sql=mysqli_query($con,"INSERT INTO admin (id_admin, username, password)
	VALUES('','$username','$password')");
}
header('location: dataadmin.php');

?>
