<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Hotel::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['destino_id' => 'required|integer|exists:destino,destino_id',
            'proveedor_id' => 'nullable|integer|exists:proveedor,proveedor_id',
            'nombre' => 'required|string|max:180',
            'direccion' => 'required|string|max:255',
            'categoria_estrellas' => 'nullable|integer|min:0',
            'telefono' => 'nullable|string|max:30',
            'email' => 'nullable|string|max:190',
            'activo' => 'sometimes|boolean',
    ]);
        $record = Hotel::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Hotel $hotel)
    {
        return response()->json(['data' => $hotel]);
    }

    public function update(Request $request, Hotel $hotel)
    {
        $validated = $request->validate(['destino_id' => 'sometimes|integer|exists:destino,destino_id',
            'proveedor_id' => 'nullable|integer|exists:proveedor,proveedor_id',
            'nombre' => 'sometimes|string|max:180',
            'direccion' => 'sometimes|string|max:255',
            'categoria_estrellas' => 'nullable|integer|min:0',
            'telefono' => 'nullable|string|max:30',
            'email' => 'nullable|string|max:190',
            'activo' => 'sometimes|boolean',
    ]);
        $hotel->update($validated);

        return response()->json(['data' => $hotel]);
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return response()->json(null, 204);
    }
}
