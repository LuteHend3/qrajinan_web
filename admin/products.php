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
            <a href="index" class="breadcrumb">Qrajinan</a>
            <a href="products" class="breadcrumb">Stock</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

   <div class="container stock">
     <div class="container">
       <div class="row">
           <?php
           include '../db.php';
            // get stock
            $querystock = "SELECT
            product.id_kategori as 'name',
            count(product.id_kategori) as 'total',

            kategori.id_kategori as 'id_cat',
            kategori.nama_kategori as 'name',
            kategori.icon_kategori as 'icon'

            FROM product, kategori
            WHERE product.id_kategori = kategori.id_kategori
            GROUP BY kategori.id_kategori";
            $resultstock = $connection->query($querystock);
            if ($resultstock->num_rows > 0) {
              while($rowstock = $resultstock->fetch_assoc()) {
               $id_cat = $rowstock['id_cat'];
               $name = $rowstock['name'];
               $icon = $rowstock['icon'];
               $total = $rowstock['total'];

           ?>

           <div class="col s12 m4">
             <div class="card hoverable animated slideInUp wow">
               <div class="card-image">
                 <a href="productstock.php?id_kategori=<?= $id_cat; ?>&category=<?= $name; ?>&icon=<?= $icon; ?>">
                   <img src="src/img/<?= $icon; ?>.png" alt=""></a>
                 <span class="card-title blue-text"><?= $name; ?></span>
               </div>
               <div class="card-content">
                 <h5 class="white-text"><?= $total; ?></h5>
               </div>
             </div>
           </div>

         <?php }} ?>
       </div>
     </div>
   </div>
 <?php require 'includes/footer.php'; ?>
