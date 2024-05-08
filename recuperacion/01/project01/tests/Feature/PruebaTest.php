<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PruebaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    #[Test]
    function test_2_example(): void
    {
        $response = $this->get('/student');
        $response->assertStatus(200);
        $response->assertSee('Main de Alumnos');
    }

       #[Test]
       function test_3_test(): void
       {
           $response = $this->get('/test');
           $response->assertStatus(200);
           $response->assertSee('David - DWES - 2DAW - Prueba');
       }

       #[Test]
       function test_4_api_user(): void
       {
           $response = $this->get('/api/user');
           $response->assertStatus(200);
           $response->assertSee('La física es el sistema operativo del Universo. Steven R Garman');
       }

       
       #[Test]
       function test_5_nombre(): void
       {
           $response = $this->get('/David/Gutiérrez');
           $response->assertStatus(200);
           $response->assertSee('Usuario: David Gutiérrez');
       }
    
       
       #[Test]
       function test_6_user_vew(): void
       {
           $response = $this->get('/user/view/4');
           $response->assertStatus(200);
           $response->assertSee('Usuario id: 4');
       }

       
       #[Test]
       function test_7_cuenta_cliente(): void
       {
           $response = $this->get('/cliente/cuenta/David/5');
           $response->assertStatus(200);
           $response->assertSee('Perfil de David. Mostrando detalles de la cuenta 5');
       }


       
       #[Test]
       function test_8_cuenta_cliente(): void
       {
           $response = $this->get('/cliente/cuenta/David/');
           $response->assertStatus(200);
           $response->assertSee('Seleccione una cuenta de David');
       }


    

}
