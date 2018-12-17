<?php
session_start();

  include_once '../db.php';

if (isset($_GET['id_user'])) {
   $id=$_GET['id_user'];

   $query_delete = "DELETE FROM users WHERE id_user = '$id'";
   $result_delete = $connection->query($query_delete);

   $query_delete2 = "DELETE FROM transaksi WHERE id_user = '$id'";
   $result_delete2 = $connection->query($query_delete2);

header('Location: ' . $_SERVER['HTTP_REFERER']);
}

else {
  header('Location: ../sign');
}
?>
