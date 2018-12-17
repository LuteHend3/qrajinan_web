<?php
session_start();

  include_once 'db.php';

if (isset($_GET['id'])) {
   $id=$_GET['id'];
   $idsess = $_SESSION['id_user'];

   $query_delete = "DELETE FROM transaksi WHERE id = '$id'";
   $result_delete = $connection->query($query_delete);

   $_SESSION['item'] -= 1;

header('Location:cart');
}

else {
  header('Location: sign');
}
?>
