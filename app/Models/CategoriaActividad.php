<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaActividad extends Model
{
    protected $table = 'categoria_actividad';

    protected $primaryKey = 'categoria_actividad_id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function actividades()
    {
        return $this->belongsToMany(ActividadTuristica::class, 'actividad_categoria', 'categoria_actividad_id', 'actividad_id');
    }
}
