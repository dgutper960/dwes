<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Student extends Model
{
    use HasFactory;

    // Campos visibles
    protected $fillable = ['name', 'lastname', 'birth_date', 'phone', 'dni', 'city', 'email', 'course_id'];

    // Establecemos la relacion 1:N
    // Un estudiante pertenece a un curso
    public function course():BelongsTo{
        return $this->belongsTo(Course::class); // REQUIERE IMPORTACIÓN DE BelongsTo
    }

}
