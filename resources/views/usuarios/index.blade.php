@extends('layout.admin')
@section('title', 'Usuarios')
@section('content')
    <h1 class="text-2xl font-bold text-blue-800 mb-4">Usuarios</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Exito! </strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <section class="mt-6 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4" aria-label="Resumen">
              <article class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                <p class="text-xs text-slate-500 uppercase tracking-wider">Usuarios</p>
                <p class="text-2xl font-bold mt-1">128</p>
                <p class="text-sm text-emerald-700 mt-2">Cantidad total</p>
              </article>
    </section>

    <a href="{{ route('usuarios.create') }}"
        class="bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-all glow mb-4 inline-block">
        <i class="fas fa-plus mr-2"></i>+ Agregar Usuario
    </a>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="text-left font-semibold px-6 py-4">ID</th>
                    <th class="text-left font-semibold px-6 py-4">Nombre</th>
                    <th class="text-left font-semibold px-6 py-4">Email</th>
                    <th class="text-left font-semibold px-6 py-4">Tipo</th>
                    <th class="text-right font-semibold px-6 py-4">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200">
                @foreach($usuarios as $usuario)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 font-medium text-slate-800">{{ $usuario->id }}</td>
                        <td class="px-6 py-4 text-slate-700">{{ $usuario->name }}</td>
                        <td class="px-6 py-4 text-slate-700">{{ $usuario->email }}</td>
                        <td class="px-6 py-4 text-slate-700">{{ $usuario->user_type }}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                    class="text-blue-600 hover:bg-blue-100 p-2 rounded-full transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                    </svg>
                                </a>
                                <a href="{{ route('usuarios.delete_confirm', $usuario->id) }}" class="text-red-500 hover:bg-red-100 p-2 rounded-full transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79" />
                                    </svg>
                                </a>

                               <!-- <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 hover:bg-red-100 p-2 rounded-full transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79" />
                                        </svg>
                                    </button>
                                </form>-->
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection