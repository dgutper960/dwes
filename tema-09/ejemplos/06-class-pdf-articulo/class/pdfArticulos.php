<?php

class PdfArticulos extends FPDF{ //heredamos todas las proiedades y métodos de FPDF


    /**
     * Sobreescribimos el método del padre Header
     */
    public function Header(){
        $this->image('images/CupHead.jpg', 10, 5, 20);
        $this->SetFont('Arial', 'B', 10);
        // Subralla Cabecera
        $this->Cell(0, 16, 'Cup Head', 'B', 1, 'R');
        // Margen respecto a la cabecera (salto de linea)
        $this->ln(5); // fuerza un salto de línea de 5mm

    }

    /**
     * Sobreescribimos el método del padre Footer
     */
    public function Footer(){
        $this->setY(-10);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 10, 'Page '.$this->PageNo().'/{nb}', 'T', 0, 'C');
    }

    public function Titulo(){
        $this->SetFont('Courier', 'B', 12);
        $this->SetFillColor(240);
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Listado de artículos'), 0,0,'C', true);
        $this->ln(20); // fuerza un salto de línea de 5mm
    }

    public function Cabecera(){
        $this->SetFont('Courier', 'B', 10);
        $this->SetFillColor(240);
        $this->Cell(10, 7, iconv('UTF-8', 'ISO-8859-1', 'id'),'B',0,'R', true);
        $this->Cell(50, 7, iconv('UTF-8', 'ISO-8859-1', 'Descripción'),'B', 0, 'L', true);
        $this->Cell(30, 7, iconv('UTF-8', 'ISO-8859-1', 'Fabricante'),'B', 0, 'L', true);
        $this->Cell(40, 7, iconv('UTF-8', 'ISO-8859-1', 'Categoría'),'B', 0, 'L', true);
        // $this->Cell(20, 7, iconv('UTF-8', 'ISO-8859-1', 'Etiquetas'),'B', 0, 'L', true);
        $this->Cell(30, 7, iconv('UTF-8', 'ISO-8859-1', 'Precio'),'B', 1, 'R', true);
        // debemos tener en cuenta la anchura total del pdf para que quede correcto el maquetado
    }

}
