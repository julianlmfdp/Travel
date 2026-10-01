<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = 'habitacion';

    protected $primaryKey = 'habitacion_id';

    public $timestamps = false;

    protected $fillable = [
        'hotel_id',
        'tipo_habitacion_id',
        'numero',
        'precio_noche',
        'moneda',
        'estado',
    ];

    public function tipoHabitacion()
    {
        return $this->belongsTo(TipoHabitacion::class, 'tipo_habitacion_id', 'tipo_habitacion_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'hotel_id');
    }
}
