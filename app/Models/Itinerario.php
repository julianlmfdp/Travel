<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerario extends Model
{
    protected $table = 'itinerario';

    protected $primaryKey = 'itinerario_id';

    public $timestamps = false;

    protected $fillable = [
        'viaje_id',
        'dia_numero',
        'titulo',
        'descripcion',
    ];

    public function viaje()
    {
        return $this->belongsTo(Viaje::class, 'viaje_id', 'viaje_id');
    }

    public function itinerarioActividadRecords()
    {
        return $this->hasMany(ItinerarioActividad::class, 'itinerario_id', 'itinerario_id');
    }

    public function actividades()
    {
        return $this->belongsToMany(ActividadTuristica::class, 'itinerario_actividad', 'itinerario_id', 'actividad_id')->withPivot(['itinerario_actividad_id', 'hora_inicio', 'orden', 'notas']);
    }
}
