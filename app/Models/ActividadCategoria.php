<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ActividadCategoria extends Pivot
{
    protected $table = 'actividad_categoria';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'actividad_id',
        'categoria_actividad_id',
    ];
}
