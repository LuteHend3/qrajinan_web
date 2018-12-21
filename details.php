<?php
  session_start();

 if (!isset($_SESSION['logged_in'])) {
     header('Location: sign');
 }

else {
 $idsess = $_SESSION['id_user'];
}
 require 'includes/header.php';
 ?>

 <div class="container print">
   <table>
      <thead>
        <tr>
            <th data-field="name">Nama Product</th>
            <th data-field="quantity">Kuantitas</th>
            <th data-field="price">Harga</th>
            <th data-field="user">Atas Nama</th>
            <th data-field="address">Alamat</th>
        </tr>
      </thead>
      <tbody class="scroll">
        <?php
         include 'db.php';
        //get detailss
        $querydetails = "SELECT * FROM details_transaksi WHERE id_user = '$idsess' AND status_transaksi ='ready'";
        $result = $connection->query($querydetails);
        if ($result->num_rows > 0) {
        // output data of each row
        while($rowdetails = $result->fetch_assoc()) {
          $id_details = $rowdetails['id_detail_transaksi'];
          $product_details = $rowdetails['product'];
          $quantity_details = $rowdetails['kuantitas_transaksi'];
          $price_details = $rowdetails['harga_transaksi'];
          $user_details = $rowdetails['user'];
          $address_details = $rowdetails['address'];
          $idtrskk = $rowdetails['id_transaksi'];

          ?>
        <tr>
          <td><?= $product_details; ?></td>
          <td><?= $quantity_details; ?></td>
          <td>Rp <?= $price_details; ?></td>
          <td><?= $user_details; ?></td>
          <td><?= $address_details; ?></td>
        </tr>
      <?php }} ?>
      <div class="left-align">
        <?php

        $querycmd = "SELECT id_transaksi FROM transaksi WHERE id_transaksi = '$idtrskk'";
        $getid = mysqli_query($connection, $querycmd);
        $rowcmd = mysqli_fetch_array($getid);
        $idtrsk = $rowcmd['id_transaksi'];

        ?>
        <h5>Invoice #<?= $idtrsk; ?></h5>
      </div>
      </tbody>
    </table>
    <div class="right-align">
      <p>Thank you for trusting us © Qrajinan Corp <?= date('Y'); ?></p>
    </div>

    <table>
      <tr><form method="post">
      <button type="submit" name="done" class="button-rounded waves-effect waves-light btn">Home</button>
      <!--<button type="submit" name="done2" class="blue waves-effect waves-light btn">
      save as pdf <i class="fa fa-print"></i></button>-->
      <?php

        if (isset($_POST['done'])) {



          $queryupdate = "UPDATE details_transaksi SET status_transaksi = 'done' WHERE id_user = '$idsess' AND status_transaksi = 'ready'";
          $queryupdate = mysqli_query($connection, $queryupdate);

          echo "<meta http-equiv='refresh' content='0;url=index' />";
        }

       ?>
    </form></tr>
    <tr><span> </span></tr>

    <tr><form method="POST" action="includes/report.php" target="_blank">
      <button type="submit" name="cetak" class="button-rounded waves-effect waves-light btn">Cetak</button>
    </form></tr>
    </table>
    
 </div>

<?php require 'includes/footer.php'; ?>
