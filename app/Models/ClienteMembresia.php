<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteMembresia extends Model
{
    protected $table = 'cliente_membresia';

    protected $primaryKey = 'cliente_membresia_id';

    public $timestamps = false;

    protected $fillable = [
        'cliente_id',
        'membresia_id',
        'inicio',
        'fin',
        'estado',
    ];

    protected $casts = [
        'inicio' => 'date',
        'fin' => 'date'
    ];

    public function membresia()
    {
        return $this->belongsTo(Membresia::class, 'membresia_id', 'membresia_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'cliente_id');
    }
}
