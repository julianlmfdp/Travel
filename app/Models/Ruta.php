<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $table = 'ruta';

    protected $primaryKey = 'ruta_id';

    public $timestamps = false;

    protected $fillable = [
        'empresa_transporte_id',
        'origen_destino_id',
        'destino_final_id',
        'duracion_minutos',
        'distancia_km',
    ];

    public function destinoFinal()
    {
        return $this->belongsTo(Destino::class, 'destino_final_id', 'destino_id');
    }

    public function origenDestino()
    {
        return $this->belongsTo(Destino::class, 'origen_destino_id', 'destino_id');
    }

    public function empresaTransporte()
    {
        return $this->belongsTo(EmpresaTransporte::class, 'empresa_transporte_id', 'empresa_transporte_id');
    }

    public function transporteRecords()
    {
        return $this->hasMany(Transporte::class, 'ruta_id', 'ruta_id');
    }
}
