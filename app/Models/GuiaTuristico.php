<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuiaTuristico extends Model
{
    protected $table = 'guia_turistico';

    protected $primaryKey = 'guia_id';

    public $timestamps = false;

    protected $fillable = [
        'guia_id',
        'licencia',
        'idiomas',
        'biografia',
        'activo',
    ];

    protected $casts = [
        'idiomas' => 'array',
        'activo' => 'boolean'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'guia_id', 'persona_id');
    }

    public function viajeRecords()
    {
        return $this->hasMany(Viaje::class, 'guia_id', 'guia_id');
    }
}
