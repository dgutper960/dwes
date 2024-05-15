<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Añadimos varios cursos
        DB::table('courses')->insert(
            [
                [
                    'course'=>'1DAW',
                    'ciclo'=> 'Desarrollo de Aplicaciones Web'
                ],
                [
                    'course'=>'2DAW',
                    'ciclo'=> 'Desarrollo de Aplicaciones Web'
                ]
            ]


        );

    }
}
