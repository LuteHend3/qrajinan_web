<?php
session_start();

  include_once '../db.php';

if (isset($_GET['id']) && isset($_GET['userid'])) {
   $id=$_GET['id_product'];
   $iduser = $_GET['userid'];

   $query_delete = "DELETE FROM transaksi WHERE id_product = '$id' AND id_user = '$iduser'";
   $result_delete = $connection->query($query_delete);


header('Location: ' . $_SERVER['HTTP_REFERER']);
}

else {
  header('Location: ../sign');
}
?>
