<?php
include'../koneksi.php';
include'../fpdf181/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage('P','A4');

$tgl=date('Y/m/d');
$pdf->Image('../images/latar-kartu.jpg',5,5,100,56);
$pdf->Image('../images/latar-kartu.jpg',106,5,100,56);
$pdf->Image('../images/logo-puskesmas.png',10,9,10,10);
$pdf->Image('../images/foto-default.jpg',80,29,20,25);
$pdf->setFont('Arial','B',12);
$pdf->Cell(90,5,'PUSKESMAS SEMOGA SEHAT',0,0,'C');
$pdf->Cell(10,5,'',0,0,'C');
$pdf->setFont('Arial','B',10);
$pdf->Cell(90,5,'KETENTUAN',0,1,'C');
$pdf->setFont('Arial','B',8);
$pdf->Cell(90,5,'Jl.Apel No 11, Telp (001)345678',0,0,'C');
$pdf->Cell(10,5,'',0,0,'C');
$pdf->setFont('Arial','',7);
$pdf->Cell(90,5,'- Ketentuan 1',0,1,'L');
$pdf->SetLineWidth(0.2);
$pdf->Line(10,20,100,20);
$pdf->setFont('Arial','B',10);
$pdf->Cell(90,5,'KARTU BEROBAT',0,0,'C');
$pdf->Cell(10,5,'',0,0,'C');
$pdf->setFont('Arial','',7);
$pdf->Cell(90,5,'- Ketentuan 2',0,1,'L');
$pdf->SetLineWidth(0.2);
$pdf->Line(10,25,100,25);
$pdf->Ln(6);

$id_pasien=$_GET['id'];
$q_pasien=mysql_query(
	"SELECT * FROM tbpasien
	WHERE idpasien='$id_pasien'"
);
$r_pasien=mysql_fetch_array($q_pasien);
$pdf->setFont('Arial','',9);
$pdf->Cell(22,4,'ID Pasien',0,0,'L');
$pdf->Cell(36,4,': '.$r_pasien['idpasien'],0,0,'L');
$pdf->Cell(10,4,'',0,1,'C');
$pdf->setFont('Arial','',10);
$pdf->Cell(22,4,'Nama Pasien',0,0,'L');
$pdf->Cell(36,4,': '.$r_pasien['namapasien'],0,1,'L');
$pdf->Cell(22,4,'Jenis Kelamin',0,0,'L');
$pdf->Cell(36,4,': '.$r_pasien['jeniskelamin'],0,1,'L');
$pdf->Cell(22,4,'Nama KK',0,0,'L');
$pdf->Cell(36,4,': '.$r_pasien['namakk'],0,1,'L');
$pdf->Cell(22,4,'Alamat',0,0,'L');
$pdf->Cell(36,4,': '.$r_pasien['alamat'],0,1,'L');
$pdf->Ln(2);

$pdf->Output('cetak-kartu-berobat.pdf','I');
?>	