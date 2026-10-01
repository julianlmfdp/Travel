<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cancelacion;
use Illuminate\Http\Request;

class CancelacionController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Cancelacion::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reserva_id' => 'required|integer|exists:reserva,reserva_id|unique:cancelacion,reserva_id',
            'solicitada_por_usuario_id' => 'nullable|integer|exists:usuario,usuario_id',
            'fecha' => 'sometimes|date',
            'motivo' => 'nullable|string|max:255',
            'estado' => 'sometimes|in:solicitada,aprobada,rechazada',
        ]);
        $cancelacion = Cancelacion::create($validated);

        return response()->json(['data' => $cancelacion], 201);
    }

    public function show(Cancelacion $cancelacion)
    {
        return response()->json(['data' => $cancelacion]);
    }

    public function update(Request $request, Cancelacion $cancelacion)
    {
        $validated = $request->validate([
            'reserva_id' => 'sometimes|integer|exists:reserva,reserva_id|unique:cancelacion,reserva_id,' . $cancelacion->getKey() . ',cancelacion_id',
            'solicitada_por_usuario_id' => 'nullable|integer|exists:usuario,usuario_id',
            'fecha' => 'sometimes|date',
            'motivo' => 'nullable|string|max:255',
            'estado' => 'sometimes|in:solicitada,aprobada,rechazada',
        ]);
        $cancelacion->update($validated);

        return response()->json(['data' => $cancelacion]);
    }

    public function destroy(Cancelacion $cancelacion)
    {
        $cancelacion->delete();

        return response()->json(null, 204);
    }
}
