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


}
