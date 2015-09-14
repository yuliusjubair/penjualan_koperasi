<?php
session_start();
require('pdf/fpdf.php');
class PDF extends FPDF
{
//Page header
/*function Header()
{
	//Logo
	//$this->Image('',12,10,33);
	//Arial bold 15
	$this->SetFont('Arial','B',15);
	//Move to the right
	$this->Cell(10);
	//Title
	$this->Cell(160,10,'LAPORAN ANGGOTA KOPERASI MITRA SETIA',1,0,'C');
	//Line break
	$this->Ln(40);
}*/

//Page footer
function Footer(){
	//Position at 1.5 cm from bottom
	$this->SetY(-15);
	//Arial italic 8
	$this->SetFont('Arial','I',8);
	//Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
			}
}

$tgl = date('d - m - Y');

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
//$pdf->text(90,30,'PT. NYALINDUNG');
$tahun = $_GET['tahun'];
$pdf->text(55,36,'LAPORAN ANGGOTA KOPERASI PT. MEDAN JAYA '.$tahun);
$yi = 50;
$ya = 44;
$pdf->setFont('Arial','',6);
$pdf->setFillColor(222,222,222);
$pdf->setXY(35,$ya);

$pdf->CELL(20,5,'NO ANGGOTA',1,0,'C',1);									
$pdf->CELL(20,5,'NAMA',1,0,'C',1);
$pdf->CELL(25,5,'NO KTP',1,0,'C',1);
$pdf->CELL(30,5,'ALAMAT',1,0,'C',1);
$pdf->CELL(15,5,'KOTA',1,0,'C',1);
$pdf->CELL(15,5,'AKTIVASI',1,0,'C',1);
$ya = $yi + $row;
include "../config/koneksi.php";

$tahun = $_GET['tahun'];
$sql = mysql_query("select * from mst_anggota where status_pegawai = 0")
					 or die ("salah sql");
$i = 1;
$no = 1;
$max = 31;
$row = 6;
while($data = mysql_fetch_array($sql)){
$pdf->setXY(35,$ya);
$pdf->setFont('arial','',6);
$pdf->setFillColor(255,255,255);
if($data[aktivasi]==0){
								$ak = "Belum Aktif";
							}else{
								$ak = "Sudah Aktif";
							}
$pdf->cell(20,5,$data[no_anggota],1,0,'L',1);
$pdf->CELL(20,5,$data[nama_lengkap],1,0,'C',1);
$pdf->CELL(25,5,$data[no_ktp],1,0,'C',1);
$pdf->CELL(30,5,$data[alamat],1,0,'C',1);
$pdf->CELL(15,5,$data[kota],1,0,'C',1);
$pdf->CELL(15,5,$ak,1,0,'C',1);

$ya = $ya+$row;
$no++;
$i++;
$dm[kode] = $data[kdprog];
}

$pdf->text(120,$ya+6,"Bandung , ".$tgl);
$pdf->text(125,$ya+20,"MANAGER");

$pdf->Output();
?>