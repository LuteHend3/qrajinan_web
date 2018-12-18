<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index.php');
}

 require 'includes/header.php';
 require 'includes/navconnected.php'; //require $nav;?>

 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index.php" class="breadcrumb">Qrajinan</a>
            <a href="infoproduct.php" class="breadcrumb">Produk</a>
            <a href="editproduct.php" class="breadcrumb">Transaksi</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

<div class="container scroll">
  <table class="highlight striped" width="100%" style="overflow-x: hidden;">
     <thead>
      <tr> <form method="POST" action="includes/report.php" target="_blank" >      
 <div class="modal-sm">
   <div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title">Cetak Laporan
    </h5>
  </div>
  <div class="modal-body">
    <div class="control-group">
   <label class="col-sm-2 control-label">Start Date</label>
   <div class="col-sm-6">
   <input type="date" name="from" id="stayf" value="<?php echo date('Y-m-d'); ?>" class="form-control" style="width:414px;height:25px">
   </div>
     </div>
     <div class="control-group">           
   <label class="col-sm-2 control-label">End Date</label>
   <div class="col-sm-8">
   <input type="date" name="end" id="stayf" value="<?php echo date('Y-m-d'); ?>" class="span5" style="width:414px;height:25px">
   </div>
     </div>
  </div>        
  
  <div class="modal-footer">
    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel
    </button>
    <button class="btn btn-info" type="submit" name="submit" value="proses" onclick="return valid();">Search
    </button>
  </div>
   </div>
 </div>
</form>

      </tr>
      <br>
       <tr>
           <th data-field="name">Item name</th>
           <th data-field="price">Price</th>
           <th data-field="quantity">Quantity</th>
           <th data-field="quantity">Tgl Transaksi</th>
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
transaksi.id_product,
transaksi.kuantitas_transaksi as 'quantity',
transaksi.tgl_transaksi as 'tgl',
transaksi.id_user as 'user'


FROM product, transaksi
WHERE product.id_product = transaksi.id_product AND transaksi.status_transaksi = 'paid'
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
        $tgl = $rowfirst['tgl'];
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
      <td><?= $tgl; ?></td>
      <td><?php echo" $userfirstname "." $userlasttname"; ?></td>
      <td><?= $status; ?></td>
      <td><a href="deletetrnsk.php?id_product=<?= $idp; ?>&userid=<?= $user; ?>"><i class="material-icons red-text">close</i></a></td>
    </tr>
    <?php }} }} ?>
  </tbody>
</table>
</div>

 <?php require 'includes/footer.php'; ?>
