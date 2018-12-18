<?php
session_start();

if ($_SESSION['item'] < 1 OR !isset($_SESSION['logged_in'])) {
    header('Location: sign');
}

else {
  $nav ='includes/navconnected.php';
  $idsess = $_SESSION['id_user'];
  
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
          </div>
        </div>
      </nav>
    </div>
   </div>

   <div class="container scroll info">
     <table class="highlight">
        <thead>
          <tr>
              <th data-field="name">Item Name</th>
              <th data-field="category">Category</th>
              <th data-field="price">Price</th>
              <th data-field="quantity">Quantity</th>
              <th data-field="quantity">Date Added</th>
              <th data-field="total">Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
           include 'db.php';
          //get products
          $queryproduct = "SELECT product.nama_product as 'name',
          product.id_product as 'id', product.harga_produk as 'price',
          kategori.nama_kategori as 'category',transaksi.id_transaksi as 'id_transaksi', transaksi.id_user, transaksi.status_transaksi, 
          transaksi.tgl_transaksi as 'tgl_trans', 
          transaksi.kuantitas_transaksi as 'quantity'
FROM kategori, product, transaksi
WHERE transaksi.id_product = product.id_product AND product.id_kategori = kategori.id_kategori AND transaksi.status_transaksi = 'ordered'";
          $result1 = $connection->query($queryproduct);
          if ($result1->num_rows > 0) {
          // output data of each row
          while($rowproduct = $result1->fetch_assoc()) {
            $id_productdb = $rowproduct['id'];
            $id_transaksi = $rowproduct['id_transaksi'];
            $name_product = $rowproduct['name'];
            $category_product = $rowproduct['category'];
            $quantity_product = $rowproduct['quantity'];
            $price_product = $rowproduct['price'];
            $tgl = $rowproduct['tgl_trans'];

            ?>
          <tr>
            <td><?= $name_product; ?></td>
            <td><?= $category_product; ?></td>
            <td><?= $price_product; ?></td>
            <td><?= $quantity_product; ?></td>
            <td><?= $tgl; ?></td>
            <td><?= $price_product*$quantity_product; ?></td>
            <td><a href="deletetransaksi.php?id=<?php echo $rowproduct['id_transaksi']; ?>"><i class="material-icons red-text">close</i></a></td>
          </tr>
        <?php }}?>
        </tbody>
      </table>
      <div class="right-align">
        <a href="checkout"
        class='btn-large button-rounded waves-effect waves-light'>
          Check out <i class="material-icons right">payment</i></a>
      </div>
   </div>
   <?php
    require 'includes/secondfooter.php';
    require 'includes/footer.php'; ?>
