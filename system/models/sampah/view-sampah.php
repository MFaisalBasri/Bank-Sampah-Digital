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
    <h2 style="font-size: 30px; color: #262626;">Data Sampah</h2>
    <div class="table" style="overflow-x:auto;">
    <table id="example" class="display" cellspacing="0" width="100%" border="0" >
            <thead>
            <tr>
                <th>No</th>
                <th>Jenis Sampah</th>
                <th>Kategori</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>No</th>
                <th>Jenis Sampah</th>
                <th>Kategori</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>   
            </tfoot>
            <tbody>
            <?php
                $no = 0;
                $query = mysqli_query($conn, "SELECT * FROM sampah ORDER BY jenis_sampah ASC");
                while($row = mysqli_fetch_assoc($query)){$no++;
            ?>
            <tr align="center">
                <td><?php echo "$no" ?></td>
                <td><?php echo $row['jenis_sampah'] ?></td>
                <td><?php echo $row['kategori'] ?></td>
                <td><?php echo $row['satuan'] ?></td>
                <td><?php echo "Rp. ".number_format($row['harga'], 2, ",", ".")  ?></td>
                <td><img src="../asset/internal/img/uploads/<?php echo $row['gambar'] ?>" width="100px" height="50px"></td>
                <td><?php echo $row['deskripsi'] ?></td>
                <td>

                    <a href="dashboard.php?page=edit-sampah&id=<?php echo $row['jenis_sampah']; ?>">
                    <button><i class="fa fa-pencil"></i>edit</button> 
                    </a> 
                    
                    <a onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="../system/models/sampah/delete-sampah.php?id=<?php echo $row['jenis_sampah']; ?>">
                    <button><i class="fa fa-trash-o"></i>hapus</button>
                    </a>

                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
  <</div>
    
    <div class="buttonAdminFull">
        <a href="dashboard.php?page=tambah-data-sampah">    
        <button><i class="fa fa-plus" aria-hidden="true"></i>Tambah</button>
        </a>

        <a target="_blank" href="../system/models/sampah/excel-sampah.php">
        <button><i class="fa fa-print" aria-hidden="true"></i>Excel</button>
        </a>

        <a target="_blank" href="../system/models/sampah/print-sampah.php">
        <button><i class="fa fa-print" aria-hidden="true"></i>Cetak</button>
        </a>
    </div>

    <script type="text/javascript" src="../datatables/js/jquery.min.js"></script>
    <script type="text/javascript" src="../datatables/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
           $('#example').DataTable();
        } );
    </script>
    </body>
</html>