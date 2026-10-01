<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';

    protected $primaryKey = 'proveedor_id';

    public $timestamps = false;

    protected $fillable = [
        'pais_id',
        'razon_social',
        'identificacion_fiscal',
        'email',
        'telefono',
        'direccion',
        'estado',
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id', 'pais_id');
    }

    public function proveedorContactoRecords()
    {
        return $this->hasMany(ProveedorContacto::class, 'proveedor_id', 'proveedor_id');
    }

    public function actividadTuristicaRecords()
    {
        return $this->hasMany(ActividadTuristica::class, 'proveedor_id', 'proveedor_id');
    }

    public function hotelRecords()
    {
        return $this->hasMany(Hotel::class, 'proveedor_id', 'proveedor_id');
    }

    public function empresaTransporteRecords()
    {
        return $this->hasMany(EmpresaTransporte::class, 'proveedor_id', 'proveedor_id');
    }

    public function seguroViajeRecords()
    {
        return $this->hasMany(SeguroViaje::class, 'proveedor_id', 'proveedor_id');
    }
}
