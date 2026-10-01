<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoriaDestino;
use App\Models\Destino;
use Illuminate\Http\Request;

class DestinoCategoriasController extends Controller
{
    public function index(Destino $destino)
    {
        return response()->json(['data' => $destino->categorias()->get()]);
    }

    public function store(Request $request, Destino $destino)
    {
        $validated = $request->validate([
            'categoria_destino_id' => 'required|integer|exists:categoria_destino,categoria_destino_id',
        ]);
        $destino->categorias()->syncWithoutDetaching([$validated['categoria_destino_id']]);
        $categoriaDestino = $destino->categorias()->whereKey($validated['categoria_destino_id'])->firstOrFail();

        return response()->json(['data' => $categoriaDestino], 201);
    }

    public function show(Destino $destino, CategoriaDestino $categoriaDestino)
    {
        $record = $destino->categorias()->whereKey($categoriaDestino->getKey())->firstOrFail();

        return response()->json(['data' => $record]);
    }

    public function update(Request $request, Destino $destino, CategoriaDestino $categoriaDestino)
    {
        $validated = $request->validate([
            'categoria_destino_id' => 'sometimes|integer|exists:categoria_destino,categoria_destino_id',
        ]);
        $destino->categorias()->whereKey($categoriaDestino->getKey())->firstOrFail();
        $newId = $validated['categoria_destino_id'] ?? $categoriaDestino->getKey();
        if ($newId != $categoriaDestino->getKey()) {
            $destino->categorias()->detach($categoriaDestino->getKey());
            $destino->categorias()->syncWithoutDetaching([$newId]);
        }
        $record = $destino->categorias()->whereKey($newId)->firstOrFail();

        return response()->json(['data' => $record]);
    }

    public function destroy(Destino $destino, CategoriaDestino $categoriaDestino)
    {
        $destino->categorias()->whereKey($categoriaDestino->getKey())->firstOrFail();
        $destino->categorias()->detach($categoriaDestino->getKey());

        return response()->json(null, 204);
    }
}
