<?php
  session_start();
  if (empty($_SESSION['user']) && empty($_SESSION['pass'])) {
      header('location:login.php');
  } else {   
  error_reporting(E_ALL | E_STRICT); 
  include_once("../system/config/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="shortcut icon" href="../asset/internal/img/img-local/favicon.ico">
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../asset/internal/css/styleDashboard.css" />
  </head>

  <body>

  <?php 
	    $cek = mysqli_query($conn, "SELECT * FROM nasabah WHERE nin='".$_SESSION['nin']."'");
	    $row = mysqli_fetch_array($cek);
  ?>

    <div class="sidebar">
      <div class="logo_content">
        <div class="logo">
          <a href="dashboardNasabah.php?page=data-nasabah">
            <img src="../asset/internal/img/logo.png" alt="" />
          </a>
        </div>
        <i class="fa fa-bars" id="btn"></i>
      </div>

      <div class="src">
        <i class="bx-search fa fa-arrow-right"></i>
        <input type="text" disable placeholder="Geser..." />
      </div>

      <ul class="nav">

        <li>
          <a href="dashboardNasabah.php?page=data-nasabah">
            <i class="fa fa-users"></i>
            <span class="link_name">Data Nasabah</span>
          </a>
          <span class="tooltip">Data Nasabah</span>
        </li>
        <li>
          <a href="dashboardNasabah.php?page=data-sampah">
            <i class="fa fa-trash"></i>
            <span class="link_name">Data Sampah</span>
          </a>
          <span class="tooltip">Data Sampah</span>
        </li>
        <li>
          <a href="dashboardNasabah.php?page=data-setor">
            <i class="fa fa-handshake-o"></i>
            <span class="link_name">Transaksi Setor</span>
          </a>
          <span class="tooltip">Transaksi Setor</span>
        </li>
        <li>
          <a href="dashboardNasabah.php?page=data-report">
            <i class="fa fa-line-chart"></i>
            <span class="link_name">Grafik Monitoring</span>
          </a>
          <span class="tooltip">Grafik Monitoring</span>
        </li>
        <li>
          <a href="../system/models/login/logout.php">
            <i class="fa fa-sign-out"></i>
            <span class="link_name">Logout</span>
          </a>
          <span class="tooltip">Logout</span>
        </li>
      </ul>
    </div>

    <div class="home_content">
    <?php 
         $cek = mysqli_query($conn, "SELECT * FROM nasabah WHERE nin='".$_SESSION['nin']."'");
         $row = mysqli_fetch_array($cek);
         echo "<h3>Selamat Datang ".$row['nama']. "</h3>";
    ?>
      <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];
          
        switch ($page) {
          case 'data-nasabah':
            include "../system/models/nasabah-nsb/view-nasabah-full-nsb.php";
            break;
          case 'edit-nasabah-nsb':
            include "../system/models/nasabah-nsb/edit-nasabah-nsb.php";
            break;
          case 'data-sampah':
            include "../system/models/nasabah-nsb/view-sampah.php";
            break;
          case 'data-setor':
            include "../system/models/nasabah-nsb/view-setor.php";
            break;
          case 'data-report':
            include "../system/models/report/view-report.php";
            break;
          case 'tambah-data-sampah':
            include "../system/models/sampah/tambah-sampah.php";
            break;			
          default:
            echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
            break;
        }
      }else{
      
        include "../system/models/nasabah-nsb/view-nasabah.php";
        
      }
      ?>
    </div>

    <script>
      let btn = document.querySelector("#btn");
      let sidebar = document.querySelector(".sidebar");
      let scrBtn = document.querySelector(".bx-search");
      let src = document.querySelector(".src");

      btn.onclick = function () {
        sidebar.classList.toggle("active");
      };
      scrBtn.onclick = function () {
        src.classList.toggle("active");
      };
      scrBtn.onclick = function () {
        sidebar.classList.toggle("active");
      };
      
    </script>
  </body>
</html>
<?php } ?>