@extends('layout.admin')
@section('content')
    <div>
        <h1 class="text-2xl font-bold text-blue-800 mb-4">Crear nuevo préstamo</h1>

        <form action="{{ route('prestamos.buscar_usuario') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div>
                <label for="usuario_id" class="block text-sm font-medium text-gray-700">ID del Usuario:</label>
                <input type="text" name="usuario_id" id="usuario_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div>
                <label for="usuario_nombre" class="block text-sm font-medium text-gray-700">Nombre del Usuario:</label>
                <input type="text" name="usuario_nombre" id="usuario_nombre" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div>
                <button type="submit" class="mt-4 bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-all glow">
                    Buscar Usuario
                </button>   
            </div>
        </form>

        @isset($usuario)
            <div>
                <h2>Usuario encontrado!</h2>
                <p>ID: {{ $usuario->id }}</p>
                <p>Nombre: {{ $usuario->name }}</p>
            </div>
            
        @endisset
    </div>
@endsection