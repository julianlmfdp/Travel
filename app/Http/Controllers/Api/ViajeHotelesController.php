<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Viaje;
use Illuminate\Http\Request;

class ViajeHotelesController extends Controller
{
    public function index(Viaje $viaje)
    {
        return response()->json(['data' => $viaje->hoteles()->get()]);
    }

    public function store(Request $request, Viaje $viaje)
    {
        $validated = $request->validate([
            'hotel_id' => 'required|integer|exists:hotel,hotel_id',
            'noche_desde' => 'nullable|date',
            'noche_hasta' => 'nullable|date|after_or_equal:noche_desde',
            'orden' => 'nullable|integer|min:0',
        ]);
        $hotelId = $validated['hotel_id'];
        unset($validated['hotel_id']);
        $viaje->hoteles()->syncWithoutDetaching([$hotelId => $validated]);
        $record = $viaje->hoteles()->whereKey($hotelId)->firstOrFail();

        return response()->json(['data' => $record], 201);
    }

    public function show(Viaje $viaje, Hotel $hotel)
    {
        $record = $viaje->hoteles()->whereKey($hotel->getKey())->firstOrFail();

        return response()->json(['data' => $record]);
    }

    public function update(Request $request, Viaje $viaje, Hotel $hotel)
    {
        $validated = $request->validate([
            'noche_desde' => 'nullable|date',
            'noche_hasta' => 'nullable|date|after_or_equal:noche_desde',
            'orden' => 'nullable|integer|min:0',
        ]);
        $viaje->hoteles()->whereKey($hotel->getKey())->firstOrFail();
        $viaje->hoteles()->updateExistingPivot($hotel->getKey(), $validated);
        $record = $viaje->hoteles()->whereKey($hotel->getKey())->firstOrFail();

        return response()->json(['data' => $record]);
    }

    public function destroy(Viaje $viaje, Hotel $hotel)
    {
        $viaje->hoteles()->whereKey($hotel->getKey())->firstOrFail();
        $viaje->hoteles()->detach($hotel->getKey());

        return response()->json(null, 204);
    }
}
