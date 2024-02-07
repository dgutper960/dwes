<?php
/*
    Creamos un objeto de la clase FPDF
        Mostramos una imagen
*/
require('fpdf/fpdf.php'); // cargamos el fichero main de la librería FPDF
require('class/pdfArticulos.php');
require('datos/articulos.php');

$pdf = new PdfArticulos();
$pdf->AliasNbPages(); // para mostrar num página de total paginas
$pdf->AddPage();
$pdf->SetFont('Courier', '', 10);

// Muestro el Titulo del documento
$pdf->Titulo();

// Muestro la cabecera del
$pdf->Cabecera();

// Muestro el resultado de la consulta
foreach($articulos as $articulo){
    $pdf->Cell(10, 7, iconv('UTF-8', 'ISO-8859-1', $articulo['id']), 0, 0,'R');
    $pdf->Cell(40, 7, iconv('UTF-8', 'ISO-8859-1', $articulo['Descripción']), 0, 0,'L');
    $pdf->Cell(20, 7, iconv('UTF-8', 'ISO-8859-1', $articulo['Fabricante']), 0, 0,'L');
    $pdf->Cell(20, 7, iconv('UTF-8', 'ISO-8859-1', $articulo['Categoría']), 0, 0,'L');
    $pdf->Cell(40, 7, iconv('UTF-8', 'ISO-8859-1', implode(', ', $articulo['Etiquetas'])), 0, 0,'L'); // Etiquetas es un array
    $pdf->Cell(20, 7, iconv('UTF-8', 'ISO-8859-1', $articulo['Precio']),'B', 1, 'R');
}

// $pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'articulo de prueba'), 0,0,'R');
$pdf->Output();


