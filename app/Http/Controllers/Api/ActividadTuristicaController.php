<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ActividadTuristica;
use Illuminate\Http\Request;

class ActividadTuristicaController extends Controller
{
    public function index()
    {
        return response()->json(['data' => ActividadTuristica::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['destino_id' => 'required|integer|exists:destino,destino_id',
            'proveedor_id' => 'nullable|integer|exists:proveedor,proveedor_id',
            'nombre' => 'required|string|max:160',
            'descripcion' => 'nullable|string|max:65535',
            'duracion_minutos' => 'nullable|integer|min:0',
            'precio' => 'nullable|numeric|min:0',
            'moneda' => 'nullable|string|max:3',
            'cupo' => 'nullable|integer|min:0',
            'activa' => 'sometimes|boolean',
    ]);
        $record = ActividadTuristica::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(ActividadTuristica $actividadTuristica)
    {
        return response()->json(['data' => $actividadTuristica]);
    }

    public function update(Request $request, ActividadTuristica $actividadTuristica)
    {
        $validated = $request->validate(['destino_id' => 'sometimes|integer|exists:destino,destino_id',
            'proveedor_id' => 'nullable|integer|exists:proveedor,proveedor_id',
            'nombre' => 'sometimes|string|max:160',
            'descripcion' => 'nullable|string|max:65535',
            'duracion_minutos' => 'nullable|integer|min:0',
            'precio' => 'nullable|numeric|min:0',
            'moneda' => 'nullable|string|max:3',
            'cupo' => 'nullable|integer|min:0',
            'activa' => 'sometimes|boolean',
    ]);
        $actividadTuristica->update($validated);

        return response()->json(['data' => $actividadTuristica]);
    }

    public function destroy(ActividadTuristica $actividadTuristica)
    {
        $actividadTuristica->delete();

        return response()->json(null, 204);
    }
}
