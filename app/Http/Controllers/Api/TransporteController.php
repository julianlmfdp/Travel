<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transporte;
use Illuminate\Http\Request;

class TransporteController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Transporte::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['ruta_id' => 'required|integer|exists:ruta,ruta_id',
            'vehiculo_id' => 'required|integer|exists:vehiculo,vehiculo_id',
            'salida' => 'required|date',
            'llegada' => 'required|date',
            'precio' => 'required|numeric|min:0',
            'moneda' => 'required|string|max:3',
            'asientos_disponibles' => 'required|integer|min:0',
            'estado' => 'sometimes|string|max:20',
    ]);
        $record = Transporte::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Transporte $transporte)
    {
        return response()->json(['data' => $transporte]);
    }

    public function update(Request $request, Transporte $transporte)
    {
        $validated = $request->validate(['ruta_id' => 'sometimes|integer|exists:ruta,ruta_id',
            'vehiculo_id' => 'sometimes|integer|exists:vehiculo,vehiculo_id',
            'salida' => 'sometimes|date',
            'llegada' => 'sometimes|date',
            'precio' => 'sometimes|numeric|min:0',
            'moneda' => 'sometimes|string|max:3',
            'asientos_disponibles' => 'sometimes|integer|min:0',
            'estado' => 'sometimes|string|max:20',
    ]);
        $transporte->update($validated);

        return response()->json(['data' => $transporte]);
    }

    public function destroy(Transporte $transporte)
    {
        $transporte->delete();

        return response()->json(null, 204);
    }
}
