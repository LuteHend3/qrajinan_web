<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index');
}

 require 'includes/header.php';
 require 'includes/navconnected.php'; //require $nav;?>

 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index" class="breadcrumb">Dashboard</a>
            <a href="infoproduct" class="breadcrumb">Products</a>
            <a href="editproduct" class="breadcrumb">Commands</a>
          </div>
        </div>
      </nav>
    </div>
   </div>


<div class="container scroll">
  <table class="highlight striped">
     <thead>
       <tr>
           <th data-field="name">Item name</th>
           <th data-field="price">Price</th>
           <th data-field="quantity">Quantity</th>
           <th data-field="user">User</th>
           <th data-field="status">Status</th>
           <th data-field="delete">Delete</th>
       </tr>
     </thead>
     <tbody>
<?php
include '../db.php';

$queryfirst = "SELECT
product.id_product as 'id',
product.nama_product as 'name',
product.harga_produk as 'price',

SUM(transaksi.kuantitas_transaksi),
transaksi.status_transaksi as 'status',
transaksi.id_produit,
transaksi.kuantitas_transaksi as 'quantity',
transaksi.id_user as 'user'


FROM product, transaksi
WHERE product.id_product = transaksi.id_produit
GROUP BY transaksi.id_transaksi
ORDER BY SUM(transaksi.id_user) DESC ";
$resultfirst = $connection->query($queryfirst);
if ($resultfirst->num_rows > 0) {
  // output data of each row
  while($rowfirst = $resultfirst->fetch_assoc()) {

        $idp = $rowfirst['id'];
        $name = $rowfirst['name'];
        $status = $rowfirst['status'];
        $quantity = $rowfirst['quantity'];
        $price = $rowfirst['price'];
        $user = $rowfirst['user'];

        //get user name
        $queryuser = "SELECT firstname, lastname FROM users WHERE id_user = '$user'";
        $resultuser = $connection->query($queryuser);
        if ($resultuser->num_rows > 0) {
          // output data of each row
          while($rowuser = $resultuser->fetch_assoc()) {
            $userfirstname = $rowuser['firstname'];
            $userlasttname = $rowuser['lastname'];
    ?>
    <tr>
      <td><?= $name; ?></td>
      <td><?= $price; ?></td>
      <td><?= $quantity; ?></td>
      <td><?php echo" $userfirstname "." $userlasttname"; ?></td>
      <td><?= $status; ?></td>
      <td><a href="deletecmd.php?id=<?= $idp; ?>&userid=<?= $user; ?>"><i class="material-icons red-text">close</i></a></td>
    </tr>
    <?php }} }} ?>
  </tbody>
</table>
</div>

 <?php require 'includes/footer.php'; ?>
