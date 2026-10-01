<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoViaje;
use Illuminate\Http\Request;

class TipoViajeController extends Controller
{
    public function index()
    {
        return response()->json(['data' => TipoViaje::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['nombre' => 'required|string|max:80|unique:tipo_viaje,nombre',
            'descripcion' => 'nullable|string|max:255',
    ]);
        $record = TipoViaje::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(TipoViaje $tipoViaje)
    {
        return response()->json(['data' => $tipoViaje]);
    }

    public function update(Request $request, TipoViaje $tipoViaje)
    {
        $validated = $request->validate(['nombre' => 'sometimes|string|max:80|unique:tipo_viaje,nombre,' . $tipoViaje->getKey() . ',tipo_viaje_id',
            'descripcion' => 'nullable|string|max:255',
    ]);
        $tipoViaje->update($validated);

        return response()->json(['data' => $tipoViaje]);
    }

    public function destroy(TipoViaje $tipoViaje)
    {
        $tipoViaje->delete();

        return response()->json(null, 204);
    }
}
