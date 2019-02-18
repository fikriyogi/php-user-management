<?php
include'../../core/db_connect.php';
include'../fpdf181/fpdf.php';


$pdf = new FPDF();
$pdf->AddPage('P','A4');


$id_dps=$_GET['id_dps'];
$q_user=mysqli_query($connect,
	"SELECT * FROM dps
	WHERE id_dps='$id_dps'"
);
$r_user=mysqli_fetch_array($q_user);



$tgl=date('Y/m/d');
$pdf->Image('../../img/core/latar-kartu.jpg',5,5,100,56);
$pdf->Image('../../img/core/latar-kartu.jpg',106,5,100,56);
$pdf->Image('../../img/core/logo-puskesmas.png',10,9,10,10);
$pdf->Image('../../img/images/1401010404660003.png',80,29,20,25);
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
$pdf->Cell(90,5,'KARTU IDENTITAS USER',0,0,'C');
$pdf->Cell(10,5,'',0,0,'C');
$pdf->setFont('Arial','',7);
$pdf->Cell(90,5,'- Ketentuan 2',0,1,'L');
$pdf->SetLineWidth(0.2);
$pdf->Line(10,25,100,25);
$pdf->Ln(6);


$pdf->setFont('Arial','',10);
$pdf->Cell(14,5,'ID User',0,0,'L');
$pdf->Cell(76,5,': '.$r_user['id_dps'],0,0,'L');
$pdf->Cell(10,5,'',0,1,'C');
$pdf->setFont('Arial','',10);
$pdf->Cell(14,5,'Nama',0,0,'L');
$pdf->Cell(36,5,': '.$r_user['nama'],0,1,'L');
$pdf->Cell(14,5,'Alamat',0,0,'L');
$pdf->Cell(36,5,': '.$r_user['nik'],0,1,'L');
$pdf->Ln(2);

$pdf->Output('cetak-kartu-identitas-user.pdf','I');
?>	