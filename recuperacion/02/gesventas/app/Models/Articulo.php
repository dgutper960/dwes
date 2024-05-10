<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    // Relación 1:1 -> el nombre del metodo debe ir en singular
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
