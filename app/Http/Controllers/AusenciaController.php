<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:15',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required|string|min:8',
        ]);

        Usuarios::create([
            'nombre_completo' => $request->nombre_completo,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function show(Usuarios $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(Usuarios $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuarios $usuario)
    {
        $request->validate([
            'nombre_completo' => 'sometimes|required|string|max:15',
            'email' => 'sometimes|required|email|unique:usuarios,email,' . $usuario->id,
            'password' => 'sometimes|required|string|min:8',
        ]);

        $usuario->update([
            'nombre_completo' => $request->nombre_completo ?? $usuario->nombre_completo,
            'email' => $request->email ?? $usuario->email,
            'password' => $request->password ? bcrypt($request->password) : $usuario->password,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(Usuarios $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
