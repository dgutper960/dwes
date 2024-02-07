<?php
/*
    Creamos un objeto de la clase FPDF
        Mostramos una imagen
*/
require('fpdf/fpdf.php'); // cargamos el fichero main de la librería FPDF
require('class/pdfArticulos.php');

$pdf = new PdfArticulos();
$pdf->AliasNbPages(); // para mostrar num página de total paginas
$pdf->SetFont('Times', '', 10);
$pdf->AddPage();
$pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'articulo de prueba'), 0,0,'R');
$pdf->Output();


