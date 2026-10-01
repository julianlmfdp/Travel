<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';

    protected $primaryKey = 'empleado_id';

    public $timestamps = false;

    protected $fillable = [
        'empleado_id',
        'codigo_empleado',
        'cargo',
        'fecha_contratacion',
        'estado',
    ];

    protected $casts = [
        'fecha_contratacion' => 'date'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'empleado_id', 'persona_id');
    }

    public function viajeRecords()
    {
        return $this->hasMany(Viaje::class, 'creado_por_empleado_id', 'empleado_id');
    }
}
