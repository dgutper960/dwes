<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulos';

    protected $fillable = [
        'id',
        'Descripcion',
        'imagen',
        'categoria_id',
        'dni',
        'email',
        'stock',
        'Precio_Coste',
        'Precio_Venta'
    ];

    public function categorias()
    {
        return $this->hasOne('App\Categoria');
    }
}
