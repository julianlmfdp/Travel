<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProveedorContacto;
use Illuminate\Http\Request;

class ProveedorContactoController extends Controller
{
    public function index()
    {
        return response()->json(['data' => ProveedorContacto::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['proveedor_id' => 'required|integer|exists:proveedor,proveedor_id',
            'persona_id' => 'required|integer|exists:persona,persona_id',
            'cargo' => 'nullable|string|max:100',
    ]);
        $record = ProveedorContacto::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(ProveedorContacto $proveedorContacto)
    {
        return response()->json(['data' => $proveedorContacto]);
    }

    public function update(Request $request, ProveedorContacto $proveedorContacto)
    {
        $validated = $request->validate(['proveedor_id' => 'sometimes|integer|exists:proveedor,proveedor_id',
            'persona_id' => 'sometimes|integer|exists:persona,persona_id',
            'cargo' => 'nullable|string|max:100',
    ]);
        $proveedorContacto->update($validated);

        return response()->json(['data' => $proveedorContacto]);
    }

    public function destroy(ProveedorContacto $proveedorContacto)
    {
        $proveedorContacto->delete();

        return response()->json(null, 204);
    }
}
