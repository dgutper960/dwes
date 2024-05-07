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

    /** @test */
    function test_2example(): void
    {
        $response = $this->get('/student');
        $response->assertStatus(200);
        $response->assertSee('Main de Alumnos');
    }

    
    /** @test */
    // function test_2example(): void
    // {
    //     $response = $this->get('/student');
    //     $response->assertStatus(200);
    //     $response->assertSee('Main de Alumnos');
    // }

}
