<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    protected $table = 'membresia';

    protected $primaryKey = 'membresia_id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'moneda',
        'duracion_dias',
        'beneficios',
        'activa',
    ];

    protected $casts = [
        'beneficios' => 'array',
        'activa' => 'boolean'
    ];

    public function clienteMembresiaRecords()
    {
        return $this->hasMany(ClienteMembresia::class, 'membresia_id', 'membresia_id');
    }
}
