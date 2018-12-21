<?php
if (isset($_POST['signup'])) {

  $email = $_POST['email'];
  $firstname = $_POST['nama_pertama'];
  $lastname = $_POST['nama_terakhir'];
  $tgl= date("Y-m-d", strtotime($_POST['tgl_lahir']));
  $password = $_POST['password'];
  $address = $_POST['alamat_user'];
  $encryptedpass = md5($password);

  include 'db.php';

  $query = "INSERT INTO users VALUES ('','$email',
'$firstname',
'$lastname',
'$tgl',
'$encryptedpass',
'$address',
'client',
CURRENT_TIME(),
CURRENT_TIME())";

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
