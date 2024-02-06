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
$pdf->Cell(40,10, iconv('UTF-8', 'ISO-8859-1','¡Mi segunda página pdf con iconv()!')); // iconv() -> Establece carácteres en español, MÁS USADO

$pdf->Output();

