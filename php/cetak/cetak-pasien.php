<?php
include'../koneksi.php';
include'../fpdf181/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage('P','A4');

$tgl=date('Y/m/d');
$pdf->setFont('Arial','B',12);
$pdf->Image('../images/logo-puskesmas.png',10,8,20,19);
$pdf->Cell(187,6,'PUSKESMAS SEMOGA SEHAT',0,1,'C');
$pdf->setFont('Arial','B',8);
$pdf->Cell(187,6,'Jl.Apel No 11, Telp(001)345678',0,1,'C');
$pdf->SetLineWidth(0.3);
$pdf->Line(10,28,200,28);
$pdf->setFont('Arial','B',10);
$pdf->Cell(187,6,'Laporan Data Pasien',0,1,'C');
$pdf->Ln(1);	
$pdf->setFont('Arial','B',8);
$pdf->Cell(187,4,'Tanggal Cetak '.$tgl,0,1,'C');

$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(192,192,192);
$pdf->Cell(8,6,'No',1,0,'L',1);
$pdf->Cell(15,6,'ID Pasien',1,0,'L',1);
$pdf->Cell(33,6,'Nama Pasien',1,0,'L',1);
$pdf->Cell(21,6,'Tanggal Lahir',1,0,'L',1);
$pdf->Cell(22,6,'Jenis Kelamin',1,0,'L',1);
$pdf->Cell(33,6,'Nama Kepala Keluarga',1,0,'L',1);
$pdf->Cell(58,6,'Alamat',1,1,'L',1);

$nomor=0;
$q_pasien=mysql_query("SELECT * FROM tbpasien");
while($r_pasien=mysql_fetch_array($q_pasien)){
	$nomor++;
	$pdf->Ln(0);
	$pdf->setFont('Arial','',7);
	$pdf->Cell(8,4,$nomor,1,0,'L');
	$pdf->Cell(15,4,$r_pasien['idpasien'],1,0,'L');
	$pdf->Cell(33,4,$r_pasien['namapasien'],1,0,'L');
	$pdf->Cell(21,4,$r_pasien['tgllahir'],1,0,'L');
	$pdf->Cell(22,4,$r_pasien['jeniskelamin'],1,0,'L');
	$pdf->Cell(33,4,$r_pasien['namakk'],1,0,'L');
	$pdf->Cell(58,4,$r_pasien['alamat'],1,1,'L');
}
$pdf->Output('cetak-pasien.pdf','I');
?>			