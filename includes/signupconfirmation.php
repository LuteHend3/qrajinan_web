<?php
if (isset($_POST['signup'])) {

  $email = $_POST['email'];
  $firstname = $_POST['nama_pertama'];
  $lastname = $_POST['nama_terakhir'];
  $password = $_POST['password'];
  $address = $_POST['alamat_user'];
  $encryptedpass = md5($password);


  include 'db.php';

  //connecting & inserting data

  $query = "INSERT INTO users VALUES ('','$email',
'$firstname',
'$lastname',
'$encryptedpass',
'$address',
'client')";

if ($connection->query($query) === TRUE) {


      ?>
      <script type="text/javascript">
        alert('Akun Anda Telah Terdaftar, Silahkan Login!');
        window.location='sign.php';
      </script>
      <?php

      

     } else {
         echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
     }

     $connection->close();

}

?>
