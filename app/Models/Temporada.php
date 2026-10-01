<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    protected $table = 'temporada';

    protected $primaryKey = 'temporada_id';

    public $timestamps = false;

    protected $fillable = [
        'destino_id',
        'nombre',
        'inicio',
        'fin',
    ];

    protected $casts = [
        'inicio' => 'date',
        'fin' => 'date'
    ];

    public function destino()
    {
        return $this->belongsTo(Destino::class, 'destino_id', 'destino_id');
    }

    public function viajeRecords()
    {
        return $this->hasMany(Viaje::class, 'temporada_id', 'temporada_id');
    }
}
