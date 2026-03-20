@extends('layout.admin')
@section('content')
    <div>
        <h1 class="text-2xl font-bold text-blue-800 mb-4">Crear nuevo préstamo</h1>

        <form action="{{ route('prestamos.buscar_usuario') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div>
                <label for="usuario_id" class="block text-gray-700 font-medium mb-2">ID del Usuario:</label>
                <input type="text" name="usuario_id" id="usuario_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div>
                <label for="usuario_nombre" class="block text-gray-700 font-medium mb-2">Nombre del Usuario:</label>
                <input type="text" name="usuario_nombre" id="usuario_nombre" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
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
                <p>Email: {{ $usuario->email }}</p>
            </div>
            
            <form action="{{ route('prestamos.select_libro') }}" method="POST">
                @csrf
                <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">
                <input type="submit" value="Seleccionar libro" class="mt-4 bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-all glow">
            </form>

        @endisset
    </div>
@endsection
