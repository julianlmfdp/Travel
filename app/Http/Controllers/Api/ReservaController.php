<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Reserva::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['cliente_id' => 'required|integer|exists:cliente,cliente_id',
            'viaje_id' => 'required|integer|exists:viaje,viaje_id',
            'codigo' => 'required|string|max:40|unique:reserva,codigo',
            'personas' => 'required|integer|min:0',
            'estado' => 'sometimes|string|max:20',
            'subtotal' => 'required|numeric|min:0',
            'descuento_total' => 'sometimes|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'moneda' => 'required|string|max:3',
            'observaciones' => 'nullable|string|max:65535',
    ]);
        $record = Reserva::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Reserva $reserva)
    {
        return response()->json(['data' => $reserva]);
    }

    public function update(Request $request, Reserva $reserva)
    {
        $validated = $request->validate(['cliente_id' => 'sometimes|integer|exists:cliente,cliente_id',
            'viaje_id' => 'sometimes|integer|exists:viaje,viaje_id',
            'codigo' => 'sometimes|string|max:40|unique:reserva,codigo,' . $reserva->getKey() . ',reserva_id',
            'personas' => 'sometimes|integer|min:0',
            'estado' => 'sometimes|string|max:20',
            'subtotal' => 'sometimes|numeric|min:0',
            'descuento_total' => 'sometimes|numeric|min:0',
            'total' => 'sometimes|numeric|min:0',
            'moneda' => 'sometimes|string|max:3',
            'observaciones' => 'nullable|string|max:65535',
    ]);
        $reserva->update($validated);

        return response()->json(['data' => $reserva]);
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return response()->json(null, 204);
    }
}
