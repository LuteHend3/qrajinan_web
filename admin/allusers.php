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
            <a href="users" class="breadcrumb">Users</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

   <div class="container scroll">
     <table class="highlight striped">
      <tr>
      <a href="adduser.php"makeAdmin">Add an Admin</a>
      </tr>
        <thead>
          <tr>
              <th data-field="lastname">Nama</th>
              <th data-field="email">Email</th>
              <th data-field="address">Alamat</th>
              <th data-field="address">Role</th>
              <th data-field="delete">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../db.php';

                  //get users
                  $queryuser = "SELECT id_user, email, firstname, lastname, address, role FROM users";
                  $resultuser = $connection->query($queryuser);
                  if ($resultuser->num_rows > 0) {
                    // output data of each row
                    while($rowuser = $resultuser->fetch_assoc()) {
                      $id_user = $rowuser['id_user'];
                      $firstname = $rowuser['firstname'];
                      $lasttname = $rowuser['lastname'];
                      $email = $rowuser['email'];
                      $address = $rowuser['address'];
                      $role = $rowuser['role'];

                     
              ?>

              <tr>
                <td><?php echo" $firstname "." $lasttname"; ?></td>
                <td><?= $email; ?></td>
                <td><?= $address; ?></td>
                <td><?= $role; ?></td>
                <td><a href="deleteuser.php?id_user=<?= $id_user; ?>"><i class="material-icons red-text">close</i></a>
                </td>
              </tr>
              <?php }}  ?>
            </tbody>
          </table>
          </div>

   <?php require 'includes/footer.php'; ?>
