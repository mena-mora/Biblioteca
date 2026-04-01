@extends('layout.admin')
@section('content')
    <div class="relative overflow-hidden rounded-3xl bg-linear-to-r from-cyan-700 to-cyan-500 px-5 py-8 shadow-lg sm:px-8 md:px-10">

        <div class="relative z-10 grid gap-8 lg:grid-cols-[1.4fr,1fr]">
            <section class="rounded-2xl border border-cyan-100/80 bg-white p-6 shadow-sm md:p-8">
                <p class="inline-flex items-center rounded-full border border-cyan-200 bg-cyan-50 px-4 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-cyan-700">
                    Nuevo prestamo
                </p>
                <h1 class="mt-4 text-3xl font-black leading-tight text-slate-800 md:text-4xl">
                    Conecta a la persona correcta con su proximo libro.
                </h1>
                <p class="mt-3 max-w-2xl text-sm text-slate-600 md:text-base">
                    Busca por ID o nombre del usuario y abre el flujo para seleccionar el libro en segundos.
                </p>

                <form action="{{ route('prestamos.buscar_usuario') }}" method="POST" class="mt-7 space-y-5">
                    @csrf
                    <div>
                        <label for="usuario_id" class="mb-2 block text-sm font-semibold uppercase tracking-wide text-slate-700">ID del usuario</label>
                        <div class="group relative">
                            <span class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 transition group-focus-within:text-cyan-600">
                                <i class="fas fa-id-card"></i>
                            </span>
                            <input
                                type="text"
                                name="usuario_id"
                                id="usuario_id"
                                class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-10 pr-4 text-slate-800 placeholder-slate-400 outline-none transition focus:border-cyan-500 focus:ring-2 focus:ring-cyan-300"
                                placeholder="Ej: 102"
                                value="{{ old('usuario_id') }}"
                            >
                        </div>
                    </div>

                    <div>
                        <label for="usuario_nombre" class="mb-2 block text-sm font-semibold uppercase tracking-wide text-slate-700">Nombre del usuario</label>
                        <div class="group relative">
                            <span class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 transition group-focus-within:text-cyan-600">
                                <i class="fas fa-user"></i>
                            </span>
                            <input
                                type="text"
                                name="usuario_nombre"
                                id="usuario_nombre"
                                class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-10 pr-4 text-slate-800 placeholder-slate-400 outline-none transition focus:border-cyan-500 focus:ring-2 focus:ring-cyan-300"
                                placeholder="Ej: Ana Martinez"
                                value="{{ old('usuario_nombre') }}"
                            >
                        </div>
                    </div>

                    <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-cyan-700 px-6 py-3 font-bold text-white transition hover:-translate-y-0.5 hover:bg-cyan-800 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:ring-offset-2 focus:ring-offset-white">
                        <i class="fas fa-search"></i>
                        Buscar usuario
                    </button>
                </form>
            </section>

            <aside class="rounded-2xl border border-cyan-100/70 bg-cyan-50 p-6 text-slate-700 shadow-sm md:p-7">
                <h2 class="text-lg font-bold text-slate-800">Flujo rapido</h2>
                <ol class="mt-4 space-y-4 text-sm">
                    <li class="flex gap-3">
                        <span class="mt-0.5 inline-flex h-6 w-6 flex-none items-center justify-center rounded-full bg-cyan-700 font-bold text-white">1</span>
                        <p>Identifica a la persona por ID o por nombre.</p>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-0.5 inline-flex h-6 w-6 flex-none items-center justify-center rounded-full bg-cyan-700 font-bold text-white">2</span>
                        <p>Confirma visualmente sus datos antes de continuar.</p>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-0.5 inline-flex h-6 w-6 flex-none items-center justify-center rounded-full bg-cyan-700 font-bold text-white">3</span>
                        <p>Avanza al selector de libro con un solo clic.</p>
                    </li>
                </ol>

                @isset($usuario)
                    <div class="mt-7 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
                        <p class="flex items-center gap-2 font-bold uppercase tracking-wide text-emerald-700">
                            <i class="fas fa-circle-check"></i>
                            Usuario encontrado
                        </p>
                        <div class="mt-3 space-y-1">
                            <p><span class="font-semibold text-emerald-900">ID:</span> {{ $usuario->id }}</p>
                            <p><span class="font-semibold text-emerald-900">Nombre:</span> {{ $usuario->name }}</p>
                            <p class="break-all"><span class="font-semibold text-emerald-900">Email:</span> {{ $usuario->email }}</p>
                        </div>

                        <form action="{{ route('prestamos.select_libro') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">
                            <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-emerald-600 px-4 py-2.5 font-bold text-white transition hover:bg-emerald-700">
                                <i class="fas fa-book-open"></i>
                                Seleccionar libro
                            </button>
                        </form>
                    </div>
                @else
                    <div class="mt-7 rounded-xl border border-dashed border-slate-300 bg-white p-4 text-sm text-slate-600">
                        Cuando encuentres un usuario, aqui aparecera su tarjeta para continuar al selector de libro.
                    </div>
                @endisset
            </aside>
        </div>
    </div>
@endsection
