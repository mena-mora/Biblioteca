@extends("layout.admin")

@section("content")

    <div class="">
        <h1 class="text-2xl font-bold text-blue-800 mb-4">Crear Categoría</h1>

        <form action="{{ route('categorias.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre de la categoría:</label>
                <input type="text" name="nombre" id="nombre" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            
            <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg font-medium transition-all glow">
                <i class="fas fa-save mr-2"></i> Guardar Categoría
            </button>
            <button type="button" onclick="window.location.href='{{ route('categorias.index') }}'" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium transition-all glow ml-2">
                <i class="fas fa-arrow-left mr-2"></i> Volver a Categorías
            </button>
        </form>
    </div>

@endsection