<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClienteMembresia;
use Illuminate\Http\Request;

class ClienteMembresiaController extends Controller
{
    public function index()
    {
        return response()->json(['data' => ClienteMembresia::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['cliente_id' => 'required|integer|exists:cliente,cliente_id',
            'membresia_id' => 'required|integer|exists:membresia,membresia_id',
            'inicio' => 'required|date',
            'fin' => 'required|date',
            'estado' => 'sometimes|string|max:20',
    ]);
        $record = ClienteMembresia::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(ClienteMembresia $clienteMembresia)
    {
        return response()->json(['data' => $clienteMembresia]);
    }

    public function update(Request $request, ClienteMembresia $clienteMembresia)
    {
        $validated = $request->validate(['cliente_id' => 'sometimes|integer|exists:cliente,cliente_id',
            'membresia_id' => 'sometimes|integer|exists:membresia,membresia_id',
            'inicio' => 'sometimes|date',
            'fin' => 'sometimes|date',
            'estado' => 'sometimes|string|max:20',
    ]);
        $clienteMembresia->update($validated);

        return response()->json(['data' => $clienteMembresia]);
    }

    public function destroy(ClienteMembresia $clienteMembresia)
    {
        $clienteMembresia->delete();

        return response()->json(null, 204);
    }
}
