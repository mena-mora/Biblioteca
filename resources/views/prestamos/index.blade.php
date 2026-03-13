@extends('layout.admin')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-blue-800 mb-4">Prestamos</h1>

    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-100 px-4 py-3 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 rounded-lg bg-red-100 px-4 py-3 text-red-800">
            {{ session('error') }}
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
                    <th class="text-left font-semibold px-6 py-4">Usuario</th>
                    <th class="text-left font-semibold px-6 py-4">Libro</th>
                    <th class="text-left font-semibold px-6 py-4">Estado</th>
                    <th class="text-left font-semibold px-6 py-4">Fecha de entrega</th>
                    <th class="text-right font-semibold px-6 py-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if($prestamos->isEmpty())
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No hay préstamos registrados</td>
                    </tr>
                @endif
                @foreach($prestamos as $prestamo)
                    <tr class="border-t border-slate-200">
                        <td class="px-6 py-4">{{ $prestamo->id }}</td>
                        <td class="px-6 py-4">{{ $prestamo->usuario->name ?? 'Sin usuario' }}</td>
                        <td class="px-6 py-4">{{ $prestamo->libro->titulo ?? 'Sin libro' }}</td>
                        <td class="px-6 py-4">{{ $prestamo->estado }}</td>
                        <td class="px-6 py-4">{{ $prestamo->fecha_entrega }}</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-blue-600 hover:bg-blue-100 p-2 rounded-full transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                    </svg>
                                </button>
                            <form action="" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:bg-red-100 p-2 rounded-full transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79" />
                                    </svg>
                                </button>
                            </form> 
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>  
    </div>
 </div>
@endsection