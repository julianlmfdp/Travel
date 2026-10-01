<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoViaje extends Model
{
    protected $table = 'tipo_viaje';

    protected $primaryKey = 'tipo_viaje_id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function viajeRecords()
    {
        return $this->hasMany(Viaje::class, 'tipo_viaje_id', 'tipo_viaje_id');
    }
}
