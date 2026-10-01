<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Viaje;
use Illuminate\Http\Request;

class ViajeController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Viaje::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['destino_id' => 'required|integer|exists:destino,destino_id',
            'tipo_viaje_id' => 'required|integer|exists:tipo_viaje,tipo_viaje_id',
            'temporada_id' => 'nullable|integer|exists:temporada,temporada_id',
            'guia_id' => 'nullable|integer|exists:guia_turistico,guia_id',
            'creado_por_empleado_id' => 'nullable|integer|exists:empleado,empleado_id',
            'nombre' => 'required|string|max:180',
            'descripcion' => 'nullable|string|max:65535',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'precio_base' => 'required|numeric|min:0',
            'moneda' => 'required|string|max:3',
            'capacidad' => 'required|integer|min:0',
            'estado' => 'sometimes|string|max:20',
    ]);
        $record = Viaje::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Viaje $viaje)
    {
        return response()->json(['data' => $viaje]);
    }

    public function update(Request $request, Viaje $viaje)
    {
        $validated = $request->validate(['destino_id' => 'sometimes|integer|exists:destino,destino_id',
            'tipo_viaje_id' => 'sometimes|integer|exists:tipo_viaje,tipo_viaje_id',
            'temporada_id' => 'nullable|integer|exists:temporada,temporada_id',
            'guia_id' => 'nullable|integer|exists:guia_turistico,guia_id',
            'creado_por_empleado_id' => 'nullable|integer|exists:empleado,empleado_id',
            'nombre' => 'sometimes|string|max:180',
            'descripcion' => 'nullable|string|max:65535',
            'fecha_inicio' => 'sometimes|date',
            'fecha_fin' => 'sometimes|date',
            'precio_base' => 'sometimes|numeric|min:0',
            'moneda' => 'sometimes|string|max:3',
            'capacidad' => 'sometimes|integer|min:0',
            'estado' => 'sometimes|string|max:20',
    ]);
        $viaje->update($validated);

        return response()->json(['data' => $viaje]);
    }

    public function destroy(Viaje $viaje)
    {
        $viaje->delete();

        return response()->json(null, 204);
    }
}
