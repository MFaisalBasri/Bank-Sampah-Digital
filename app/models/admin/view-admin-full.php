<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../public/datatables/css/jquery.dataTables.css">
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
    <h2>Data Administrator</h2>
    <div class="table" style="overflow-x:auto;">
        <table id="example" class="display" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>No</th>
                <th>NIA</th>
                <th>Nama Admin</th>
                <th>Nomor Telepon</th>
                <th>E-mail</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>No</th>
                <th>NIA</th>
                <th>Nama Admin</th>
                <th>Nomor Telepon</th>
                <th>E-mail</th>
                <th>Level</th>
                <th>Aksi</th>       
            </tr>   
            </tfoot>
            <tbody>
            <?php
                $no = 0;
                $query = mysqli_query($conn, "SELECT * FROM admin ORDER BY nia ASC");
                while($row = mysqli_fetch_assoc($query)){$no++;
             ?>
                <tr align="center">
                    <td><?php echo "$no" ?></td>
                    <td><?php echo $row['nia'] ?></td>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['telepon'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['level'] ?></td>
                    <td>
                         <a href="dashboard.php?page=edit-admin-id&id=<?php echo $row['nia']; ?> ">  
                        <button><i class="fa fa-pencil"></i>edit</button> 
                        </a>

                        <a onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="../models/admin/delete-admin.php?id=<?php echo $row['nia']; ?>">
                        <button><i class="fa fa-trash-o"></i>hapus</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="buttonAdminFull">
        <a href="dashboard.php?page=tambah-data-admin">
        <button><i class="fa fa-plus" aria-hidden="true"></i>Tambah</button>
        </a>

        <a target="_blank" href="../models/admin/excel-admin.php">
        <button><i class="fa fa-print" aria-hidden="true"></i>Excel</button>
        </a>

        <a target="_blank" href="../models/admin/print-admin.php">
        <button><i class="fa fa-print" aria-hidden="true"></i>Cetak</button>
        </a>
    </div>

    <script type="text/javascript" src="../../public/datatables/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../public/datatables/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
           $('#example').DataTable();
        } );
    </script>
</body>
</html>