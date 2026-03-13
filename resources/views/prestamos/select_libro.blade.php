@extends('layout.admin')
@section('content')
    <div>
        @isset($usuario)
            <div>
                <h2>Usuario encontrado!</h2>
                <p>ID: {{ $usuario->id }}</p>
                <p>Nombre: {{ $usuario->name }}</p>
                <p>Email: {{ $usuario->email }}</p>
            </div>    
        @endisset
        
        <h1 class="text-2xl font-bold text-blue-800 mb-4">Seleccionar Libro</h1>
        
        <form action="{{ route('prestamos.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div>
                <label for="libro_id" class="block text-sm font-medium text-gray-700">ID del Libro:</label>
                <select name="libro_id" id="libro_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <option value="">Seleccione un libro</option>
                    @foreach($libros as $libro)
                        <option value="{{ $libro->id }}">{{ $libro->titulo }} - {{ $libro->autor}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">
            </div>

            <div class="mt-4 flex gap-2">
                <button type="submit" class="mt-4 bg-emerald-700 text-white px-4 py-2 rounded-lg font-medium transition-all glow">
                    Prestar
                </button>
                <a href="{{ route('prestamos.index') }}" class="mt-4 bg-gray-500 text-white px-4 py-2 rounded-lg font-medium transition-all glow">
                    Volver
                </a>
            </div>
        </form>
    </div>
@endsection