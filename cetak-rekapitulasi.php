<?php
require "FPDF/fpdf.php";
include "tgl.php"; //pemanggilan tanggal untuk convert ke format d F Y
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'keuangan');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$from=$_POST['from'];
$end=$_POST['end'];
{
date_default_timezone_set('Asia/Jakarta');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
}


class mypdf extends FPDF{

    function header(){
        $from=$_POST['from'];
        $end=$_POST['end'];
        $dari=''.tglindo("$_POST[from]").'';
        $sampai=''.tglindo("$_POST[end]").'';
        $this->SetDrawColor(0,80,180);
        $this->SetFillColor(220,230,0);
        // $this->SetTextColor(220,50,50);
        $this->setfont('Arial','B',12);
        $this->cell(276,5,'GARUDA MUDA',0,0,'C');
        $this->Ln();
        $this->setfont('Arial','B',12);
        $this->cell(276,10,'RW 08 PAPAN MAS, TAMBUN SELATAN',0,0,'C');
        $this->Ln(5);
        $this->setfont('Arial','B',12);
        $this->cell(276,15,'Telp. +62 851 5533 3776',0,0,'C');
        $this->Ln(5);
        $this->setfont('Arial','B',12);
        $this->cell(276,30,'LAPORAN REKAPITULASI',0,0,'C');
        $this->Ln(5);
        $this->setfont('Arial','B',12);
        $this->cell(131,35,$dari,0,0,'R');
        $this->cell(11,35,'S/D',0,0,'R');
        $this->cell(40,35,$sampai,0,0,'R');
        $this->Ln(2);
        $this->Cell(276,1,'','B',1,'C');
        $this->Cell(276,1,'','B',0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->setY(-15);
        $this->setfont('Arial','',8);
        $this->cell(0,10,'Page '.$this->Pageno().'/{nb}',0,0,'C');
    }
    Function headerTable(){
        $this->setfont('Times','B',12);
        $this->SetFillColor(220,220,0);
        // $this->SetTextColor(220,50,50);
        $this->SetDrawColor(0,80,180);
        // $this->SetLineWidth(.3);
        $this->cell(10,7,'No',1,0,'C',true);
        $this->cell(40,7,'Tanggal',1,0,'C',true);
        $this->cell(110,7,'Uraian',1,0,'C',true);
        $this->cell(40,7,'Debet',1,0,'C',true);
        $this->cell(40,7,'Kredit',1,0,'C',true);
        $this->cell(40,7,'Saldo',1,0,'C',true);
        $this->Ln();
       
        
    } 
    function viewtable($con, $from, $end){
        $this->setfont('Times','',12); 
        $query=mysqli_query($con,"select * from kas WHERE (tgl BETWEEN '$from' AND '$end') order by tgl asc");
while($lihat=mysqli_fetch_array($query)){
$total_masuk=$lihat['debit'];
@$hitung+=$total_masuk;
$total_keluar=$lihat['kredit'];
@$saldo = $saldo + ($lihat['debit'] - $lihat['kredit']);
@$hitung1+=$total_keluar;
$keseluruhan=$hitung-$hitung1;
$tglinv=''.tglindo("$lihat[tgl]").'';
@$no++;

            
            $this->cell(10,7, @$no, 1, 0,'C');
            $this->Cell(40,7, $tglinv,1,0,'C');
            $this->Cell(110,7,$lihat['uraian'],1,0,'L');
            $this->Cell(0.001 ,7,'Rp. ',1,0);
            $this->Cell(40, 7, "".number_format($lihat['debit']).",00", 1, 0,'R');
            $this->Cell(0.001 ,7,'Rp. ',1,0);
            $this->Cell(40, 7, "".number_format($lihat['kredit']).",00", 1, 0,'R');
            $this->Cell(0.001 ,7,'Rp. ',1,0);
            $this->Cell(40, 7, "".number_format(@$saldo).",00", 1, 0,'R');
            $this->Ln();
            
        }

            $this->Cell(160, 7, 'JUMLAH', 1,0,'C',true);
            $this->Cell(0.001 ,7,'Rp. ',1,0,'L',true);
            $this->Cell(40, 7, "".number_format(@$hitung).",00", 1, 0,'R',true);
            $this->Cell(0.001 ,7,'Rp. ',1,0,'L');
            $this->Cell(40, 7, "".number_format(@$hitung1).",00", 1, 0,'R',true);
            $this->Cell(0.001 ,7,'Rp. ',1,0,'L');
            $this->Cell(40, 7, "".number_format(@$keseluruhan).",00", 1, 0,'R',true);

              $this->Ln(); 
         //menampilkan fungsi format tanggal Indonesia
              $bulan = array ("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
              $waktu[1]=date("d",time());
              $waktu[2]=date("m",time());
              $waktu[3]=date("Y",time());
              $tanggalini="$waktu[1] ".$bulan[$waktu[2]-1]." $waktu[3]";
        // mencetak tanggal
        $this->Ln(4);
        $this->Cell(276,15,' Bekasi, '.$tanggalini,0,1, 'R');
      
        $this->Cell(266,1,'Bendahara',0,1, 'R');  
        $this->Ln(5);
       
            $this->Cell(272,30,'Tukang Hitung',0,1,'R');
        }
        





    }

      






$pdf = new mypdf();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewtable($con, $from, $end);

$pdf->Output();   