<?php
require_once('../../../public/FPDF-master/fpdf.php'); // memuat library TCPDF

// koneksi ke database
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'db_bankSampah';
$conn = mysqli_connect($host, $user, $pass, $dbname);

// mengambil data dari tabel di database
$query = "SELECT * FROM admin";
$result = mysqli_query($conn, $query);

// membuat objek PDF
$pdf = new FPDF();

// menambah halaman
$pdf->AddPage();

// menampilkan judul
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Data Admin', 0, 1, "C");

// menampilkan data
$pdf->SetFont('Arial', '', 12);
while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(30, 10, $row['nia'], 1);
    $pdf->Cell(40, 10, $row['nama'], 1);
    $pdf->Cell(30, 10, $row['telepon'], 1);
    $pdf->Cell(50, 10, $row['email'], 1);
    $pdf->Cell(40, 10, $row['level'], 1, 1);
}

// menampilkan atau mengunduh file PDF
$pdf->Output('data_database.pdf', 'I');

// menutup koneksi ke database
mysqli_close($conn);
?>
