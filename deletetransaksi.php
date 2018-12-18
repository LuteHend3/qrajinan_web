<?php
session_start();

  include_once 'db.php';

if (isset($_GET['id'])) {
   $id=$_GET['id'];
   $idsess = $_SESSION['id_user'];

   $query_delete = "DELETE FROM transaksi WHERE id_transaksi = '$id' AND status_transaksi='ordered'";
   $result_delete = $connection->query($query_delete);

   $_SESSION['item'] -= 1;

header('Location:cart');
}

else {
  header('Location: sign');
}
?>
