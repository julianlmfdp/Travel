<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Itinerario;
use Illuminate\Http\Request;

class ItinerarioController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Itinerario::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['viaje_id' => 'required|integer|exists:viaje,viaje_id',
            'dia_numero' => 'required|integer|min:0',
            'titulo' => 'required|string|max:160',
            'descripcion' => 'nullable|string|max:65535',
    ]);
        $record = Itinerario::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Itinerario $itinerario)
    {
        return response()->json(['data' => $itinerario]);
    }

    public function update(Request $request, Itinerario $itinerario)
    {
        $validated = $request->validate(['viaje_id' => 'sometimes|integer|exists:viaje,viaje_id',
            'dia_numero' => 'sometimes|integer|min:0',
            'titulo' => 'sometimes|string|max:160',
            'descripcion' => 'nullable|string|max:65535',
    ]);
        $itinerario->update($validated);

        return response()->json(['data' => $itinerario]);
    }

    public function destroy(Itinerario $itinerario)
    {
        $itinerario->delete();

        return response()->json(null, 204);
    }
}
