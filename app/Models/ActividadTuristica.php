<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActividadTuristica extends Model
{
    protected $table = 'actividad_turistica';

    protected $primaryKey = 'actividad_id';

    public $timestamps = false;

    protected $fillable = [
        'destino_id',
        'proveedor_id',
        'nombre',
        'descripcion',
        'duracion_minutos',
        'precio',
        'moneda',
        'cupo',
        'activa',
    ];

    protected $casts = [
        'activa' => 'boolean'
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id', 'proveedor_id');
    }

    public function destino()
    {
        return $this->belongsTo(Destino::class, 'destino_id', 'destino_id');
    }

    public function itinerarioActividadRecords()
    {
        return $this->hasMany(ItinerarioActividad::class, 'actividad_id', 'actividad_id');
    }

    public function categorias()
    {
        return $this->belongsToMany(CategoriaActividad::class, 'actividad_categoria', 'actividad_id', 'categoria_actividad_id');
    }

    public function itinerarios()
    {
        return $this->belongsToMany(Itinerario::class, 'itinerario_actividad', 'actividad_id', 'itinerario_id')->withPivot(['itinerario_actividad_id', 'hora_inicio', 'orden', 'notas']);
    }
}
