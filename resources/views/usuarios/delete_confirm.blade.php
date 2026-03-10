@extends ('layout.admin')

@section('content')

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <h1 class="text-lg font-semibold text-slate-800">Eliminar Usuario</h1>
        <p class="text-slate-600">¿Estás seguro de que deseas eliminar al usuario "{{ $usuario->name }}"?</p>

        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="text-left font-semibold px-6 py-4">ID</th>
                    <th class="text-left font-semibold px-6 py-4">Nombre</th>
                    <th class="text-left font-semibold px-6 py-4">Email</th>
                    <th class="text-left font-semibold px-6 py-4">Tipo</th>
                </tr>
            </thead>
            <tbody class ="divide-y divide-slate-200">
                <tr class= "hover:bg-slate-50 transition">
                    <td class="px-6 py-4 font-medium text-slate-800">{{ $usuario->id }}</td>
                    <td class="px-6 py-4 text-slate-700">{{ $usuario->name }}</td>
                    <td class="px-6 py-4 text-slate-700">{{ $usuario->email }}</td>
                    <td class="px-6 py-4 text-slate-700">{{ $usuario->user_type }}</td>
                </tr>
            </tbody>
        </table>

        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Eliminar
            </button>
            <a href="{{ route('usuarios.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Cancelar
            </a>
        </form>
        
    </div>

@endsection