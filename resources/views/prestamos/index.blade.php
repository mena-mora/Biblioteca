@extends('layout.admin')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-blue-800 mb-4">Prestamos</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Exito! </strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <a href="{{ route('prestamos.create') }}"
        class="bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-all glow mb-4 inline-block">
        <i class="fas fa-plus mr-2"></i>+ Agregar Préstamo
    </a>
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="text-left font-semibold px-6 py-4">ID</th>
                    <th class="text-left font-semibold px-6 py-4"></th>
                    <th class="text-left font-semibold px-6 py-4"></th>
                    <th class="text-left font-semibold px-6 py-4"></th>
                    <th class="text-right font-semibold px-6 py-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prestamos as $prestamo)
                    <tr class="border-t border-slate-200">
                        <td class="px-6 py-4">{{ $prestamo->id }}</td>
                        <td class="px-6 py-4">{{ $prestamo->fecha_entrega }}</td>
                        <td class="px-6 py-4">{{ $prestamo->fecha_devolucion }}</td>
                        <td class="px-6 py-4">{{ $prestamo->estado }}</td>
                        <td class="px-6 py-4 text-right">
                            <a href=""
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg font-medium transition-all glow">
                                Editar
                            </a>
                            <form action="" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg font-medium transition-all glow">
                                    Eliminar
                                </button>   
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>  
    </div>
 </div>
@endsection