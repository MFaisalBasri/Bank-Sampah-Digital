<?php
 
  $query = mysqli_query($conn, "SELECT * FROM admin WHERE nia='".$_SESSION['nia']."'");
  $row = mysqli_fetch_array($query);
  

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Admin</title>
    <style>
      label {
        font-family: Montserrat;
        font-size: 18px;
        display: flex;
        color: #262626;
      }

      input[type="text"],
      input[type="password"] {
        border-radius: 5px;
        width: 40%;
        height: 35px;
        background: #eee;
        padding: 0 10px;
        box-shadow: 1px 2px 2px 1px #ccc;
        color: #262626;
      }

      input[type="button"] {
        height: 35px;
        width: 200px;
        background: #8cd91a;
        border-radius: 20px;
        color: #fff;
        margin-top: 20px;
        cursor: pointer;
      }

      input {
        font-family: Montserrat;
        font-size: 16px;
      }

      .form-group {
        padding: 5px 0;
      }

      @media screen and (max-width: 576px) {
        .form-group input {
          width: 85%;
        }
      }
    </style>
  </head>
  <body>
    <h2>Data administrator</h2>
    <div class="form-group">
      <form action="" method="post">
        <label for="">Nomor Induk Admin</label>
        <input type="text" name="nia" disabled />
        <label for="">Nama Admin</label>
        <input type="text" name="nama" disabled />
        <label for="">Nomor Telepon</label>
        <input type="text" name="noTelepon" disabled required />
        <label for="">Email</label>
        <input type="text" name="email" disabled required />
        <label for="">Password</label>
        <input type="password" name="password" disabled required />
        <label for="">Level Admin</label>
        <input type="text" name="noTelepon" disabled /><br />
        <input
          type="button"
          onclick="window.location='dashboard.php?page=edit-admin';"
          value="Edit Data"
        />
      </form>
    </div>
  </body>
</html>
