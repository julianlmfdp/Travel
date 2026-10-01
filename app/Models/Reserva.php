<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reserva';

    protected $primaryKey = 'reserva_id';

    public $timestamps = false;

    protected $fillable = [
        'cliente_id',
        'viaje_id',
        'codigo',
        'personas',
        'estado',
        'subtotal',
        'descuento_total',
        'total',
        'moneda',
        'observaciones',
    ];

    public function viaje()
    {
        return $this->belongsTo(Viaje::class, 'viaje_id', 'viaje_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'cliente_id');
    }
}
