<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ViajeHotel extends Pivot
{
    protected $table = 'viaje_hotel';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'viaje_id',
        'hotel_id',
        'noche_desde',
        'noche_hasta',
        'orden',
    ];
}
