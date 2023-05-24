<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../datatables/css/jquery.dataTables.css">
	<style>
		label{
        font-family: Montserrat;    
        font-size: 18px;
        display: block;
        color: #262626; 
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        td a button {
            background: #abfc35;
            color: black;
            margin-top:10px;
            width: 80px;
            height:30px;
            border-radius: 5px;
        }

        .buttonAdminFull a button{
            background: #abfc35;
            color: black;
            margin-top:10px;
            width: 80px;
            height:30px;
            border-radius: 5px;
        }
	</style>
</head>
<body>
	<h2 style="font-size: 30px; color: #262626;">Data Anda</h2>
	<div class="table" style="overflow-x:auto;">
        <table id="example" class="display" cellspacing="0" width="100%" border="0" >
            <thead>
            <tr>
                <th>NIN</th>
                <th>Nama</th>
                <th>RT</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>E-mail</th>
                <th>Saldo</th>
                <th>Sampah</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>NIN</th>
                <th>Nama</th>
                <th>RT</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>E-mail</th>
                <th>Saldo</th>
                <th>Sampah</th>
                <th>Aksi</th>       
            </tr>   
            </tfoot>
            <tbody>
            <?php
                $query = mysqli_query($conn, "SELECT * FROM nasabah where nin = '".$_SESSION['nin']."'");
                while($row = mysqli_fetch_assoc($query)){
            ?>
            <tr align="center">
                <td><?php echo $row['nin'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['rt'] ?></td>
                <td><?php echo $row['alamat'] ?></td>
                <td><?php echo $row['telepon'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td>
                <?php
                            $saldonya = mysqli_query($conn, "SELECT SUM(total) AS totalsaldo FROM setor WHERE nin='".$row['nin']."'");
                            $tariknya = mysqli_query($conn, "SELECT SUM(jumlah_tarik) AS totaltarik FROM tarik WHERE nin='".$row['nin']."'");
                            $var_saldo = mysqli_fetch_array($saldonya);$var_tarik = mysqli_fetch_array($tariknya);
                            $tot_saldo_total=($var_saldo['totalsaldo'])-($var_tarik['totaltarik']);
                        $saldoakhir = mysqli_query($conn, 
                            "update nasabah SET saldo=$tot_saldo_total WHERE nin='".$row['nin']."'");                    
                ?>                    
                    <?php echo "Rp. ".number_format($row['saldo'], 2, ",", ".")  ?></td>
                <td>
                <?php 
                        $querysampah = mysqli_query($conn, "SELECT SUM(berat) AS totalberat FROM setor WHERE nin='".$row['nin']."'");
                        $rowsampah = mysqli_fetch_array($querysampah);
                        $sampahnya=$rowsampah['totalberat'];
                        $beratakhir = mysqli_query($conn,  
                        "update nasabah SET sampah=$sampahnya WHERE nin='".$row['nin']."'");
                ?>               
                    <?php echo number_format($row['sampah'])." Kg"  ?></td>
                <td>

                    <a href="dashboardNasabah.php?page=edit-nasabah-nsb&id=<?php echo $row['nin']; ?>">
                    <button><i class="fa fa-pencil"></i>edit</button> 
                    </a>
                    
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <br>
    <br>

    <!-- <div class="buttonAdminFull">
        <a href="dashboard.php?page=tambah-data-nasabah">
        <button><i class="fa fa-plus" aria-hidden="true"></i>Tambah</button>
        </a>

        <a target="_blank" href="../system/models/nasabah/excel-nasabah.php">
        <button><i class="fa fa-print" aria-hidden="true"></i>Excel</button>
        </a>
        
        <a target="_blank" href="../system/models/nasabah/print-nasabah.php">
        <button><i class="fa fa-print" aria-hidden="true"></i>Cetak</button>
        </a>
    </div> -->

    <script type="text/javascript" src="../datatables/js/jquery.min.js"></script>
    <script type="text/javascript" src="../datatables/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
           $('#example').DataTable();
        } );
    </script>
</body>
</html>