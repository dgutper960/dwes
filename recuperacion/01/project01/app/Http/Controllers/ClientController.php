<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return 'Mostrando CRUD de clientes';
        return view('clientes.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'Nuevo Cliente';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'Cliente creado correctamente';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Mostrando detalles del cliente {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Formulario edición del cliente {$id}";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Cliente {$id} actualizado correctamente";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Cliente {$id} eliminado correctamente";
    }
}
