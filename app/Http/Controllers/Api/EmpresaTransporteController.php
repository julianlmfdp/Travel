<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EmpresaTransporte;
use Illuminate\Http\Request;

class EmpresaTransporteController extends Controller
{
    public function index()
    {
        return response()->json(['data' => EmpresaTransporte::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['proveedor_id' => 'required|integer|exists:proveedor,proveedor_id|unique:empresa_transporte,proveedor_id',
            'nombre_comercial' => 'required|string|max:160',
            'licencia' => 'nullable|string|max:80',
            'telefono' => 'nullable|string|max:30',
    ]);
        $record = EmpresaTransporte::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(EmpresaTransporte $empresaTransporte)
    {
        return response()->json(['data' => $empresaTransporte]);
    }

    public function update(Request $request, EmpresaTransporte $empresaTransporte)
    {
        $validated = $request->validate(['proveedor_id' => 'sometimes|integer|exists:proveedor,proveedor_id|unique:empresa_transporte,proveedor_id,' . $empresaTransporte->getKey() . ',empresa_transporte_id',
            'nombre_comercial' => 'sometimes|string|max:160',
            'licencia' => 'nullable|string|max:80',
            'telefono' => 'nullable|string|max:30',
    ]);
        $empresaTransporte->update($validated);

        return response()->json(['data' => $empresaTransporte]);
    }

    public function destroy(EmpresaTransporte $empresaTransporte)
    {
        $empresaTransporte->delete();

        return response()->json(null, 204);
    }
}
