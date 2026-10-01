<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeguroViaje extends Model
{
    protected $table = 'seguro_viaje';

    protected $primaryKey = 'seguro_viaje_id';

    public $timestamps = false;

    protected $fillable = [
        'viaje_id',
        'proveedor_id',
        'nombre_plan',
        'cobertura',
        'precio',
        'moneda',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean'
    ];

    public function viaje()
    {
        return $this->belongsTo(Viaje::class, 'viaje_id', 'viaje_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id', 'proveedor_id');
    }
}
