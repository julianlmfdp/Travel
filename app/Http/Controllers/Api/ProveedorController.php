<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Proveedor::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['pais_id' => 'nullable|integer|exists:pais,pais_id',
            'razon_social' => 'required|string|max:180',
            'identificacion_fiscal' => 'required|string|max:50|unique:proveedor,identificacion_fiscal',
            'email' => 'nullable|string|max:190',
            'telefono' => 'nullable|string|max:30',
            'direccion' => 'nullable|string|max:255',
            'estado' => 'sometimes|string|max:20',
    ]);
        $record = Proveedor::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Proveedor $proveedor)
    {
        return response()->json(['data' => $proveedor]);
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $validated = $request->validate(['pais_id' => 'nullable|integer|exists:pais,pais_id',
            'razon_social' => 'sometimes|string|max:180',
            'identificacion_fiscal' => 'sometimes|string|max:50|unique:proveedor,identificacion_fiscal,' . $proveedor->getKey() . ',proveedor_id',
            'email' => 'nullable|string|max:190',
            'telefono' => 'nullable|string|max:30',
            'direccion' => 'nullable|string|max:255',
            'estado' => 'sometimes|string|max:20',
    ]);
        $proveedor->update($validated);

        return response()->json(['data' => $proveedor]);
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return response()->json(null, 204);
    }
}
