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
        <i class="fas fa-plus mr-2"></i> Agregar Préstamo
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
                    <th class="text-left font-semibold px-6 py-4">Fecha de devolucion</th>
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
                        <td class="px-6 py-4">
                            @if ($prestamo->estado == 'pendiente')
                                <span class="inline-flex items-center rounded-full bg-red-50 px-2.5 py-1 text-red-700 font-medium">
                                Pendiente
                                </span>
                            @else
                                <span class="inline-flex items-center rounded-full bg-emerald-100 px-2.5 py-1 text-emerald-700 font-medium">
                                Entregado
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ $prestamo->fecha_entrega }}</td>
                        <td class="px-6 py-4">{{$prestamo->fecha_devolucion}}</td>
                        <td class="px-6 py-4 justify-center">
                            @if ($prestamo->estado == 'pendiente')
                                <a href="{{ route('prestamos.entregar', $prestamo->id) }}" class="text-green-600 hover:text-green-800 font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                                    </svg>
                                </a>
                            @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>  
    </div>
 </div>
@endsection