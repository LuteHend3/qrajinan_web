<?php
include'../../db.php';
// Memanggil file fpdf yang anda tadi simpan di folder htdoc
require('fpdf/fpdf.php');
{
date_default_timezone_set('Asia/Jakarta');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
}

// Ukuran kertas PDF
$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->ln(1);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(25,0.8,'QRAJINAN MARKET',0,1,'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25,0.8,'REKAP LAPORAN QRAJINAN MARKET',0,1,'C');
$pdf->ln(1);
//Format tanggal
$pdf->Cell(7,0.7,"Printed On : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
// st font yang ingin anda gunakan
$pdf->SetFont('Arial','B',10);
// queri yang ingin di tampilkan di tabel sehingga ketika diubah tidak akan berpengaruh
// Kode 1, 0, 'C' dan banyak kode di bawah adalah ukuran lebar tabel ubah jika tidak sesuai keinginan anda.
$pdf->SetFillColor(222,184,135);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C', true);
$pdf->SetFillColor(222,184,135);
$pdf->Cell(8, 0.8, 'Nama Product', 1, 0, 'C', true);
$pdf->SetFillColor(222,184,135);
$pdf->Cell(4.5, 0.8, 'Harga', 1, 0, 'C', true);
$pdf->SetFillColor(222,184,135);
$pdf->Cell(3, 0.8, 'Kuantitas', 1, 0, 'C', true);
$pdf->SetFillColor(222,184,135);
$pdf->Cell(4.5, 0.8, 'Tgl Transaksi', 1, 0, 'C', true);
$pdf->SetFillColor(222,184,135);
$pdf->Cell(1, 0.8, 'User', 1, 0, 'C', true);
$pdf->SetFillColor(222,184,135);
$pdf->Cell(2, 0.8, 'Status', 1, 1, 'C', true);
$pdf->SetFillColor(222,184,135);
$pdf->SetFont('Arial','',10);
$no=1;
// from dan edn ini adalah nama dari form star_filter.php yang berfungsi untuk memanggil tanggal yang di atur
$from=$_POST['from'];
$end=$_POST['end'];
// memanggil database
$query=mysqli_query($connection,"SELECT * FROM transaksi JOIN product ON transaksi.id_product = product.id_product WHERE (tgl_transaksi BETWEEN '$from' AND '$end')") or die(mysqli_error());
while($lihat=mysqli_fetch_array($query)){
// Queri yang ingin ditampilkan yang berada di database
 $pdf->Cell(1, 0.8, $no, 1, 0, 'C');
 $pdf->Cell(8, 0.8, $lihat['nama_product'], 1, 0,'C');
 $pdf->Cell(4.5, 0.8, $lihat['harga_produk'], 1, 0,'C');
 $pdf->Cell(3, 0.8, $lihat['kuantitas_transaksi'],1, 0, 'C');
 $pdf->Cell(4.5, 0.8, $lihat['tgl_transaksi'],1, 0, 'C');
 $pdf->Cell(1, 0.8, $lihat['id_user'], 1, 0,'C');
 $pdf->Cell(2, 0.8, $lihat['status_transaksi'], 1, 1,'C');

 $no++;
}
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(40.5,0.7,"TTD",0,10,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40.5,0.7,"CEO Qrajinan Market",0,10,'C');
// Nama file ketika di print
$pdf->Output("laporan_Qrajinan.pdf","I");

?>
