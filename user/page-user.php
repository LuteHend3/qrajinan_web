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

<form name="datauser" action="userinput.php" method="POST">
	<label for="id_user">ID User</label>
	<input type="text" name="id_user" id="id_user">
	<br>
	<label for="username">Username</label>
	<input type="text" name="username" id="username">
  <br>
  <label for="email">Email</label>
  <input type="email" name="email" id="email">
  <br>
	<label for="password">Password</label>
	<input type="password" name="password" id="password">
	<br>
	<label for="nama_pertama">Nama Pertama</label>
	<input type="text" name="nama_pertama" id="nama_pertama">
	<br>
  <label for="nama_terakhir">Nama Terakhir</label>
  <input type="text" name="nama_terakhir" id="nama_terakhir">
  <br>
  <label for="tgl_lahir">Tanggal Lahir</label>
  <input type="date" name="tgl_lahir" id="tgl_lahir">
  <br>
  <label for="telpon">No. Telpon</label>
  <input type="text" name="telpon" id="telpon">
  <br>
	 <button type="submit" value="simpan" class="btn btn-primary">Input</button>
        <button type="Reset" class="btn btn-warning">Reset</button>
</form>
<br>

  <table>
      <thead>
        <tr>
          <th>#</th>
          <th>ID User</th>
          <th>Username</th>
          <th>Email</th>
          <th>Password</th>
          <th>Nama Pertama</th>
          <th>Nama Terakhir</th>
          <th>Tanggal Lahir</th>
          <th>No. Telpon</th>

          <th>Action</th>
        </tr>

      </thead>
      <tbody>
<?php
        
    $result = mysqli_query($koneksi,"SELECT * FROM user order by id_user") or die(mysqli_error());
    $no=1; 
    while ($data = mysqli_fetch_array($result)) { //fetch the result from query into an array
    ?>
      <tr>
        <td><?php echo $no++; ?></td>         <!--menampilkan nomor dari variabel no-->
        <td><?php echo $data['id_user'] ?></td>    <!--menampilkan data id_karyawan dari tabel karyawan-->
        <td><?php echo $data['nama_user']?></td>
        <td><?php echo $data['email_user'] ?></td>        
        <td><?php echo $data['password_user'] ?></td>        
        <td><?php echo $data['nama_pertama_user'] ?></td>        
        <td><?php echo $data['nama_terakhir_user'] ?></td>        
        <td><?php echo $data['tanggal_lahir_user'] ?></td>        
        <td><?php echo $data['phone_user'] ?></td>        
        <td>
                        <a href="useredit.php?id_user=<?php echo $data['id_user']; ?>"> Edit</a> |
                        <a href="userdel.php?id_user=<?php echo $data['id_user']; ?>" onClick="javascript: return confirm('Anda yakin akan menghapus user ini ?')" > Delete </a>   
                    </td>
    
      </tr>
      <?php 
    }
      ?>
      </tbody>
    </table>

</body>
</html>
