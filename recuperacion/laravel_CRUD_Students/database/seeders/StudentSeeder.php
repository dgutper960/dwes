<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Añadimos varios Estudiantes
        DB::table('students')->insert(
            [
                [
                    'name'=>'David',
                    'lastname'=>'Gutiérrez Pérez',
                    'birt_date'=>'1984-10-28',
                    'phone'=> 6669999333,
                    'city'=> 'Ubrique',
                    'dni'=> '66998877W',
                    'email'=>'david@email.es',
                    'course_id'=> 2
                ],
                [
                    'name'=>'Maria',
                    'lastname'=>'Batista Bandera',
                    'birt_date'=>'1982-07-20',
                    'phone'=> 333666999,
                    'city'=> 'Jerez',
                    'dni'=> '33557788P',
                    'email'=>'martia@email.es',
                    'course_id'=> 1
                ]
            ]
        );
    }
}
