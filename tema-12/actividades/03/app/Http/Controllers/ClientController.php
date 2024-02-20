<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Mostrar todos los clientes
    public function index(){
        return 'Lista de Clientes';
    }

    public function create(){
        return 'Nuevo Cliente';
    }

    public function show($id){
        return "Mostrar cliente {$id}";
    }

    public function edit($id){
        return "Editando cliente {$id}";
    }
}
