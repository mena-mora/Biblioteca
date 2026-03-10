<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Libro;

class HomeController extends Controller
{
    //

    public function index(\Illuminate\Http\Request $request) {
    $user = auth()->user();
    if ($user->user_type === 'admin') {

        $q = $request->input('search');
        $qLower = $q ? mb_strtolower($q) : null;
        $totalLibros = Libro::count();
        // Obtener el total de libros para mostrar en la vista

        $librosQuery = Libro::with('categoria')
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
            ->orderBy('created_at', 'desc');

            $paginated = $librosQuery->paginate(5)->withQueryString();

         if ($request->wantsJson() || $request->ajax()) {
            $items = collect($paginated->items())->map(function ($l) {
                return [
                    'id' => $l->id,
                    'titulo' => $l->titulo,
                    'autor' => $l->autor,
                    'categoria' => optional($l->categoria)->nombre,
                    'editorial' => $l->editorial,
                    'isbn' => $l->isbn,
                ];
            })->values();

            return response()->json([
                'items' => $items,
                'pagination' => (string) $paginated->links(),
            ]);
        }
        
       
        $libros = $paginated;
        return view('home.index', compact('libros','totalLibros'));

    } else if ($user->user_type === 'lector') {
        return view('home.index_user');
    } else {
        return view('home.index_user');
    } 

    }

    public function about() {
        return view('home.dashboard');
    }
    
}

