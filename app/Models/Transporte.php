<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    protected $table = 'transporte';

    protected $primaryKey = 'transporte_id';

    public $timestamps = false;

    protected $fillable = [
        'ruta_id',
        'vehiculo_id',
        'salida',
        'llegada',
        'precio',
        'moneda',
        'asientos_disponibles',
        'estado',
    ];

    protected $casts = [
        'salida' => 'datetime',
        'llegada' => 'datetime'
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id', 'vehiculo_id');
    }

    public function ruta()
    {
        return $this->belongsTo(Ruta::class, 'ruta_id', 'ruta_id');
    }

    public function viajes()
    {
        return $this->belongsToMany(Viaje::class, 'viaje_transporte', 'transporte_id', 'viaje_id')->withPivot(['orden', 'incluido']);
    }
}
