<?php
    require_once("../../config/koneksi.php");
    $id = $_GET['id'];
    $query = "DELETE FROM admin WHERE nia = '$id'";
    $queryact = mysqli_query($conn, $query);
    echo "<meta http-equiv='refresh'
                content='0; url=http://localhost/project-web/Sidebar--main/app/view/dashboard.php?page=data-admin-full'>";
?>