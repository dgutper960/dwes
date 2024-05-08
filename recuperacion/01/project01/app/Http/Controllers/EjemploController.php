<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EjemploController extends Controller
{
    // Creamos solo un método
    public function __invoke(){

        // en controlador se llama $name
        $name = '<b>David</b>';
        $curso = '<b>2DAW 23/24</b>';

        // Pasamos como parametro un array
        $asignaturas = ['DWES', 'DWEC', 'JAVA', 'Empresa'];
        // en la vista se llama $nombre
        // return view('ejemplo.home', ['nombre'=> $name, 'curso'=>$curso, 'asignaturas'=> $asignaturas]);
        return view('ejemplo.principal', ['nombre'=> $name, 'curso'=>$curso, 'asignaturas'=> []]);
    }
}
