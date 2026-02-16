<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginform (){
        return view('auth.login');
    }   

    public function register (Request $request){
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8'
        ]);
    

        $user = User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password']),
        ]);

        Auth::login($user);
        return redirect('/home')->with('success', 'Registro exitoso. ¡Bienvenido a la biblioteca!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/home')->with('success', '¡Bienvenido de nuevo!');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no son correctas',
        ])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Has cerrado sesión exitosamente.');
    }


}
