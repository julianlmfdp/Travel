<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicioHotel extends Model
{
    protected $table = 'servicio_hotel';

    protected $primaryKey = 'servicio_hotel_id';

    public $timestamps = false;

    protected $fillable = [
        'hotel_id',
        'nombre',
        'incluido',
        'precio',
    ];

    protected $casts = [
        'incluido' => 'boolean'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'hotel_id');
    }
}
