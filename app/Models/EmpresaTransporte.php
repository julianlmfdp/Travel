<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaTransporte extends Model
{
    protected $table = 'empresa_transporte';

    protected $primaryKey = 'empresa_transporte_id';

    public $timestamps = false;

    protected $fillable = [
        'proveedor_id',
        'nombre_comercial',
        'licencia',
        'telefono',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id', 'proveedor_id');
    }

    public function vehiculoRecords()
    {
        return $this->hasMany(Vehiculo::class, 'empresa_transporte_id', 'empresa_transporte_id');
    }

    public function rutaRecords()
    {
        return $this->hasMany(Ruta::class, 'empresa_transporte_id', 'empresa_transporte_id');
    }
}
