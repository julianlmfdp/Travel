<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Temporada;
use Illuminate\Http\Request;

class TemporadaController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Temporada::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['destino_id' => 'required|integer|exists:destino,destino_id',
            'nombre' => 'required|string|max:80',
            'inicio' => 'required|date',
            'fin' => 'required|date',
    ]);
        $record = Temporada::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Temporada $temporada)
    {
        return response()->json(['data' => $temporada]);
    }

    public function update(Request $request, Temporada $temporada)
    {
        $validated = $request->validate(['destino_id' => 'sometimes|integer|exists:destino,destino_id',
            'nombre' => 'sometimes|string|max:80',
            'inicio' => 'sometimes|date',
            'fin' => 'sometimes|date',
    ]);
        $temporada->update($validated);

        return response()->json(['data' => $temporada]);
    }

    public function destroy(Temporada $temporada)
    {
        $temporada->delete();

        return response()->json(null, 204);
    }
}
