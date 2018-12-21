<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index');
}

 require 'includes/header.php';
?>

<script type="text/javascript" src="src/js/jquery-2.1.4.js"></script>

<div class="container-fluid center-align sign">
  <div class="container">

  <div class="row">
    <div class="col s12">
       <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#signup">Add Admin</a></li>
       </ul>
   </div>

<div class="container forms">
 <div class="row">
<?php require_once '../db.php'; ?>
 <div id="signup" class="col s12 left-align">

        <div class="card">
          <div class="row">

     <form class="col s12" method="POST" enctype="multipart/form-data">      

          <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="icon_prefix" type="email" name="email" class="validate" required>
          <label for="icon_prefix">Email</label>
        </div>

        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" name="nama_pertama" class="validate" required>
          <label for="icon_prefix">Nama Pertama</label>
        </div>

         <div class="input-field col s12">
          <i class="material-icons prefix">perm_identity</i>
          <input id="icon_prefix" type="text" name="nama_terakhir" class="validate" required>
          <label for="icon_prefix">Nama Terakhir</label>
        </div>

        <div class="input-field col s12">
          Tanggal Lahir<br>
          <i class="material-icons prefix">event</i> 
          <input id="icon_prefix" type="date" name="tgl_lahir" class="validate" required>
          
        </div>

        <div class="input-field col s12 ">
          <i class="material-icons prefix">location_on</i>
          <textarea id="alamat_user" name="alamat_user" class="materialize-textarea validate" required=""></textarea>
          <label for="icon_prefix">Alamat</label>
        </div>

          <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input id="icon_prefix" type="password" name="password" class="validate value1" required>
          <label for="icon_prefix">Password</label>
        </div>

        <div class="input-field col s6 meh">
          <i class="material-icons prefix">lock</i>
          <input id="icon_prefix" type="password" name="confirmation" class="validate value2" required>
          <label for="icon_prefix">Confirm Password</label>
        </div>

<?php require 'includes/signupconfirmation.php'; ?>
            <div class="center-align">
                <button type="submit" id="confirmed" name="signup" class="btn meh button-rounded waves-effect waves-light ">Add Admin</button>
            </div>
            <p>With this the user will be an Admin<a href=""> User Agreement</a>,
              don't racist <a href="">Privacy Notice and receiving</a>
              marketing communications from us.</p>
       </form>
     </div>
        </div>

      </div>
      </div>
      </div>
      </div>
   </div>
  </div>
</div>
 

  <?php require 'includes/footer.php'; ?>
