<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Cuando creamos controladores con un solo metodo lo llamamos __invoke
    public function __invoke()
    {

        $autor = 'David';
        $modulo = null;
        $curso = '23/24';
        $nivel = 2;

        $clientes =[
            [
                'id' => 1,
                'nombre' => 'David'
            ],
            [
                'id' => 2,
                'nombre' => 'Sonia'
            ],
            [
                'id' => 3,
                'nombre' => 'Alfonsi'
            ]
        ];

        $usuarios = [];
    
        return view('home.index', compact('autor', 'modulo', 'curso', 'nivel', 'clientes', 'usuarios'));
    }
}