<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculo';

    protected $primaryKey = 'vehiculo_id';

    public $timestamps = false;

    protected $fillable = [
        'empresa_transporte_id',
        'matricula',
        'tipo',
        'capacidad',
        'estado',
    ];

    public function empresaTransporte()
    {
        return $this->belongsTo(EmpresaTransporte::class, 'empresa_transporte_id', 'empresa_transporte_id');
    }

    public function transporteRecords()
    {
        return $this->hasMany(Transporte::class, 'vehiculo_id', 'vehiculo_id');
    }
}
