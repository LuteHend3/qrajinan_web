<?php
if (isset($_POST['signup'])) {

  $email = $_POST['email'];
  $firstname = $_POST['nama_pertama'];
  $lastname = $_POST['nama_terakhir'];
  $tgl= date("Y-m-d", strtotime($_POST['tgl_lahir']));
  $password = $_POST['password'];
  $address = $_POST['alamat_user'];
  $encryptedpass = md5($password);


  include '../db.php';

  //connecting & inserting data

  $query = "INSERT INTO users VALUES ('','$email',
'$firstname',
'$lastname',
'$tgl',
'$encryptedpass',
'$address',
'admin',
CURRENT_TIME(),
'')";

if ($connection->query($query) === TRUE) {


      ?>
      <script type="text/javascript">
        alert('Anda Telah Menambah Admin Baru!');
        window.location='../admin/allusers.php';
      </script>
      <?php

      

     } else {
         echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
     }

     $connection->close();

}

?>
