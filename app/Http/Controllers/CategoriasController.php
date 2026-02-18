<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
class CategoriasController extends Controller
{
    public function index() {
        $categorias = Categoria::all(); // Obtener todas las categorías desde la base de datos
        return view('categorias.index', compact('categorias'));
    }
    
    public function create() {
        return view('categorias.create');
    }

    public function store(Request $request) {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Crear una nueva categoría
        Categoria::create([
            'nombre' => $request->nombre,
        ]);

        // Redirigir a la lista de categorías con un mensaje de éxito
        return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
    }

    public function edit($id){
        $categorias = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categorias'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->nombre;
        $categoria->save();
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    public function destroy($id){
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }

}
