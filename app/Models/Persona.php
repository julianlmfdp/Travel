<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';

    protected $primaryKey = 'persona_id';

    public $timestamps = false;

    protected $fillable = [
        'pais_id',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'telefono',
        'documento_tipo',
        'documento_numero',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date'
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id', 'pais_id');
    }

    public function usuarioRecords()
    {
        return $this->hasMany(Usuario::class, 'persona_id', 'persona_id');
    }

    public function clienteRecords()
    {
        return $this->hasMany(Cliente::class, 'cliente_id', 'persona_id');
    }

    public function empleadoRecords()
    {
        return $this->hasMany(Empleado::class, 'empleado_id', 'persona_id');
    }

    public function guiaTuristicoRecords()
    {
        return $this->hasMany(GuiaTuristico::class, 'guia_id', 'persona_id');
    }

    public function proveedorContactoRecords()
    {
        return $this->hasMany(ProveedorContacto::class, 'persona_id', 'persona_id');
    }
}
