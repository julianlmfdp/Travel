<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    protected $table = 'destino';

    protected $primaryKey = 'destino_id';

    public $timestamps = false;

    protected $fillable = [
        'ciudad_id',
        'nombre',
        'descripcion',
        'latitud',
        'longitud',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean'
    ];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id', 'ciudad_id');
    }

    public function atraccionTuristicaRecords()
    {
        return $this->hasMany(AtraccionTuristica::class, 'destino_id', 'destino_id');
    }

    public function temporadaRecords()
    {
        return $this->hasMany(Temporada::class, 'destino_id', 'destino_id');
    }

    public function viajeRecords()
    {
        return $this->hasMany(Viaje::class, 'destino_id', 'destino_id');
    }

    public function actividadTuristicaRecords()
    {
        return $this->hasMany(ActividadTuristica::class, 'destino_id', 'destino_id');
    }

    public function hotelRecords()
    {
        return $this->hasMany(Hotel::class, 'destino_id', 'destino_id');
    }

    public function rutadestinoFinalIdRecords()
    {
        return $this->hasMany(Ruta::class, 'destino_final_id', 'destino_id');
    }

    public function rutaorigenDestinoIdRecords()
    {
        return $this->hasMany(Ruta::class, 'origen_destino_id', 'destino_id');
    }

    public function categorias()
    {
        return $this->belongsToMany(CategoriaDestino::class, 'destino_categoria', 'destino_id', 'categoria_destino_id');
    }
}
