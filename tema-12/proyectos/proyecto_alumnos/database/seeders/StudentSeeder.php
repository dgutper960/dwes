<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Añadimos registros a students
        DB::table('students')->INSERT(
            [
                [
                    'name' => "David",
                    'lastname' => "Gutiérrez",
                    'birth_date' => '1984-10-29',
                    'phone' => '666999333',
                    'city' => "Ubrique",
                    'dni' => '11224455Z',
                    'email' => "david@mail.es",
                    'course_id' => 2

                ]
            ]
        );
        $students = Student::factory()->count(30)->create();

    }
}