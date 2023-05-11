<?php
require_once('../../../asset/library/FPDF-master/fpdf.php'); // memuat library TCPDF

// koneksi ke database
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'db_bankSampah';
$conn = mysqli_connect($host, $user, $pass, $dbname);

// mengambil data dari tabel di database
$query = "SELECT * FROM nasabah";
$result = mysqli_query($conn, $query);

// membuat objek PDF
$pdf = new FPDF();

// menambah halaman
$pdf->AddPage();

// menampilkan judul
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Data Nasabah', 0, 1, "C");

// menampilkan data
$pdf->SetFont('Arial', '', 10);
while ($row = mysqli_fetch_assoc($result)) {
    // $pdf->Cell(25, 10, $row['nin'], 1);
    $pdf->Cell(25, 10, $row['nama'], 1);
    $pdf->Cell(40, 10, $row['alamat'], 1);
    $pdf->Cell(30, 10, $row['telepon'], 1);
    $pdf->Cell(40, 10, $row['email'], 1);
    $pdf->Cell(20, 10, $row['saldo'], 1);
    $pdf->Cell(10, 10, $row['sampah'], 1, 1);
}

// menampilkan atau mengunduh file PDF
$pdf->Output('data_database.pdf', 'I');

// menutup koneksi ke database
mysqli_close($conn);
?>
