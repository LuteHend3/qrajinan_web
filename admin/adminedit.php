<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <?php
    require_once('../koneksi.php');
    $id = $_GET['id_admin'];
    $result = mysqli_query($koneksi,"SELECT * FROM admin WHERE id_admin='$id'") or die(mysqli_error());
    $no=1; 
    while ($data = mysqli_fetch_array($result)) { //fetch the result from query into an array
    ?>
<form name="dataadminedit" action="adminupdate.php" method="POST">
	<label for="id_admin">ID Admin</label>
	<input type="text" name="id_admin" id="id_admin" readonly="" required="" value="<?php echo $data['id_admin'] ?>">
	<br>
	<label for="username">Username</label>
	<input type="text" name="username" id="username" required="" value="<?php echo $data['username'] ?>">
	<br>
  <label for="nama_admin">Nama</label>
  <input type="text" name="nama_admin" id="nama_admin" required="" value="<?php echo $data['nama_admin'] ?>">
  <br>
	<label for="password">Password</label>
	<input type="password" name="password" id="password" required="" value="" placeholder="RE-Enter Password">

	
	<br>
	 <button type="submit" value="update" class="btn btn-primary">Update</button>

</form>
       <?php 
    }
      ?>
<br>

  <table>
      <thead>
        <tr>
          <th>#</th>
          <th>ID Admin</th>
          <th>Username</th>
          <th>Password</th>
          <th>Nama</th>

          <th>Action</th>
        </tr>

      </thead>
      <tbody>
<?php
    require_once('../koneksi.php');
    
    $result = mysqli_query($koneksi,"SELECT * FROM admin order by id_admin") or die(mysqli_error());
    $no=1; 
    while ($data = mysqli_fetch_array($result)) { //fetch the result from query into an array
    ?>
      <tr>
        <td><?php echo $no++; ?></td>         <!--menampilkan nomor dari variabel no-->
        <td><?php echo $data['id_admin'] ?></td>    <!--menampilkan data id_karyawan dari tabel karyawan-->
        <td><?php echo $data['username']?></td>
        <td><?php echo $data['password'] ?></td>        
        <td><?php echo $data['nama_admin'] ?></td>        
        <td>
                        <a href="adminedit.php?id_admin=<?php echo $data['id_admin']; ?>"> Edit</a> |
                        <a href="admindel.php?id_admin=<?php echo $data['id_admin']; ?>" onClick="javascript: return confirm('Anda yakin akan menghapus user ini ?')" > Delete </a>   
                    </td>
    
      </tr>
      <?php 
    }
      ?>
      </tbody>
    </table>

</body>
</html>
