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

         $totalPrestamos = Prestamo::count();
        return view('prestamos.index', compact('prestamos', 'totalPrestamos'));
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

    public function select_libro(Request $request){
        $usuario_id = $request->input('usuario_id');
        $usuario = User::findOrFail($usuario_id);
        $libros = Libro::where('estatus', 0)->orderBy('id', 'asc')->get();

        return view('prestamos.select_libro', compact('libros', 'usuario'));
     }

     public function store(Request $request){
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'libro_id' => 'required|exists:libros,id',
        ]);

        \DB::beginTransaction();

        try {
            $prestamo = new Prestamo();
            $prestamo->usuario_id = $request->input('usuario_id');
            $prestamo->libro_id = $request->input('libro_id');
            $prestamo->fecha_entrega = now();
            $prestamo->estado = 'pendiente'; 
            $prestamo->save();

            $libro = Libro::findOrFail($request->input('libro_id'));
            $libro->estatus = 1;
            $libro->save();

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Ocurrió un error al registrar el préstamo: ' . $e->getMessage());
        }

        return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado correctamente.');
     }

     public function entregar($id){
         \DB::beginTransaction();
         try {
             $prestamo = Prestamo::findOrFail($id);
             $prestamo->estado = 'entregado';
             $prestamo->fecha_devolucion = now();
             $prestamo->save();

             $libro = Libro::findOrFail($prestamo->libro_id);
             $libro->estatus = 0;
             $libro->save();

             \DB::commit();
             return redirect()->route('prestamos.index')->with('success', 'Libro entregado correctamente.');
         } catch (\Exception $e) {
             \DB::rollBack();
             return redirect()->back()->with('error', 'Ocurrió un error al entregar el libro: ' . $e->getMessage());
         }
        
     }
}
