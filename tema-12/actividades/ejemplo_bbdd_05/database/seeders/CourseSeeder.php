<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Añadimos varios Cursos Manualmente
        DB::table('courses')->insert(
            [
                [
                    'course' => '1DAW',
                    'ciclo' => 'Desarrollo de Aplicaciones Web'
                ],
                [
                    'course' => '2DAW',
                    'ciclo' => 'Desarrollo de Aplicaciones Web'
                ],
                [
                    'course' => '1AD',
                    'ciclo' => 'Asistencia de Dirección'
                ],
                [
                    'course' => '2AD',
                    'ciclo' => 'Asistencia de Dirección'
                ]

            ]
        );

    // Insertar un registro aleatorio
        DB::table('courses')->insert(
            [
                'course' => Str::random(20),
                'ciclo' => Str::random(15).'FP'
            ]

            );
    }
}
