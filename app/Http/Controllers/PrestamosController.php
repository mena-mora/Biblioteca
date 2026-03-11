<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\User;

use Illuminate\Http\Request;

class PrestamosController extends Controller
{
    protected $table_name = 'prestamos';

    public function index()
    {
        $prestamos = Prestamo::with(['usuario', 'libro'])->get();
        return view('prestamos.index', compact('prestamos'));
    }

    

    public function create(){
        return view('prestamos.create');       
    }

    public function buscar_usuario(Request $request){
        $usuario_id = $request->input('usuario_id');
        $usuario_nombre = $request -> input('usuario_nombre');
        
        if(!empty($usuario_id)){
            $usuario = User::where('id', $usuario_id)->first();
        } elseif (!empty($usuario_nombre)) {
            $usuario = User::where('name', 'like', '%' . $usuario_nombre . '%')->first();
        } else {
            return redirect()->back()->with('error', 'Por favor, ingrese un ID o nombre de usuario para buscar.');
        }
        return view('prestamos.create', compact('usuario'));
    }
}
