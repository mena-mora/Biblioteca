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
        return view('prestamos.index');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
