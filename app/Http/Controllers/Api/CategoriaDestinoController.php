<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoriaDestino;
use Illuminate\Http\Request;

class CategoriaDestinoController extends Controller
{
    public function index()
    {
        return response()->json(['data' => CategoriaDestino::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['nombre' => 'required|string|max:80|unique:categoria_destino,nombre',
            'descripcion' => 'nullable|string|max:255',
    ]);
        $record = CategoriaDestino::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(CategoriaDestino $categoriaDestino)
    {
        return response()->json(['data' => $categoriaDestino]);
    }

    public function update(Request $request, CategoriaDestino $categoriaDestino)
    {
        $validated = $request->validate(['nombre' => 'sometimes|string|max:80|unique:categoria_destino,nombre,' . $categoriaDestino->getKey() . ',categoria_destino_id',
            'descripcion' => 'nullable|string|max:255',
    ]);
        $categoriaDestino->update($validated);

        return response()->json(['data' => $categoriaDestino]);
    }

    public function destroy(CategoriaDestino $categoriaDestino)
    {
        $categoriaDestino->delete();

        return response()->json(null, 204);
    }
}
