<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['course', 'ciclo'];

    // Cardinalidad
    // Un curso asignado a varios estudiantes -> nombre método en plural
    public function students():HasMany{
        return $this->hasMany(Course::class);
    }

}
