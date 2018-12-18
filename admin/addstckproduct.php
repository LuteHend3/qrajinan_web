<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index');
}

else {
  $id=$_GET['id_product'];
}
 require 'includes/header.php';
 require 'includes/navconnected.php'; //require $nav;?>

 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index" class="breadcrumb">Qrajinan</a>
            <a href="editprofile" class="breadcrumb">Add Stock</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

<div class="container editprofile">
  <div class="container">
    <div class="card">
      <div class="row">

        <?php
     require_once('../db.php');
    $result = mysqli_query($connection,"SELECT * FROM product WHERE id_product='$id'") or die(mysqli_error());
//    $no=1; 
    while ($data = mysqli_fetch_array($result)) { //fetch the result from query into an array
    ?>
   <form class="col s12" method="POST" >
     <div class="row" style="margin-left: 2px; margin-right: 2px; margin-top: 2px;">
      <div class="row">
        <div class="input-field col s6">
          <i class="fa fa-product-hunt prefix"></i>
          <input id="icon_prefix" type="text" class="validate" name="name" value="<?php echo $data['nama_product'] ?>" readonly="" required="">
          <label for="icon_prefix">Item name</label>
        </div>

                <div class="input-field col s6">
          <i class="prefix fa fa-archive"></i>
          <input id="icon_prefix" type="number" class="validate" value="<?php echo $data['stok_barang'] ?>" name="stock_barang" required="">
          <label for="icon_prefix">Stock</label>
        </div>
       <?php
     }
     ?>
            <?php
              
        $querystok = ("SELECT * FROM product WHERE id_product = ".$id);
                  $resultstok = $connection->query($querystok);
                  $row = $resultstok->fetch_object();
             if (isset($_POST['update'])) {
              $oldstok = $_POST['stock_barang'];
              $newstok = ($row->stok_barang + $oldstok);
              //$sql = "UPDATE product SET stok_barang = '".$newstok."' WHERE id_product = ".$id;
                   


             $newname = $_POST['name'];
               $oldstok = $_POST['stock_barang'];
           include '../db.php';
              // update info on users Toble
              $queryupdate = "UPDATE product SET stok_barang = '".$newstok."' WHERE id_product = ".$id;
              //$result = $connection->query($queryupdate);

              //echo "<meta http-equiv='refresh' content='0'; url='index' />";
              if ($connection->query($queryupdate) === TRUE ) {
          echo "<div class='center-align'>
                 <h5 class='green-text'>Stock Added Successfully</h5>
                 </div><br><br>";
                 ?>
                 <script type="text/javascript">
        alert('Stock Added Successfully');
        window.location='products';
      </script> 
      <?php

     } else {
         echo "<h5 class='red-text '>Error: " . $queryupdate . "</h5><br><br><br>" . $connection->error;
     }

             }

             ?>
           <div class="center-align">
               <button type="submit" id="confirmed" name="update" class="btn meh button-rounded waves-effect waves-light ">Submit</button>
           </div>

     </div>
   </form>
 </div>
    </div>
  </div>
</div>
    <?php require 'includes/footer.php'; ?>
