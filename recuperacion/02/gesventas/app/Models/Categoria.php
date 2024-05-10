<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'id',
        'categoria',
        'descripcion'
    ];


    // Relacion 1:N 
    // Nombre del método en plural
    public function articulos():HasMany
    {
        return $this->hasMany(Articulo::class);
    }
}
