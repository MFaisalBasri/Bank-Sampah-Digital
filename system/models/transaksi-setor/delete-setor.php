<?php
    require_once("../../config/koneksi.php");
    $id = $_GET['id'];
    $query = "DELETE FROM setor WHERE id_setor = '$id'";
    $queryact = mysqli_query($conn, $query);
    echo "<meta http-equiv='refresh'
                content='0; url=http://localhost/project-web/Bank%20Sampah%20Digital/view/dashboard.php?page=data-setor'>";
?>