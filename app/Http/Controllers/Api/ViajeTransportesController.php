<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transporte;
use App\Models\Viaje;
use Illuminate\Http\Request;

class ViajeTransportesController extends Controller
{
    public function index(Viaje $viaje)
    {
        return response()->json(['data' => $viaje->transportes()->get()]);
    }

    public function store(Request $request, Viaje $viaje)
    {
        $validated = $request->validate([
            'transporte_id' => 'required|integer|exists:transporte,transporte_id',
            'orden' => 'nullable|integer|min:0',
            'incluido' => 'sometimes|boolean',
        ]);
        $transporteId = $validated['transporte_id'];
        unset($validated['transporte_id']);
        $viaje->transportes()->syncWithoutDetaching([$transporteId => $validated]);
        $record = $viaje->transportes()->whereKey($transporteId)->firstOrFail();

        return response()->json(['data' => $record], 201);
    }

    public function show(Viaje $viaje, Transporte $transporte)
    {
        $record = $viaje->transportes()->whereKey($transporte->getKey())->firstOrFail();

        return response()->json(['data' => $record]);
    }

    public function update(Request $request, Viaje $viaje, Transporte $transporte)
    {
        $validated = $request->validate([
            'orden' => 'nullable|integer|min:0',
            'incluido' => 'sometimes|boolean',
        ]);
        $viaje->transportes()->whereKey($transporte->getKey())->firstOrFail();
        $viaje->transportes()->updateExistingPivot($transporte->getKey(), $validated);
        $record = $viaje->transportes()->whereKey($transporte->getKey())->firstOrFail();

        return response()->json(['data' => $record]);
    }

    public function destroy(Viaje $viaje, Transporte $transporte)
    {
        $viaje->transportes()->whereKey($transporte->getKey())->firstOrFail();
        $viaje->transportes()->detach($transporte->getKey());

        return response()->json(null, 204);
    }
}
