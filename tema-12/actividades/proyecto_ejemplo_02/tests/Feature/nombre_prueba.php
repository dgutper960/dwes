<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class nombre_prueba extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/Ruta_No_Valida'); // Introduce la ruta establecida

        $response->assertStatus(200); // 200 estado de recurso existente

        
    }
}
