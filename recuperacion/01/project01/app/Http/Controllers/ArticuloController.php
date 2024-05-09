<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulos = [
            [
                'id' => 1,
                'descripcion' => 'Robot aspirador iRobot Roomba i7+',
                'categoria' => 'Aspiradoras',
                'stock' => 20,
                'precio_coste' => 599.99,
                'precio_venta' => 799.99
            ],
            [
                'id' => 2,
                'descripcion' => 'Cafetera Nespresso Vertuo Plus',
                'categoria' => 'Cafeteras',
                'stock' => 30,
                'precio_coste' => 149.99,
                'precio_venta' => 199.99
            ],
            [
                'id' => 3,
                'descripcion' => 'Microondas Panasonic NN-GD37HSBPQ',
                'categoria' => 'Microondas',
                'stock' => 25,
                'precio_coste' => 159.99,
                'precio_venta' => 199.99
            ],
            [
                'id' => 4,
                'descripcion' => 'Licuadora Philips HR1855/70',
                'categoria' => 'Licuadoras',
                'stock' => 15,
                'precio_coste' => 69.99,
                'precio_venta' => 89.99
            ]
        ];

        // Pasamos el array directamente en la función view()
        return view('articulos.main', ['articulos' => $articulos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
