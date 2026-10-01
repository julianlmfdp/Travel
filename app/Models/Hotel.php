<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotel';

    protected $primaryKey = 'hotel_id';

    public $timestamps = false;

    protected $fillable = [
        'destino_id',
        'proveedor_id',
        'nombre',
        'direccion',
        'categoria_estrellas',
        'telefono',
        'email',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean'
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id', 'proveedor_id');
    }

    public function destino()
    {
        return $this->belongsTo(Destino::class, 'destino_id', 'destino_id');
    }

    public function habitacionRecords()
    {
        return $this->hasMany(Habitacion::class, 'hotel_id', 'hotel_id');
    }

    public function servicioHotelRecords()
    {
        return $this->hasMany(ServicioHotel::class, 'hotel_id', 'hotel_id');
    }

    public function viajes()
    {
        return $this->belongsToMany(Viaje::class, 'viaje_hotel', 'hotel_id', 'viaje_id')->withPivot(['noche_desde', 'noche_hasta', 'orden']);
    }
}
