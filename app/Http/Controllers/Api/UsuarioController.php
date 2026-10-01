<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Usuario::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['persona_id' => 'required|integer|exists:persona,persona_id|unique:usuario,persona_id',
            'email' => 'required|string|max:190|unique:usuario,email',
            'estado' => 'sometimes|string|max:20',
            'ultimo_acceso' => 'nullable|date',
            'password_hash' => 'required|string|min:8',
    ]);
        $validated['password_hash'] = Hash::make($validated['password_hash']);
        $record = Usuario::create($validated);

        return response()->json(['data' => $record], 201);
    }

    public function show(Usuario $usuario)
    {
        return response()->json(['data' => $usuario]);
    }

    public function update(Request $request, Usuario $usuario)
    {
        $validated = $request->validate(['persona_id' => 'sometimes|integer|exists:persona,persona_id|unique:usuario,persona_id,' . $usuario->getKey() . ',usuario_id',
            'email' => 'sometimes|string|max:190|unique:usuario,email,' . $usuario->getKey() . ',usuario_id',
            'estado' => 'sometimes|string|max:20',
            'ultimo_acceso' => 'nullable|date',
            'password_hash' => 'sometimes|string|min:8',
    ]);
        if (isset($validated['password_hash'])) {
            $validated['password_hash'] = Hash::make($validated['password_hash']);
        }
        $usuario->update($validated);

        return response()->json(['data' => $usuario]);
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return response()->json(null, 204);
    }
}
