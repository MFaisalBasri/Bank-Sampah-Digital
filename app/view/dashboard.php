<?php
  session_start();
  if (empty($_SESSION['user']) && empty($_SESSION['pass'])) {
      header('location:login.php');
  } else {   
  error_reporting(E_ALL | E_STRICT); 
  include_once("../config/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Sidebar</title>
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../../public/css/styleDashboard.css" />
  </head>

  <body>
    <div class="sidebar">
      <div class="logo_content">
        <div class="logo">
          <a href="dashboard.php?page=data-admin">
            <img src="../../public/img/logo.png" alt="" />
          </a>
        </div>
        <i class="fa fa-bars" id="btn"></i>
      </div>

      <div class="src">
        <i class="bx-search fa fa-arrow-right"></i>
        <input type="text" placeholder="Search..." />
      </div>

      <ul class="nav">
        <li>
          <a href="dashboard.php?page=data-admin-full">
            <i class="fa fa-user"></i>
            <span class="link_name">Data Admin</span>
          </a>
          <span class="tooltip">Data Admin</span>
        </li>
        <li>
          <a href="">
            <i class="fa fa-users"></i>
            <span class="link_name">Data Nasabah</span>
          </a>
          <span class="tooltip">Data Nasabah</span>
        </li>
        <li>
          <a href="">
            <i class="fa fa-trash"></i>
            <span class="link_name">Data Sampah</span>
          </a>
          <span class="tooltip">Data Sampah</span>
        </li>
        <li>
          <a href="">
            <i class="fa fa-handshake-o"></i>
            <span class="link_name">Transaksi Setor</span>
          </a>
          <span class="tooltip">Transaksi Setor</span>
        </li>
        <li>
          <a href="">
            <i class="fa fa-handshake-o"></i>
            <span class="link_name">Transaksi Tarik</span>
          </a>
          <span class="tooltip">Transaksi Tarik</span>
        </li>
        <li>
          <a href="">
            <i class="fa fa-line-chart"></i>
            <span class="link_name">Grafik Monitoring</span>
          </a>
          <span class="tooltip">Grafik Monitoring</span>
        </li>
        <li>
          <a href="">
            <i class="fa fa-sign-out"></i>
            <span class="link_name">Logout</span>
          </a>
          <span class="tooltip">Logout</span>
        </li>
      </ul>
    </div>

    <div class="home_content">
      <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];
          
        switch ($page) {
          case 'data-admin':
            include "../models/admin/view-admin.php";
            break;
          case 'tambah-data-admin':
            include "../models/admin/tambah-admin.php";
            break;
          case 'data-admin-full':
            include "../models/admin/view-admin-full.php";
            break;
          case 'edit-admin-id':
            include "../models/admin/edit-admin-id.php";
            break;
          case 'edit-admin':
            include "../models/admin/edit-admin.php";
            break;
          case 'edit-sampah':
            include "../system/function/edit-sampah.php";
            break;
          case 'data-nasabah-full':
            include "../system/function/view-nasabah-full.php";
            break;
          case 'edit-nasabah-id':
            include "../system/function/edit-nasabah-id.php";
            break;
          case 'tambah-data-nasabah':
            include "../system/function/tambah-nasabah.php";
            break;
          case 'data-sampah':
            include "../system/function/view-sampah.php";
            break;
          case 'tambah-data-setor':
            include "../system/function/tambah-setor.php";
            break;
          case 'edit-setor':
            include "../system/function/edit-setor.php";
            break;
          case 'tambah-data-tarik':
            include "../system/function/tambah-tarik.php";
            break;
          case 'data-setor':
            include "../system/function/view-setor.php";
            break;
          case 'data-tarik':
            include "../system/function/view-tarik.php";
            break;
          case 'data-report':
            include "../system/function/view-report.php";
            break;
          case 'tambah-data-sampah':
            include "../system/function/tambah-sampah.php";
            break;			
          default:
            echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
            break;
        }
      }else{
        include "../models/admin/view-admin.php";
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