<?php

if(isset($_POST['pdf-submit']))
{
    $id=$_POST['id'];
    $termek=$_POST['termek'];
    $nettoar=$_POST['nettoar'];
    $idopont=$_POST['idopont'];
    $knev=$_POST['knev'];
    $vnev=$_POST['vnev'];
    $telszam=$_POST['telszam'];
    $lakcim=$_POST['lakcim'];
    $datum=date('Y-m-d');

    require 'tfpdf/tfpdf.php';

    $pdf = new tFPDF();
    $pdf->AddPage();
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->SetFont('DejaVu','',16);
    
    $pdf->SetFont('DejaVu','',14);
    
    $pdf->Cell(130 ,5,'Elektronikus Kisokos Kft',0,0);
    $pdf->Cell(59 ,5,'Számla',0,1);
    
    
    $pdf->SetFont('DejaVu','',12);
    
    $pdf->Cell(130 ,5,'[Szilágyi Lajos út 67]',0,0);
    $pdf->Cell(59 ,5,'',0,1);
    
    $pdf->Cell(130 ,5,'[Szigetszentmiklós, 2310]',0,0);
    $pdf->Cell(25 ,5,'Dátum',0,0);
    $pdf->Cell(34 ,5,'['.$datum.']',0,1);
    
    $pdf->Cell(130 ,5,'Telefonszám [+12345678]',0,0);
    $pdf->Cell(25 ,5,'Számlaszám',0,0);
    $pdf->Cell(34 ,5,'[1234567]',0,1);
    
    $pdf->Cell(25 ,5,'Adószám',0,0);
    $pdf->Cell(34 ,5,'[1234567]',0,1);
    
    
    $pdf->Cell(189 ,10,'',0,1);
    
    
    $pdf->Cell(100 ,5,'Vevő adatai',0,1);
    
    
    $pdf->Cell(10 ,5,'',0,0);
    $pdf->Cell(90 ,5,'['.$knev.' '.$vnev.']',0,1);
    
    $pdf->Cell(10 ,5,'',0,0);
    $pdf->Cell(90 ,5,'['.$lakcim.']',0,1);
    
    $pdf->Cell(10 ,5,'',0,0);
    $pdf->Cell(90 ,5,'['.$telszam.']',0,1);

    $pdf->Cell(189 ,10,'',0,1);

    $pdf->Cell(10 ,5,'',0,0);
    $pdf->Cell(90 ,5,'Rendelés azonosítószáma: ['.$id.']',0,1);
    $pdf->Cell(10 ,5,'',0,0);
    $pdf->Cell(90 ,5,'Rendelés időpontja: ['.$idopont.']',0,1);
    
    $pdf->Cell(189 ,10,'',0,1);
    
    
    $pdf->SetFont('DejaVu','',12);
    
    $pdf->Cell(130 ,5,'Megnevezés',1,0);
    $pdf->Cell(25 ,5,'Mennyiség',1,0);
    $pdf->Cell(34 ,5,'Nettó ár',1,1);
    
    $pdf->SetFont('DejaVu','',12);
    
    $pdf->Cell(130 ,5,$termek,1,0);
    $pdf->Cell(25 ,5,'1',1,0);
    $pdf->Cell(34 ,5,$nettoar,1,1,'R');
    
    $pdf->Cell(109 ,5,'',0,0);
    $pdf->Cell(40 ,5,'Termék adókulcs',0,0);
    $pdf->Cell(10 ,5,'%',1,0);
    $pdf->Cell(30 ,5,'27',1,1,'R');
    
    $pdf->Cell(109 ,5,'',0,0);
    $pdf->Cell(40 ,5,'Végösszeg',0,0);
    $pdf->Cell(10 ,5,'HUF',1,0);
    $pdf->Cell(30 ,5,($nettoar*1.27),1,1,'R');
    
    
    $pdf->Output();
}
else
{
    header('Location: index.php');
    exit();
}

