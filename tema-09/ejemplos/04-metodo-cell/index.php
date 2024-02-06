<?php
/*
    Creamos un objeto de la clase FPDF
        - Parámetros de la clase FPDF
*/
require('fpdf/fpdf.php'); // cargamos el fichero main de la librería FPDF
// instanciamos la clase (ojo, va en mayúsculas)
$pdf=new FPDF(); //-> Parámetros por defecto ('P', 'mm', 'A4')

/*
    VARIABLES 
 */
$id = 1;
$apellidos = 'Jimenez Santos';
$nombre = 'Rodolfo';

// añadimos página
$pdf->AddPage();
// seleccionamos tipo de letra
$pdf->SetFont('Courier','B',16); //-> Arial, negrita, 16px

// insertamos celda con UTF-8
// $pdf->Cell(40,10, iconv('UTF-8', 'ISO-8859-1','¡Esta página es horizopntal!')); // iconv() -> Establece carácteres en español, MÁS USADO
// Color de fondo fondo de la celda
$pdf->SetFillColor(240, 120, 10); // establecemos color en rgb

// Documento
$pdf->Cell(60, 10, iconv('UTF-8', 'ISO-8859-1','ID:'), 1, 0, 'R', true);
$pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1',$id), 1, 1);
$pdf->Cell(60, 10, iconv('UTF-8', 'ISO-8859-1','Nombre:'), 1, 0, 'R', true);
$pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1',$nombre), 1, 1);
$pdf->Cell(60, 10, iconv('UTF-8', 'ISO-8859-1','Apellidos:'), 1, 0, 'R', true);
$pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1',$apellidos), 1);




$pdf->Output('D', 'informe.pdf', true); // (descarga automática, nombre del fichero)

