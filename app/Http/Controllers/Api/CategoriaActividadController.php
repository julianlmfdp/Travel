<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoriaActividad;
use Illuminate\Http\Request;

class CategoriaActividadController extends Controller
{
    public function index()
    {
        return response()->json(['data' => CategoriaActividad::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['nombre' => 'required|string|max:80|unique:categoria_actividad,nombre',
            'descripcion' => 'nullable|string|max:255',
    ]);
        $record = CategoriaActividad::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(CategoriaActividad $categoriaActividad)
    {
        return response()->json(['data' => $categoriaActividad]);
    }

    public function update(Request $request, CategoriaActividad $categoriaActividad)
    {
        $validated = $request->validate(['nombre' => 'sometimes|string|max:80|unique:categoria_actividad,nombre,' . $categoriaActividad->getKey() . ',categoria_actividad_id',
            'descripcion' => 'nullable|string|max:255',
    ]);
        $categoriaActividad->update($validated);

        return response()->json(['data' => $categoriaActividad]);
    }

    public function destroy(CategoriaActividad $categoriaActividad)
    {
        $categoriaActividad->delete();

        return response()->json(null, 204);
    }
}
