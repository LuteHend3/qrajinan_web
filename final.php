<?php
  session_start();

 if (!isset($_SESSION['logged_in']) && !isset($_POST['pay'])) {
     header('Location: sign');
 }

 if (isset($_POST['pay'])) {

    include 'db.php';

    $querycmd ="SELECT product.id_product as 'id_product',
                       product.nama_product as 'product',
                       product.harga_produk as 'price',
                       product.stok_barang as 'stock',

                       transaksi.id_transaksi as 'idtrsk',
                       transaksi.id_produit,
                       transaksi.kuantitas_transaksi as 'quantity',
                       transaksi.status_transaksi,
                       transaksi.id_user as 'iduser',

                       users.id_user

                       FROM product, transaksi, users
                       WHERE product.id_product = transaksi.id_produit AND users.id_user = transaksi.id_user
                       AND transaksi.id_user = '{$_SESSION['id_user']}' AND transaksi.status_transaksi = 'ordered'";
    $resultcmd = $connection->query($querycmd);
    if($resultcmd->num_rows > 0){
      while ($rowcmd = $resultcmd->fetch_assoc()) {
           $idproductcmd = $rowcmd['id_product'];
           $productcmd = $rowcmd['product'];
           $quantitycmd = $rowcmd['quantity'];
           $pricecmd = $rowcmd['price'];
           $stock = $rowcmd['stock'];
           $idtrsk = $rowcmd['idtrsk'];
           $firstnamecmd = $_POST['firstname'];
           $lastnamecmd = $_POST['lastname'];
           $addresscmd = $_POST['address'];

           $idusercmd = $rowcmd['iduser'];


    $price = $pricecmd * $quantitycmd;
    
    $fullname = $firstnamecmd . " " . $lastnamecmd ;

    $query_details = "INSERT INTO details_transaksi(product,
                                                  kuantitas_transaksi,
                                                  harga_transaksi,
                                                  id_transaksi,
                                                  id_user,
                                                  user,
                                                  address,
                                                  status_transaksi) VALUES('$productcmd',
                                                               '$quantitycmd',
                                                               '$price',
                                                               '$idtrsk',
                                                               '$idusercmd',
                                                               '$fullname',
                                                               '$addresscmd',
                                                               'ready')";
    $resultdetails = $connection->query($query_details);
$stok_final = $stock - $quantitycmd;
$stokkurang = "UPDATE product SET stok_barang = $stok_final WHERE id_product = '$idproductcmd'";
$stok_kurang = mysqli_query($connection, $stokkurang);

    $querypay = "UPDATE transaksi SET status_transaksi = 'paid' WHERE id_user = '{$_SESSION['id_user']}' AND status_transaksi = 'ordered'";     
    $resultpay = mysqli_query($connection, $querypay);
  }
}
    unset($_SESSION["item"]);

   $nav ='includes/navconnected.php';
   $idsess = $_SESSION['id_user'];

   $email_sess = $_SESSION['email'];
   $firstname_sess = $_SESSION['firstname'];
   $lastname_sess = $_SESSION['lastname'];
   $address_sess = $_SESSION['address'];
 }

  require 'includes/header.php';
  require $nav;?>
  <div class="container-fluid product-page">
    <div class="container current-page">
       <nav>
         <div class="nav-wrapper">
           <div class="col s12">
             <a href="index" class="breadcrumb">Home</a>
             <a href="cart" class="breadcrumb">Cart</a>
             <a href="checkout" class="breadcrumb">Checkout</a>
             <a href="final" class="breadcrumb">Thank you</a>
           </div>
         </div>
       </nav>
     </div>
    </div>

<div class="container thanks">
  <div class="row">
    <div class="col s12 m3">

    </div>

  <div class="col s12 m6">
  <div class="card center-align">
     <div class="card-image">
       <img src="src/img/thanks.png" class="responsive-img" alt="">
     </div>
     <div class="card-content center-align">
       <h5>Thank you for your purchase</h5>
       <p>Your order is on its way Dear : <h5 class="green-text"><?php echo"$firstname_sess". " " . "$lastname_sess";  ?></h5></p>
     </div>
   </div>

   <div class="center-align">
     <a href="details.php" class="button-rounded blue btn waves-effects waves-light">Details</a>
     <a href="index" class="button-rounded btn waves-effects waves-light">Home</a>
   </div>
  </div>
  <div class="col s12 m3">

  </div>
 </div>
</div>

    <?php require 'includes/footer.php'; ?>
