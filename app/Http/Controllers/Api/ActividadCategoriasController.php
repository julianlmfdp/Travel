<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ActividadTuristica;
use App\Models\CategoriaActividad;
use Illuminate\Http\Request;

class ActividadCategoriasController extends Controller
{
    public function index(ActividadTuristica $actividadTuristica)
    {
        return response()->json(['data' => $actividadTuristica->categorias()->get()]);
    }

    public function store(Request $request, ActividadTuristica $actividadTuristica)
    {
        $validated = $request->validate([
            'categoria_actividad_id' => 'required|integer|exists:categoria_actividad,categoria_actividad_id',
        ]);
        $actividadTuristica->categorias()->syncWithoutDetaching([$validated['categoria_actividad_id']]);
        $categoriaActividad = $actividadTuristica->categorias()->whereKey($validated['categoria_actividad_id'])->firstOrFail();

        return response()->json(['data' => $categoriaActividad], 201);
    }

    public function show(ActividadTuristica $actividadTuristica, CategoriaActividad $categoriaActividad)
    {
        $record = $actividadTuristica->categorias()->whereKey($categoriaActividad->getKey())->firstOrFail();

        return response()->json(['data' => $record]);
    }

    public function update(Request $request, ActividadTuristica $actividadTuristica, CategoriaActividad $categoriaActividad)
    {
        $validated = $request->validate([
            'categoria_actividad_id' => 'sometimes|integer|exists:categoria_actividad,categoria_actividad_id',
        ]);
        $actividadTuristica->categorias()->whereKey($categoriaActividad->getKey())->firstOrFail();
        $newId = $validated['categoria_actividad_id'] ?? $categoriaActividad->getKey();
        if ($newId != $categoriaActividad->getKey()) {
            $actividadTuristica->categorias()->detach($categoriaActividad->getKey());
            $actividadTuristica->categorias()->syncWithoutDetaching([$newId]);
        }
        $record = $actividadTuristica->categorias()->whereKey($newId)->firstOrFail();

        return response()->json(['data' => $record]);
    }

    public function destroy(ActividadTuristica $actividadTuristica, CategoriaActividad $categoriaActividad)
    {
        $actividadTuristica->categorias()->whereKey($categoriaActividad->getKey())->firstOrFail();
        $actividadTuristica->categorias()->detach($categoriaActividad->getKey());

        return response()->json(null, 204);
    }
}
