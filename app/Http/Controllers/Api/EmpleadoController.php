<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Empleado::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['empleado_id' => 'sometimes|integer|exists:persona,persona_id',
            'codigo_empleado' => 'required|string|max:30|unique:empleado,codigo_empleado',
            'cargo' => 'required|string|max:100',
            'fecha_contratacion' => 'required|date',
            'estado' => 'sometimes|string|max:20',
    ]);
        $record = Empleado::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Empleado $empleado)
    {
        return response()->json(['data' => $empleado]);
    }

    public function update(Request $request, Empleado $empleado)
    {
        $validated = $request->validate(['empleado_id' => 'sometimes|integer|exists:persona,persona_id',
            'codigo_empleado' => 'sometimes|string|max:30|unique:empleado,codigo_empleado,' . $empleado->getKey() . ',empleado_id',
            'cargo' => 'sometimes|string|max:100',
            'fecha_contratacion' => 'sometimes|date',
            'estado' => 'sometimes|string|max:20',
    ]);
        $empleado->update($validated);

        return response()->json(['data' => $empleado]);
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return response()->json(null, 204);
    }
}
