<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GuiaTuristico;
use Illuminate\Http\Request;

class GuiaTuristicoController extends Controller
{
    public function index()
    {
        return response()->json(['data' => GuiaTuristico::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['guia_id' => 'sometimes|integer|exists:persona,persona_id',
            'licencia' => 'required|string|max:80|unique:guia_turistico,licencia',
            'idiomas' => 'nullable|array',
            'biografia' => 'nullable|string|max:65535',
            'activo' => 'sometimes|boolean',
    ]);
        $record = GuiaTuristico::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(GuiaTuristico $guiaTuristico)
    {
        return response()->json(['data' => $guiaTuristico]);
    }

    public function update(Request $request, GuiaTuristico $guiaTuristico)
    {
        $validated = $request->validate(['guia_id' => 'sometimes|integer|exists:persona,persona_id',
            'licencia' => 'sometimes|string|max:80|unique:guia_turistico,licencia,' . $guiaTuristico->getKey() . ',guia_id',
            'idiomas' => 'nullable|array',
            'biografia' => 'nullable|string|max:65535',
            'activo' => 'sometimes|boolean',
    ]);
        $guiaTuristico->update($validated);

        return response()->json(['data' => $guiaTuristico]);
    }

    public function destroy(GuiaTuristico $guiaTuristico)
    {
        $guiaTuristico->delete();

        return response()->json(null, 204);
    }
}
