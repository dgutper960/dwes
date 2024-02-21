<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends Controller
{


    public function index(){
        return 'Lista de Clientes';
    }

    public function create(){
        return 'Nuevo Cliente';
    }

    public function update($id){
        return "Editando cliente {$id}";
    }

    public function delete($id1, $id2 = null){
        if(is_null($id2)){
            return "Eliminando cliente {$id1}";
        }else{
            return "Eliminando clientes del {$id1} al {$id2}";
        }
    }

    public function show($id){
        return "Mostrando vista del cliente {$id}";
    }
}
