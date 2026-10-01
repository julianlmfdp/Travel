<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AtraccionTuristica;
use Illuminate\Http\Request;

class AtraccionTuristicaController extends Controller
{
    public function index()
    {
        return response()->json(['data' => AtraccionTuristica::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['destino_id' => 'required|integer|exists:destino,destino_id',
            'nombre' => 'required|string|max:160',
            'descripcion' => 'nullable|string|max:65535',
            'direccion' => 'nullable|string|max:255',
            'horario' => 'nullable|array',
            'precio_referencia' => 'nullable|numeric|min:0',
            'moneda' => 'nullable|string|max:3',
            'activo' => 'sometimes|boolean',
    ]);
        $record = AtraccionTuristica::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(AtraccionTuristica $atraccionTuristica)
    {
        return response()->json(['data' => $atraccionTuristica]);
    }

    public function update(Request $request, AtraccionTuristica $atraccionTuristica)
    {
        $validated = $request->validate(['destino_id' => 'sometimes|integer|exists:destino,destino_id',
            'nombre' => 'sometimes|string|max:160',
            'descripcion' => 'nullable|string|max:65535',
            'direccion' => 'nullable|string|max:255',
            'horario' => 'nullable|array',
            'precio_referencia' => 'nullable|numeric|min:0',
            'moneda' => 'nullable|string|max:3',
            'activo' => 'sometimes|boolean',
    ]);
        $atraccionTuristica->update($validated);

        return response()->json(['data' => $atraccionTuristica]);
    }

    public function destroy(AtraccionTuristica $atraccionTuristica)
    {
        $atraccionTuristica->delete();

        return response()->json(null, 204);
    }
}
