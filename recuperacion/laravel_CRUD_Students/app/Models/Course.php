<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['course', 'ciclo'];

    // Cardinalidad
    // Un curson asignado a varios estudiantes -> nombre método en plural
    
}
