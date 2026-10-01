<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ViajeTransporte extends Pivot
{
    protected $table = 'viaje_transporte';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'viaje_id',
        'transporte_id',
        'orden',
        'incluido',
    ];
}
