<?php
/*
    Creamos un objeto de la clase FPDF
        - Parámetros de la clase FPDF
*/
require('fpdf/fpdf.php'); // cargamos el fichero main de la librería FPDF
// instanciamos la clase (ojo, va en mayúsculas)
//$pdf=new FPDF('P', 'mm', 'A4'); -> Parámetros por defecto (si no se establecen)
$pdf=new FPDF('L', 'mm', 'A4'); // -> Formato apaisado

// añadimos página
$pdf->AddPage();
// seleccionamos tipo de letra
$pdf->SetFont('Arial','B',16); //-> Arial, negrita, 16px
// insertamos celda con UTF-8
$pdf->Cell(40,10, iconv('UTF-8', 'ISO-8859-1','¡Esta página es horizopntal!')); // iconv() -> Establece carácteres en español, MÁS USADO


// añadimos página
$pdf->AddPage('P');
// seleccionamos tipo de letra
$pdf->SetFont('Arial','B',16); //-> Arial, negrita, 16px
// insertamos celda con UTF-8
$pdf->Cell(40,10, iconv('UTF-8', 'ISO-8859-1','Esta página es vertical!')); // iconv() -> Establece carácteres en español, MÁS USADO

$pdf->Output();

