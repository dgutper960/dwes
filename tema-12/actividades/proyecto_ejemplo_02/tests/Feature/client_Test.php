<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class client_Test extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_edit(): void
    {
        $response = $this->get('/client/edit/5'); // Introduce la ruta establecida

        $response->assertStatus(200); // 200 estado de recurso existente
        $response->assertSee('Editar Cliente: 5');

    }


    
    public function test_delete(): void
    {
        $response = $this->get('/client/delete/5/10'); // Introduce la ruta establecida

        $response->assertStatus(200); // 200 estado de recurso existente
        $response->assertSee('Eliminando Clientes del 5 al 10');

    }


}