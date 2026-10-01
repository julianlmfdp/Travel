<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Vehiculo::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['empresa_transporte_id' => 'required|integer|exists:empresa_transporte,empresa_transporte_id',
            'matricula' => 'required|string|max:30|unique:vehiculo,matricula',
            'tipo' => 'required|string|max:40',
            'capacidad' => 'required|integer|min:0',
            'estado' => 'sometimes|string|max:20',
    ]);
        $record = Vehiculo::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Vehiculo $vehiculo)
    {
        return response()->json(['data' => $vehiculo]);
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
        $validated = $request->validate(['empresa_transporte_id' => 'sometimes|integer|exists:empresa_transporte,empresa_transporte_id',
            'matricula' => 'sometimes|string|max:30|unique:vehiculo,matricula,' . $vehiculo->getKey() . ',vehiculo_id',
            'tipo' => 'sometimes|string|max:40',
            'capacidad' => 'sometimes|integer|min:0',
            'estado' => 'sometimes|string|max:20',
    ]);
        $vehiculo->update($validated);

        return response()->json(['data' => $vehiculo]);
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();

        return response()->json(null, 204);
    }
}
