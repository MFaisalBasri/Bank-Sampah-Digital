<?php
require_once('../../../asset/library/FPDF-master/fpdf.php'); // memuat library TCPDF

// koneksi ke database
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'db_bankSampah';
$conn = mysqli_connect($host, $user, $pass, $dbname);

// mengambil data dari tabel di database
$query = "SELECT * FROM sampah";
$result = mysqli_query($conn, $query);

// membuat objek PDF
$pdf = new FPDF();

// menambah halaman
$pdf->AddPage();

// menampilkan judul
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Data Sampah', 0, 1, "C");

// menampilkan data
$pdf->SetFont('Arial', '', 12);
while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(30, 10, $row['jenis_sampah'], 1);
    $pdf->Cell(40, 10, $row['satuan'], 1);
    $pdf->Cell(100, 13, $row['gambar'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['deskripsi'], 1, 1);
}

// menampilkan atau mengunduh file PDF
$pdf->Output('data_database.pdf', 'I');

// menutup koneksi ke database
mysqli_close($conn);
?>
