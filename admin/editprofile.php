<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: sign.php');
}

else {
  $idsess = $_SESSION['id_user'];
}
 require 'includes/header.php';
 require 'includes/navconnected.php'; //require $nav;?>

 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index.php" class="breadcrumb">Qrajinan</a>
            <a href="editprofile.php" class="breadcrumb">Edit Profile</a>
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
    $result = mysqli_query($connection,"SELECT * FROM users WHERE id_user='$idsess'") or die(mysqli_error());
//    $no=1; 
    while ($data = mysqli_fetch_array($result)) { //fetch the result from query into an array
    ?>
   <form class="col s12" method="POST" >
     <div class="row" style="margin-left: 2px; margin-right: 2px; margin-top: 2px;">
       <div class="input-field col s12">
         <i class="material-icons prefix">email</i>
         <input id="icon_prefix" type="text" name="email" class="validate" value="<?php echo $data['email'] ?>" required>
         <label for="icon_prefix">Email</label>
       </div>

       <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" name="nama_pertama" class="validate" value="<?php echo $data['firstname'] ?>" required>
          <label for="icon_prefix">Nama Pertama</label>
        </div>

         <div class="input-field col s12">
          <i class="material-icons prefix">perm_identity</i>
          <input id="icon_prefix" type="text" name="nama_terakhir" class="validate" value="<?php echo $data['lastname'] ?>" required>
          <label for="icon_prefix">Nama Terakhir</label>
        </div>


        <div class="input-field col s12 ">
          <i class="material-icons prefix">location_on</i>
          <textarea id="alamat_user" name="alamat_user" class="materialize-textarea validate" required=""><?php echo $data['address'] ?></textarea>
          <label for="icon_prefix">Alamat</label>
        </div>

       <div class="input-field col s6">
         <i class="material-icons prefix">lock</i>
         <input id="icon_prefix" type="password" name="password" class="validate value1" required>
         <label for="icon_prefix">New Password</label>
       </div>

       <div class="input-field col s6 meh">
         <i class="material-icons prefix">lock</i>
         <input id="icon_prefix" type="password" name="confirmation" class="validate value2" required>
         <label for="icon_prefix">Confirm Password</label>
       </div>
       <?php
     }
     ?>
            <?php

             if (isset($_POST['update'])) {

               $newemail = $_POST['email'];
               $newnamapertama = $_POST['nama_pertama'];
               $newnamatrkhir = $_POST['nama_terakhir'];
               $newalamat = $_POST['alamat_user'];
               $newpassword = md5($_POST['password']);

              include '../db.php';
              // update info on users Toble
              $queryupdate = "UPDATE users SET email ='$newemail', firstname ='$newnamapertama', lastname ='$newnamatrkhir', address ='$newalamat', password ='$newpassword' WHERE id_user='$idsess'";
              //$result = $connection->query($queryupdate);

              //echo "<meta http-equiv='refresh' content='0'; url='index' />";
              if ($connection->query($queryupdate) === TRUE ) {
          echo "<div class='center-align'>
                 <h5 class='green-text'>Profile Update Successfully</h5>
                 </div><br><br>";

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
