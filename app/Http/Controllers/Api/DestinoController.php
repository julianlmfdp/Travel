<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destino;
use Illuminate\Http\Request;

class DestinoController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Destino::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['ciudad_id' => 'required|integer|exists:ciudad,ciudad_id',
            'nombre' => 'required|string|max:160',
            'descripcion' => 'nullable|string|max:65535',
            'latitud' => 'nullable|numeric|min:-999999999',
            'longitud' => 'nullable|numeric|min:-999999999',
            'activo' => 'sometimes|boolean',
    ]);
        $record = Destino::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Destino $destino)
    {
        return response()->json(['data' => $destino]);
    }

    public function update(Request $request, Destino $destino)
    {
        $validated = $request->validate(['ciudad_id' => 'sometimes|integer|exists:ciudad,ciudad_id',
            'nombre' => 'sometimes|string|max:160',
            'descripcion' => 'nullable|string|max:65535',
            'latitud' => 'nullable|numeric|min:-999999999',
            'longitud' => 'nullable|numeric|min:-999999999',
            'activo' => 'sometimes|boolean',
    ]);
        $destino->update($validated);

        return response()->json(['data' => $destino]);
    }

    public function destroy(Destino $destino)
    {
        $destino->delete();

        return response()->json(null, 204);
    }
}
