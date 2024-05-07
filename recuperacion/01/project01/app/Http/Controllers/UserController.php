<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //ejemplo

    // Index
    public function index(){
        return 'Main';
    }
    // View
    public function view($id){
        return "Mostrar Usuario {$id}";
    }

    // New
    public function new(){
        return 'Insterat Usuario';
    }



}
