<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancelacion extends Model
{
    protected $table = 'cancelacion';

    protected $primaryKey = 'cancelacion_id';

    public $timestamps = false;

    protected $fillable = [
        'reserva_id',
        'solicitada_por_usuario_id',
        'fecha',
        'motivo',
        'estado',
    ];

    protected $casts = [
        'fecha' => 'datetime',
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'reserva_id', 'reserva_id');
    }

    public function usuarioSolicitante()
    {
        return $this->belongsTo(Usuario::class, 'solicitada_por_usuario_id', 'usuario_id');
    }
}
