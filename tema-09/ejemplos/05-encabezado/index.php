<?php
/*
    Creamos un objeto de la clase FPDF
        Mostramos una imagen
*/
require('fpdf/fpdf.php'); // cargamos el fichero main de la librería FPDF
//require('class/pdfArticulos.php');

$pdf = new FPDF();

$pdf->SetFont('Times', '', 10);
$pdf->AddPage();
$pdf->Image('images/CupHead.jpg', 25, 10, 130); // ('ruta', posVert, posHor, Tamaño)




$pdf->Output();
