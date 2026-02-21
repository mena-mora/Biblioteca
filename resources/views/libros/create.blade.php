@extends('layout.admin')
@section('title', 'Crear Libro')
@section('content')

<div class="">
        <h1 class="text-2xl font-bold text-blue-800 mb-4">Agregar libro</h1>
        <form action="{{ route('libros.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="titulo" class="block text-gray-700 font-medium mb-2">Titulo del libro:</label>
                <input type="text" name="titulo" id="nombre" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div class="mb-4">
                <label for="autor" class="block text-gray-700 font-medium mb-2">Autor:</label>
                <input type="text" name="autor" id="autor" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div class="mb-4">
                <label for="categoria" class="block text-gray-700 font-medium mb-2">Categoria:</label>
                <select name="categoria_id" id="categoria" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
                    <option value="">Seleccionar categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="editorial" class="block text-gray-700 font-medium mb-2">Editorial:</label>
                <input type="text" name="editorial" id="editorial" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div class="mb-4">
                <label for="isbn" class="block text-gray-700 font-medium mb-2">ISBN:</label>
                <input type="text" name="isbn" id="isbn" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            
            <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg font-medium transition-all glow">
                <i class="fas fa-save mr-2"></i> Guardar Libro
            </button>
            <button type="button" onclick="window.location.href='{{ route('home') }}'" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium transition-all glow ml-2">
                <i class="fas fa-arrow-left mr-2"></i> Volver al Inicio
            </button>
        </form>
 
@endsection
