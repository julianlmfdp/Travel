<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaDestino extends Model
{
    protected $table = 'categoria_destino';

    protected $primaryKey = 'categoria_destino_id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function destinos()
    {
        return $this->belongsToMany(Destino::class, 'destino_categoria', 'categoria_destino_id', 'destino_id');
    }
}
