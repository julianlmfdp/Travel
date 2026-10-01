<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';

    protected $primaryKey = 'cliente_id';

    public $timestamps = false;

    protected $fillable = [
        'cliente_id',
        'numero_cliente',
        'preferencias',
    ];

    protected $casts = [
        'preferencias' => 'array'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'cliente_id', 'persona_id');
    }

    public function clienteMembresiaRecords()
    {
        return $this->hasMany(ClienteMembresia::class, 'cliente_id', 'cliente_id');
    }

    public function reservaRecords()
    {
        return $this->hasMany(Reserva::class, 'cliente_id', 'cliente_id');
    }
}
