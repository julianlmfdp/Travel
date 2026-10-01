<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ruta;
use Illuminate\Http\Request;

class RutaController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Ruta::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['empresa_transporte_id' => 'required|integer|exists:empresa_transporte,empresa_transporte_id',
            'origen_destino_id' => 'required|integer|exists:destino,destino_id',
            'destino_final_id' => 'required|integer|exists:destino,destino_id',
            'duracion_minutos' => 'nullable|integer|min:0',
            'distancia_km' => 'nullable|numeric|min:0',
    ]);
        $record = Ruta::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Ruta $ruta)
    {
        return response()->json(['data' => $ruta]);
    }

    public function update(Request $request, Ruta $ruta)
    {
        $validated = $request->validate(['empresa_transporte_id' => 'sometimes|integer|exists:empresa_transporte,empresa_transporte_id',
            'origen_destino_id' => 'sometimes|integer|exists:destino,destino_id',
            'destino_final_id' => 'sometimes|integer|exists:destino,destino_id',
            'duracion_minutos' => 'nullable|integer|min:0',
            'distancia_km' => 'nullable|numeric|min:0',
    ]);
        $ruta->update($validated);

        return response()->json(['data' => $ruta]);
    }

    public function destroy(Ruta $ruta)
    {
        $ruta->delete();

        return response()->json(null, 204);
    }
}
