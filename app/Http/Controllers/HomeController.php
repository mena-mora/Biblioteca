<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Libro;

class HomeController extends Controller
{
    //

    public function index(\Illuminate\Http\Request $request) {
        $q = $request->input('search');
        $qLower = $q ? mb_strtolower($q) : null;

        $totalLibros = Libro::count();

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
            ->orderBy('created_at', 'desc')
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

        return view('home.index', compact('libros', 'totalLibros'));
    }

    public function about() {
        return view('home.dashboard');
    }

    
    
}

