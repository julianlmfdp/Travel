<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Pais::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['nombre' => 'required|string|max:100',
            'codigo_iso2' => 'required|string|max:2|unique:pais,codigo_iso2',
            'codigo_iso3' => 'nullable|string|max:3|unique:pais,codigo_iso3',
            'codigo_telefonico' => 'nullable|string|max:8',
            'activo' => 'sometimes|boolean',
    ]);
        $record = Pais::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Pais $pais)
    {
        return response()->json(['data' => $pais]);
    }

    public function update(Request $request, Pais $pais)
    {
        $validated = $request->validate(['nombre' => 'sometimes|string|max:100',
            'codigo_iso2' => 'sometimes|string|max:2|unique:pais,codigo_iso2,' . $pais->getKey() . ',pais_id',
            'codigo_iso3' => 'nullable|string|max:3|unique:pais,codigo_iso3,' . $pais->getKey() . ',pais_id',
            'codigo_telefonico' => 'nullable|string|max:8',
            'activo' => 'sometimes|boolean',
    ]);
        $pais->update($validated);

        return response()->json(['data' => $pais]);
    }

    public function destroy(Pais $pais)
    {
        $pais->delete();

        return response()->json(null, 204);
    }
}
