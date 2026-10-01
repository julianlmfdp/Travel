<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';

    protected $primaryKey = 'usuario_id';

    public $timestamps = false;

    protected $fillable = [
        'persona_id',
        'email',
        'password_hash',
        'estado',
        'ultimo_acceso',
    ];

    protected $hidden = ['password_hash'];

    protected $casts = [
        'ultimo_acceso' => 'datetime'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id', 'persona_id');
    }
}
