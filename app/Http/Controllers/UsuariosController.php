<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'user_type' => 'required|in:admin,lector',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'password_confirmation' => bcrypt($request->password_confirmation),
            'user_type' => $request->user_type,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit ($id){
        $usuario = User:: findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'user_type' => 'required|in:admin,lector',
        ]);

        $usuario = User::findOrFail($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->user_type = $request->user_type;
        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    
    public function delete_confirm($id){
        $usuario = User::findOrFail($id);
        return view('usuarios.delete_confirm', compact('usuario'));
    }

    public function destroy($id){
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }

    public function profile()
    {
        $usuario = User::findOrFail(auth()->user()->id);
        return view('usuarios.profile', compact('usuario'));
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $usuario = User::findOrFail(auth()->user()->id);
        $usuario->name = $request->name;
        //$usuario->email = $request->email;
        $usuario->save();
        return redirect()->route('usuarios.profile')->with('success', 'Perfil actualizado exitosamente.');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
            'new_password_confirmation' => 'required|string|min:8',
        ]);

        $usuario = User::findOrFail(auth()->user()->id);

        if(!password_verify($request->current_password, $usuario->password)) {
            return redirect()->route('usuarios.profile')->with(['error' => 'La contraseña actual es incorrecta.']);
        }

        $usuario->password = bcrypt($request->new_password);
        $usuario->save();

        return redirect()->route('usuarios.profile')->with('success', 'Contraseña actualizada exitosamente.');
    }
}
