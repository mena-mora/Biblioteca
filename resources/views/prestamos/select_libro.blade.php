@extends('layout.admin')
@section('content')
    <div class="relative overflow-hidden rounded-3xl bg-linear-to-r from-cyan-700 to-cyan-500 px-5 py-8 shadow-lg sm:px-8 md:px-10">
        <div class="relative z-10 grid gap-8 lg:grid-cols-[1.4fr,1fr]">
            
            <aside class="rounded-2xl border border-cyan-100/70 bg-cyan-50 p-6 text-slate-700 shadow-sm md:p-7">
                <h2 class="text-lg font-bold text-slate-800">Usuario seleccionado</h2>

                @isset($usuario)
                    <div class="mt-4 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
                        <p class="flex items-center gap-2 font-bold uppercase tracking-wide text-emerald-700">
                            <i class="fas fa-circle-check"></i>
                            Listo para prestar
                        </p>
                        <div class="mt-3 space-y-1">
                            <p><span class="font-semibold text-emerald-900">ID:</span> {{ $usuario->id }}</p>
                            <p><span class="font-semibold text-emerald-900">Nombre:</span> {{ $usuario->name }}</p>
                            <p class="break-all"><span class="font-semibold text-emerald-900">Email:</span> {{ $usuario->email }}</p>
                        </div>
                    </div>
                @else
                    <div class="mt-4 rounded-xl border border-dashed border-slate-300 bg-white p-4 text-sm text-slate-600">
                        No se encontro usuario en esta sesion. Regresa al paso anterior para buscarlo.
                    </div>
                @endisset

            </aside>

            <section class="rounded-2xl border border-cyan-100/80 bg-white p-6 shadow-sm md:p-8">
                
                <h1 class="mt-4 text-lg font-black leading-tight text-slate-800 md:text-4xl">
                    Selecciona el libro.
                </h1>
                <p class="mt-3 max-w-2xl text-sm text-slate-600 md:text-base">
                    Elige uno de los libros disponibles para registrarlo al usuario seleccionado.
                </p>

                <form action="{{ route('prestamos.store') }}" method="POST" class="mt-7 space-y-5">
                    @csrf
                    <div>
                        <label for="libro_id" class="mb-2 block text-sm font-semibold uppercase tracking-wide text-slate-700">Libro disponible</label>
                        <div class="group relative">
                            <span class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 transition group-focus-within:text-cyan-600">
                                <i class="fas fa-book"></i>
                            </span>
                            <select name="libro_id" id="libro_id" class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-10 pr-4 text-slate-800 outline-none transition focus:border-cyan-500 focus:ring-2 focus:ring-cyan-300" required>
                                <option value="">Seleccione un libro</option>
                                @foreach($libros as $libro)
                                    <option value="{{ $libro->id }}" @selected(old('libro_id') == $libro->id)>{{ $libro->titulo }} - {{ $libro->autor }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-emerald-600 px-6 py-3 font-bold text-white transition hover:-translate-y-0.5 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-300 focus:ring-offset-2 focus:ring-offset-white">
                            <i class="fas fa-check"></i>
                            Prestar libro
                        </button>
                        <a href="{{ route('prestamos.index') }}" class="inline-flex items-center gap-2 rounded-xl bg-slate-700 px-6 py-3 font-bold text-white transition hover:bg-slate-800">
                            <i class="fas fa-arrow-left"></i>
                            Volver
                        </a>
                    </div>
                </form>
            </section>

            
        </div>
    </div>
@endsection