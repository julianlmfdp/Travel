<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoHabitacion extends Model
{
    protected $table = 'tipo_habitacion';

    protected $primaryKey = 'tipo_habitacion_id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'capacidad',
    ];

    public function habitacionRecords()
    {
        return $this->hasMany(Habitacion::class, 'tipo_habitacion_id', 'tipo_habitacion_id');
    }
}
