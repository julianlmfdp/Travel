<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Membresia;
use Illuminate\Http\Request;

class MembresiaController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Membresia::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['nombre' => 'required|string|max:80|unique:membresia,nombre',
            'descripcion' => 'nullable|string|max:255',
            'precio' => 'required|numeric|min:0',
            'moneda' => 'required|string|max:3',
            'duracion_dias' => 'required|integer|min:0',
            'beneficios' => 'nullable|array',
            'activa' => 'sometimes|boolean',
    ]);
        $record = Membresia::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Membresia $membresia)
    {
        return response()->json(['data' => $membresia]);
    }

    public function update(Request $request, Membresia $membresia)
    {
        $validated = $request->validate(['nombre' => 'sometimes|string|max:80|unique:membresia,nombre,' . $membresia->getKey() . ',membresia_id',
            'descripcion' => 'nullable|string|max:255',
            'precio' => 'sometimes|numeric|min:0',
            'moneda' => 'sometimes|string|max:3',
            'duracion_dias' => 'sometimes|integer|min:0',
            'beneficios' => 'nullable|array',
            'activa' => 'sometimes|boolean',
    ]);
        $membresia->update($validated);

        return response()->json(['data' => $membresia]);
    }

    public function destroy(Membresia $membresia)
    {
        $membresia->delete();

        return response()->json(null, 204);
    }
}
