<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Cuando creamos controladores con un solo metodo lo llamamos __invoke
    public function __invoke(){

        $autor = 'David';
        return view('home.index', compact('autor')); // ruta nome.index.php
    }
}
