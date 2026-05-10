<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Mail\UsuarioRegistrado;

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
    

        $data = [
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password']),
            'user_type' => 'lector'
        ];

        try {
            $user = User::create($data);
        } catch (QueryException $e) {
            // If Postgres sequence is behind and causes duplicate primary key (23505),
            // advance the sequence to max(id)+1 and retry once.
            if ($e->getCode() === '23505') {
                DB::statement("SELECT setval(pg_get_serial_sequence('users','id'), (SELECT COALESCE(MAX(id),0) FROM users) + 1, false)");
                // retry create once
                $user = User::create($data);
            } else {
                throw $e;
            }
        }

        Auth::login($user);

        Mail::to($user->email)->send(new UsuarioRegistrado($user));

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
