<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Habitacion::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['hotel_id' => 'required|integer|exists:hotel,hotel_id',
            'tipo_habitacion_id' => 'required|integer|exists:tipo_habitacion,tipo_habitacion_id',
            'numero' => 'required|string|max:20',
            'precio_noche' => 'required|numeric|min:0',
            'moneda' => 'required|string|max:3',
            'estado' => 'sometimes|string|max:20',
    ]);
        $record = Habitacion::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Habitacion $habitacion)
    {
        return response()->json(['data' => $habitacion]);
    }

    public function update(Request $request, Habitacion $habitacion)
    {
        $validated = $request->validate(['hotel_id' => 'sometimes|integer|exists:hotel,hotel_id',
            'tipo_habitacion_id' => 'sometimes|integer|exists:tipo_habitacion,tipo_habitacion_id',
            'numero' => 'sometimes|string|max:20',
            'precio_noche' => 'sometimes|numeric|min:0',
            'moneda' => 'sometimes|string|max:3',
            'estado' => 'sometimes|string|max:20',
    ]);
        $habitacion->update($validated);

        return response()->json(['data' => $habitacion]);
    }

    public function destroy(Habitacion $habitacion)
    {
        $habitacion->delete();

        return response()->json(null, 204);
    }
}
