<?php
/*
    Creamos un objeto de la clase FPDF
*/
require('fpdf/fpdf.php'); // cargamos el fichero main de la librería FPDF
// instanciamos la clase (ojo, va en mayúsculas)
$pdf=new FPDF();
// añadimos página
$pdf->AddPage();
// seleccionamos tipo de letra
$pdf->SetFont('Arial','B',16);
// Insertamos una celda
// Márgenes por defecto de 10mm, 10mm, 10mm, 10mm
//-> Si el texto sobrepasa las dimensiones de la celda, la información se trunca
//-> 40mm ancho, 10mm alto, texto para esa celda
$pdf->Cell(40,10, mb_convert_encoding('¡Mi primera página pdf con FPDF!', 'ISO-8859-1', 'UTF-8')); // mb_convert_encoding() -> Establece carácteres en español

$pdf->Output();

