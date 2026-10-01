<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Persona::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['pais_id' => 'nullable|integer|exists:pais,pais_id',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'fecha_nacimiento' => 'nullable|date',
            'telefono' => 'nullable|string|max:30',
            'documento_tipo' => 'nullable|string|max:30',
            'documento_numero' => 'nullable|string|max:50',
    ]);
        $record = Persona::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Persona $persona)
    {
        return response()->json(['data' => $persona]);
    }

    public function update(Request $request, Persona $persona)
    {
        $validated = $request->validate(['pais_id' => 'nullable|integer|exists:pais,pais_id',
            'nombres' => 'sometimes|string|max:100',
            'apellidos' => 'sometimes|string|max:100',
            'fecha_nacimiento' => 'nullable|date',
            'telefono' => 'nullable|string|max:30',
            'documento_tipo' => 'nullable|string|max:30',
            'documento_numero' => 'nullable|string|max:50',
    ]);
        $persona->update($validated);

        return response()->json(['data' => $persona]);
    }

    public function destroy(Persona $persona)
    {
        $persona->delete();

        return response()->json(null, 204);
    }
}
