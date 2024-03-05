<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['course', 'cliclo'];

    // Establecemos la relación 1:N
    // Un curso esta relacionado con muchos estudiantes
    public function students():HasMany // plural = un curso está formado por varios estudiantes
    {
        return $this->hasMany(Student::class); // REQUIERE IMPORTACIÓN DE HASMANY
    }


}
