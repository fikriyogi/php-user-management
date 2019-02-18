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
$pdf->Cell(187,6,'Laporan Kunjungan Pasien',0,1,'C');
$pdf->Ln(1);	
$pdf->setFont('Arial','B',8);
$pdf->Cell(187,4,'Tanggal Cetak '.$tgl,0,1,'C');
		
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(192,192,192);
$pdf->Cell(8,6,'No',1,0,'L',1);
$pdf->Cell(20,6,'ID Kunjungan',1,0,'L',1);
$pdf->Cell(18,6,'ID Pasien',1,0,'L',1);
$pdf->Cell(60,6,'Nama Pasien',1,0,'L',1);
$pdf->Cell(22,6,'Jenis Kelamin',1,0,'L',1);
$pdf->Cell(34,6,'Poli Tujuan',1,0,'L',1);
$pdf->Cell(28,6,'Tanggal Kunjungan',1,1,'L',1);

$nomor=0;
$q_kunjungan=mysql_query(
	"SELECT tbkunjungan.*,tbpasien.*,tbpoli.*
	FROM tbkunjungan,tbpasien,tbpoli
	WHERE tbkunjungan.idpasien=tbpasien.idpasien
	AND tbkunjungan.idpoli=tbpoli.idpoli
	ORDER BY tbkunjungan.idkunjungan DESC"
);
while($r_kunjungan=mysql_fetch_array($q_kunjungan)){
	$nomor++;
	$pdf->Ln(0);
	$pdf->setFont('Arial','',7);
	$pdf->Cell(8,4,$nomor,1,0,'L');
	$pdf->Cell(20,4,$r_kunjungan['idkunjungan'],1,0,'L');
	$pdf->Cell(18,4,$r_kunjungan['idpasien'],1,0,'L');
	$pdf->Cell(60,4,$r_kunjungan['namapasien'],1,0,'L');
	$pdf->Cell(22,4,$r_kunjungan['jeniskelamin'],1,0,'L');
	$pdf->Cell(34,4,$r_kunjungan['namapoli'],1,0,'L');
	$pdf->Cell(28,4,$r_kunjungan['tglkunjungan'],1,1,'L');
}
	
$pdf->Output('cetak-kunjungan.pdf','I');
?>			