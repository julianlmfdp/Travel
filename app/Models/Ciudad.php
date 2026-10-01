<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudad';

    protected $primaryKey = 'ciudad_id';

    public $timestamps = false;

    protected $fillable = [
        'pais_id',
        'nombre',
        'region',
        'codigo_postal',
        'latitud',
        'longitud',
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id', 'pais_id');
    }

    public function destinoRecords()
    {
        return $this->hasMany(Destino::class, 'ciudad_id', 'ciudad_id');
    }
}
