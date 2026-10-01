<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Cliente::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['cliente_id' => 'sometimes|integer|exists:persona,persona_id',
            'numero_cliente' => 'required|string|max:30|unique:cliente,numero_cliente',
            'preferencias' => 'nullable|array',
    ]);
        $record = Cliente::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Cliente $cliente)
    {
        return response()->json(['data' => $cliente]);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate(['cliente_id' => 'sometimes|integer|exists:persona,persona_id',
            'numero_cliente' => 'sometimes|string|max:30|unique:cliente,numero_cliente,' . $cliente->getKey() . ',cliente_id',
            'preferencias' => 'nullable|array',
    ]);
        $cliente->update($validated);

        return response()->json(['data' => $cliente]);
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return response()->json(null, 204);
    }
}
