@extends('layout.admin')
@section('content')
    <div class="">
        <h1 class="text-2xl font-bold text-blue-800 mb-4">Editar usuario</h1>

        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nombre del usuario:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $usuario->name) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email del usuario:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $usuario->email) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="user_type" class="block text-gray-700 font-medium mb-2">Tipo de usuario:</label>
                <select name="user_type" id="user_type" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
                    <option value="admin" {{ old('user_type', $usuario->user_type) == 'admin' ? 'selected' : '' }}>Administrador</option>
                    <option value="lector" {{ old('user_type', $usuario->user_type) == 'lector' ? 'selected' : '' }}>Usuario</option>
                </select>
                @error('user_type')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg font-medium transition-all glow">
                <i class="fas fa-save mr-2"></i> Guardar Usuario
            </button>
            <button type="button" onclick="window.location.href='{{ route('usuarios.index') }}'" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium transition-all glow ml-2">
                <i class="fas fa-arrow-left mr-2"></i> Volver a Usuarios
            </button>
        </form>
    </div>
@endsection