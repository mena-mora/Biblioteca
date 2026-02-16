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
    

}
