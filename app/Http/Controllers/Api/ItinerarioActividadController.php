<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ItinerarioActividad;
use Illuminate\Http\Request;

class ItinerarioActividadController extends Controller
{
    public function index()
    {
        return response()->json(['data' => ItinerarioActividad::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['itinerario_id' => 'required|integer|exists:itinerario,itinerario_id',
            'actividad_id' => 'required|integer|exists:actividad_turistica,actividad_id',
            'hora_inicio' => 'nullable|date_format:H:i:s',
            'orden' => 'required|integer|min:0',
            'notas' => 'nullable|string|max:255',
    ]);
        $record = ItinerarioActividad::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(ItinerarioActividad $itinerarioActividad)
    {
        return response()->json(['data' => $itinerarioActividad]);
    }

    public function update(Request $request, ItinerarioActividad $itinerarioActividad)
    {
        $validated = $request->validate(['itinerario_id' => 'sometimes|integer|exists:itinerario,itinerario_id',
            'actividad_id' => 'sometimes|integer|exists:actividad_turistica,actividad_id',
            'hora_inicio' => 'nullable|date_format:H:i:s',
            'orden' => 'sometimes|integer|min:0',
            'notas' => 'nullable|string|max:255',
    ]);
        $itinerarioActividad->update($validated);

        return response()->json(['data' => $itinerarioActividad]);
    }

    public function destroy(ItinerarioActividad $itinerarioActividad)
    {
        $itinerarioActividad->delete();

        return response()->json(null, 204);
    }
}
