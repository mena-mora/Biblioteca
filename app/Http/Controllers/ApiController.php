<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

use App\Http\Resources\LibroResource;
use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Prestamo;


class ApiController extends Controller
{
    public function login(Request $request){
         $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        
        if(auth()->attempt($credentials)){
            $user = auth()->user();
            $tokenName = $request->input('token_name', 'api-token');
            $token = $user->createToken($tokenName);
            return ['token' => $token->plainTextToken];
        }
        return ['error' => 'Las credenciales no son correctas'];
        
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return ['data' => 'Sesión cerrada'];
    }

    public function libros_disponibles(){
        $libros = Libro::where('estatus', 0)->orderBy('id', 'asc')->get();
        $libros = LibroResource::collection($libros);
        return $libros;
    }

    public function entregar_libro(Request $request){
        $request->validate([
            'prestamo_id' => 'required|exists:prestamos,id',
        ]);

        $id = $request->input('prestamo_id');

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
         } catch (\Exception $e) {
             \DB::rollBack();
             return ['error' => 'Error al entregar el libro: ' . $e->getMessage()];
         }

         return ['data' => 'Libro entregado exitosamente'];
    }

}
