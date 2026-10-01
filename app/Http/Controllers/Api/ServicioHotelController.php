<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServicioHotel;
use Illuminate\Http\Request;

class ServicioHotelController extends Controller
{
    public function index()
    {
        return response()->json(['data' => ServicioHotel::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['hotel_id' => 'required|integer|exists:hotel,hotel_id',
            'nombre' => 'required|string|max:100',
            'incluido' => 'sometimes|boolean',
            'precio' => 'sometimes|numeric|min:0',
    ]);
        $record = ServicioHotel::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(ServicioHotel $servicioHotel)
    {
        return response()->json(['data' => $servicioHotel]);
    }

    public function update(Request $request, ServicioHotel $servicioHotel)
    {
        $validated = $request->validate(['hotel_id' => 'sometimes|integer|exists:hotel,hotel_id',
            'nombre' => 'sometimes|string|max:100',
            'incluido' => 'sometimes|boolean',
            'precio' => 'sometimes|numeric|min:0',
    ]);
        $servicioHotel->update($validated);

        return response()->json(['data' => $servicioHotel]);
    }

    public function destroy(ServicioHotel $servicioHotel)
    {
        $servicioHotel->delete();

        return response()->json(null, 204);
    }
}
