<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SeguroViaje;
use Illuminate\Http\Request;

class SeguroViajeController extends Controller
{
    public function index()
    {
        return response()->json(['data' => SeguroViaje::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['viaje_id' => 'required|integer|exists:viaje,viaje_id',
            'proveedor_id' => 'nullable|integer|exists:proveedor,proveedor_id',
            'nombre_plan' => 'required|string|max:120',
            'cobertura' => 'nullable|string|max:65535',
            'precio' => 'required|numeric|min:0',
            'moneda' => 'required|string|max:3',
            'activo' => 'sometimes|boolean',
    ]);
        $record = SeguroViaje::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(SeguroViaje $seguroViaje)
    {
        return response()->json(['data' => $seguroViaje]);
    }

    public function update(Request $request, SeguroViaje $seguroViaje)
    {
        $validated = $request->validate(['viaje_id' => 'sometimes|integer|exists:viaje,viaje_id',
            'proveedor_id' => 'nullable|integer|exists:proveedor,proveedor_id',
            'nombre_plan' => 'sometimes|string|max:120',
            'cobertura' => 'nullable|string|max:65535',
            'precio' => 'sometimes|numeric|min:0',
            'moneda' => 'sometimes|string|max:3',
            'activo' => 'sometimes|boolean',
    ]);
        $seguroViaje->update($validated);

        return response()->json(['data' => $seguroViaje]);
    }

    public function destroy(SeguroViaje $seguroViaje)
    {
        $seguroViaje->delete();

        return response()->json(null, 204);
    }
}
