<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RutasTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    
    public function test_api(): void
    {
        $response = $this->get('/api/user'); // Introduce la ruta establecida

        $response->assertStatus(200); // 200 estado de recurso existente
        $response->assertSee('Si una máquina puede pensar, resolverá problemas inimaginables para los seres humanos. Alan Turing');

    }

    public function test_nombre(): void
    {
        $response = $this->get('/nombre/apellidos'); // Introduce la ruta establecida

        $response->assertStatus(200); // 200 estado de recurso existente
        $response->assertSee('Usuario: nombre apellidos');
    }


    public function test_id(): void
    {
        $response = $this->get('/user/view/5'); // Introduce la ruta establecida

        $response->assertStatus(200); // 200 estado de recurso existente
        $response->assertSee('El id del usuario es: 5');
    }

    public function test_stock(): void
    {
        $response = $this->get('/libros/stock/lacelestina'); // Introduce la ruta establecida

        $response->assertStatus(200); // 200 estado de recurso existente
        $response->assertSee('El libro lacelestina, no dispone de stock actualmente'); 

    }

    /** @test */
    public function my_pruebaStock(){
        $response = $this->get('/libros/stock/lacelestina/200'); // Introduce la ruta establecida

        $response->assertStatus(200); // 200 estado de recurso existente
        $response->assertSee('El libro lacelestina, dispone de 200 unidades'); 
    }


    
}
