<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DestinoCategoria extends Pivot
{
    protected $table = 'destino_categoria';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'destino_id',
        'categoria_destino_id',
    ];
}
