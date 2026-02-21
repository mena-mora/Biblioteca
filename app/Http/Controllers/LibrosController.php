<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Libro;

class LibrosController extends Controller
{

    public function index(\Illuminate\Http\Request $request)
    {
        $q = $request->input('search');
        $qLower = $q ? mb_strtolower($q) : null;

        $libros = Libro::with('categoria')
            ->when($qLower, function ($query, $qLower) {
                $query->where(function ($sub) use ($qLower) {
                    $sub->whereRaw('LOWER(titulo) LIKE ?', ["%{$qLower}%"])
                        ->orWhereRaw('LOWER(autor) LIKE ?', ["%{$qLower}%"])
                        ->orWhereRaw('LOWER(isbn) LIKE ?', ["%{$qLower}%"])
                        ->orWhereRaw('LOWER(editorial) LIKE ?', ["%{$qLower}%"])
                        ->orWhereHas('categoria', function ($cq) use ($qLower) {
                            $cq->whereRaw('LOWER(nombre) LIKE ?', ["%{$qLower}%"]);
                        });
                });
            })
            ->get();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json($libros->map(function ($l) {
                return [
                    'id' => $l->id,
                    'titulo' => $l->titulo,
                    'autor' => $l->autor,
                    'categoria' => optional($l->categoria)->nombre,
                    'editorial' => $l->editorial,
                    'isbn' => $l->isbn,
                ];
            }));
        }

        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view("libros.create", compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'isbn' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

            $libro = new Libro();
            $libro->titulo = $request->input('titulo');
            $libro->isbn = $request->input('isbn');
            $libro->autor = $request->input('autor');
            $libro->editorial = $request->input('editorial');
            $libro->categoria_id = $request->input('categoria_id');
            $libro->save();

        return redirect()->route('home')->with('success', 'Libro agregado exitosamente.');
    }

    public function edit($id)
    {
        $libros = Libro::findOrFail($id);
        $categorias = Categoria::all();
        return view('libros.edit', compact('libros', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'isbn' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $libro = Libro::findOrFail($id);
        $libro->titulo = $request->input('titulo');
        $libro->isbn = $request->input('isbn');
        $libro->autor = $request->input('autor');
        $libro->editorial = $request->input('editorial');
        $libro->categoria_id = $request->input('categoria_id');
        $libro->save();

        return redirect()->route('libros.index')->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();
        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }
}
