<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AtraccionTuristica extends Model
{
    protected $table = 'atraccion_turistica';

    protected $primaryKey = 'atraccion_id';

    public $timestamps = false;

    protected $fillable = [
        'destino_id',
        'nombre',
        'descripcion',
        'direccion',
        'horario',
        'precio_referencia',
        'moneda',
        'activo',
    ];

    protected $casts = [
        'horario' => 'array',
        'activo' => 'boolean'
    ];

    public function destino()
    {
        return $this->belongsTo(Destino::class, 'destino_id', 'destino_id');
    }
}
