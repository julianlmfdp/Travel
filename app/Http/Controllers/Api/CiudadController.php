<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Ciudad::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['pais_id' => 'required|integer|exists:pais,pais_id',
            'nombre' => 'required|string|max:120',
            'region' => 'nullable|string|max:120',
            'codigo_postal' => 'nullable|string|max:20',
            'latitud' => 'nullable|numeric|min:-999999999',
            'longitud' => 'nullable|numeric|min:-999999999',
    ]);
        $record = Ciudad::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Ciudad $ciudad)
    {
        return response()->json(['data' => $ciudad]);
    }

    public function update(Request $request, Ciudad $ciudad)
    {
        $validated = $request->validate(['pais_id' => 'sometimes|integer|exists:pais,pais_id',
            'nombre' => 'sometimes|string|max:120',
            'region' => 'nullable|string|max:120',
            'codigo_postal' => 'nullable|string|max:20',
            'latitud' => 'nullable|numeric|min:-999999999',
            'longitud' => 'nullable|numeric|min:-999999999',
    ]);
        $ciudad->update($validated);

        return response()->json(['data' => $ciudad]);
    }

    public function destroy(Ciudad $ciudad)
    {
        $ciudad->delete();

        return response()->json(null, 204);
    }
}
