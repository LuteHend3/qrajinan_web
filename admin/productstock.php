<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index');
}

$category = $_GET['id_kategori'];

 require 'includes/header.php';
 require 'includes/navconnected.php'; //require $nav;?>

 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index" class="breadcrumb">Dashboard</a>
            <a href="products" class="breadcrumb">Stock</a>
            <a href="productstock" class="breadcrumb">Products</a>
          </div>
        </div>
      </nav>
    </div>
   </div>
   <div class="container stocki">
       <div class="row">
           <?php
           include '../db.php';
            // get stock
            $query = "SELECT * FROM product WHERE id_kategori = '$category'";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
              while($rows = $result->fetch_assoc()) {
               $id_product = $rows['id_product'];
               $nama_product = $rows['nama_product'];
               $thumbnail = $rows['thumbnail'];
               $price = $rows['harga_produk'];

           ?>
           <div class="col s12 m4">
             <div class="card hoverable animated slideInUp wow">
               <div class="card-image">
                     <img src="../products/<?= $thumbnail; ?>">
                   <span class="card-title grey-text"><?= $nama_product; ?></span>
                 </div>
                 <div class="card-content">
                      <h5 class="white-text">$ <?= $price; ?></h5>
                      <a class="blue-text" href="deleteproduct.php?id_product=<?= $id_product;?>">Delete</a>
                 </div>
             </div>
           </div>

         <?php }} ?>
       </div>
   </div>
  <?php require 'includes/footer.php'; ?>
