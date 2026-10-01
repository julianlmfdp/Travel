<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    protected $table = 'pais';

    protected $primaryKey = 'pais_id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'codigo_iso2',
        'codigo_iso3',
        'codigo_telefonico',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean'
    ];

    public function ciudadRecords()
    {
        return $this->hasMany(Ciudad::class, 'pais_id', 'pais_id');
    }

    public function personaRecords()
    {
        return $this->hasMany(Persona::class, 'pais_id', 'pais_id');
    }

    public function proveedorRecords()
    {
        return $this->hasMany(Proveedor::class, 'pais_id', 'pais_id');
    }
}
