<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProveedorContacto extends Model
{
    protected $table = 'proveedor_contacto';

    protected $primaryKey = 'proveedor_contacto_id';

    public $timestamps = false;

    protected $fillable = [
        'proveedor_id',
        'persona_id',
        'cargo',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id', 'proveedor_id');
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id', 'persona_id');
    }
}
