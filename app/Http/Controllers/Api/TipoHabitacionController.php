<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;

class TipoHabitacionController extends Controller
{
    public function index()
    {
        return response()->json(['data' => TipoHabitacion::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['nombre' => 'required|string|max:80|unique:tipo_habitacion,nombre',
            'descripcion' => 'nullable|string|max:255',
            'capacidad' => 'required|integer|min:0',
    ]);
        $record = TipoHabitacion::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(TipoHabitacion $tipoHabitacion)
    {
        return response()->json(['data' => $tipoHabitacion]);
    }

    public function update(Request $request, TipoHabitacion $tipoHabitacion)
    {
        $validated = $request->validate(['nombre' => 'sometimes|string|max:80|unique:tipo_habitacion,nombre,' . $tipoHabitacion->getKey() . ',tipo_habitacion_id',
            'descripcion' => 'nullable|string|max:255',
            'capacidad' => 'sometimes|integer|min:0',
    ]);
        $tipoHabitacion->update($validated);

        return response()->json(['data' => $tipoHabitacion]);
    }

    public function destroy(TipoHabitacion $tipoHabitacion)
    {
        $tipoHabitacion->delete();

        return response()->json(null, 204);
    }
}
