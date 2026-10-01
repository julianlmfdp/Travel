<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItinerarioActividad extends Model
{
    protected $table = 'itinerario_actividad';

    protected $primaryKey = 'itinerario_actividad_id';

    public $timestamps = false;

    protected $fillable = [
        'itinerario_id',
        'actividad_id',
        'hora_inicio',
        'orden',
        'notas',
    ];

    public function itinerario()
    {
        return $this->belongsTo(Itinerario::class, 'itinerario_id', 'itinerario_id');
    }

    public function actividad()
    {
        return $this->belongsTo(ActividadTuristica::class, 'actividad_id', 'actividad_id');
    }
}
