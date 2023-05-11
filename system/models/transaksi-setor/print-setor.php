<?php
require_once('../../../asset/library/FPDF-master/fpdf.php'); // memuat library TCPDF

// koneksi ke database
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'db_bankSampah';
$conn = mysqli_connect($host, $user, $pass, $dbname);

// mengambil data dari tabel di database
$query = "SELECT * FROM setor";
$result = mysqli_query($conn, $query);

// membuat objek PDF
$pdf = new FPDF();

// menambah halaman
$pdf->AddPage();

// menampilkan judul
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Data Transaksi Setor', 0, 1, "C");

// menampilkan data
$pdf->SetFont('Arial', '', 10);
while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(10, 10, $row['id_setor'], 1);
    $pdf->Cell(30, 10, $row['tanggal_setor'], 1);
    $pdf->Cell(30, 10, $row['nin'], 1);
    $pdf->Cell(30, 10, $row['jenis_sampah'], 1);
    $pdf->Cell(10, 10, $row['berat'], 1);
    $pdf->Cell(20, 10, $row['harga'], 1);
    $pdf->Cell(20, 10, $row['total'], 1);
    $pdf->Cell(30, 10, $row['nia'], 1, 1);
}

// menampilkan atau mengunduh file PDF
$pdf->Output('data_database.pdf', 'I');

// menutup koneksi ke database
mysqli_close($conn);
?>
