<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    protected $table = 'viaje';

    protected $primaryKey = 'viaje_id';

    public $timestamps = false;

    protected $fillable = [
        'destino_id',
        'tipo_viaje_id',
        'temporada_id',
        'guia_id',
        'creado_por_empleado_id',
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'precio_base',
        'moneda',
        'capacidad',
        'estado',
    ];

    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime'
    ];

    public function guia()
    {
        return $this->belongsTo(GuiaTuristico::class, 'guia_id', 'guia_id');
    }

    public function creadoPorEmpleado()
    {
        return $this->belongsTo(Empleado::class, 'creado_por_empleado_id', 'empleado_id');
    }

    public function destino()
    {
        return $this->belongsTo(Destino::class, 'destino_id', 'destino_id');
    }

    public function tipoViaje()
    {
        return $this->belongsTo(TipoViaje::class, 'tipo_viaje_id', 'tipo_viaje_id');
    }

    public function temporada()
    {
        return $this->belongsTo(Temporada::class, 'temporada_id', 'temporada_id');
    }

    public function itinerarioRecords()
    {
        return $this->hasMany(Itinerario::class, 'viaje_id', 'viaje_id');
    }

    public function seguroViajeRecords()
    {
        return $this->hasMany(SeguroViaje::class, 'viaje_id', 'viaje_id');
    }

    public function reservaRecords()
    {
        return $this->hasMany(Reserva::class, 'viaje_id', 'viaje_id');
    }

    public function hoteles()
    {
        return $this->belongsToMany(Hotel::class, 'viaje_hotel', 'viaje_id', 'hotel_id')->withPivot(['noche_desde', 'noche_hasta', 'orden']);
    }

    public function transportes()
    {
        return $this->belongsToMany(Transporte::class, 'viaje_transporte', 'viaje_id', 'transporte_id')->withPivot(['orden', 'incluido']);
    }
}
