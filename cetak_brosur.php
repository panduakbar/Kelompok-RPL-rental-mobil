<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string
$pdf->Cell(290, 7, 'AutoRent', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(290, 7, 'Cetak Brosur Sewa Mobil', 0, 1, 'C');
$pdf->Line(10,25,285,25);
$pdf->Ln(10);
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(90, 6, 'NAMA Mobil', 1, 0);
$pdf->Cell(50, 6, 'Nomor Polisi', 1, 0);
$pdf->Cell(50, 6, 'Harga', 1, 0);
$pdf->Cell(50, 6, 'Tipe Bahan Bakar', 1, 0);
$pdf->Cell(35, 6, 'Status', 1, 1);

$pdf->SetFont('Arial', '', 10);
include 'config.php';
$data = mysqli_query($conn, "select * from mobil");
while ($row = mysqli_fetch_array($data)) {
    $pdf->Cell(90, 6, $row['nama_mobil'], 1, 0);
    $pdf->Cell(50, 6, $row['no_polisi'], 1, 0);
    $pdf->Cell(50, 6, $row['harga'], 1, 0);
    $pdf->Cell(50, 6, $row['type_bb'], 1, 0);
    $pdf->Cell(35, 6, $row['statuss'], 1, 1);
}
$pdf->Output();
