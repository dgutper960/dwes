<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('students')->insert(
            [
                [
                    'name' => 'David',
                    'lastname' => 'Gutiérrez Pérez',
                    'birth_date' => '1984/10/28',
                    'phone' => '455885477',
                    'dni' => '33445588G',
                    'city' => 'Ubrique',
                    'email' => 'david@mail.com',
                    'curso_id' => 1
                ]
            ]
        );
    }
}
