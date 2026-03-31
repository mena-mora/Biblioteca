@extends('layout.admin')
@section('content')

<section class="max-w-5xl mx-auto">
    <div class="bg-gradient-to-r from-cyan-700 to-cyan-500 rounded-3xl p-6 md:p-8 text-white shadow-lg">
        <div class="flex items-center justify-between gap-4 flex-wrap">
            <div>
                <p class="text-sm uppercase tracking-[0.18em] text-cyan-100">Mi cuenta</p>
                <h2 class="text-2xl md:text-3xl font-bold mt-1">Perfil de Usuario</h2>
                <p class="text-cyan-50 mt-2">Administra tus datos y protege el acceso a tu cuenta.</p>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-white/20 grid place-items-center text-2xl">
                <i class="fas fa-user-cog"></i>
            </div>
        </div>
    </div>

    <div class="mt-6 space-y-4">
        @if (session('success'))
            <div class="rounded-xl border border-emerald-200 bg-emerald-50 text-emerald-800 px-4 py-3" role="alert">
                <span class="font-semibold">Exito:</span> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="rounded-xl border border-red-200 bg-red-50 text-red-800 px-4 py-3" role="alert">
                <span class="font-semibold">Error:</span> {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="rounded-xl border border-amber-200 bg-amber-50 text-amber-900 px-4 py-3" role="alert">
                <p class="font-semibold mb-1">Revisa los datos enviados:</p>
                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-1">Informacion del perfil</h3>
            <p class="text-sm text-slate-500 mb-5">Mantén actualizado tu nombre para identificar tu sesión.</p>

            <form action="{{ route('usuarios.update_profile') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-slate-700 font-semibold mb-2">Nombre del usuario</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', Auth::user()->name) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:border-cyan-500"
                        required>
                </div>

                <button type="submit" class="inline-flex items-center justify-center gap-2 bg-cyan-700 hover:bg-cyan-800 text-white font-semibold px-5 py-3 rounded-xl transition-all">
                    <i class="fas fa-save"></i>
                    Actualizar perfil
                </button>
            </form>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-1">Cambiar contraseña</h3>
            <p class="text-sm text-slate-500 mb-5">Usa una contraseña robusta para mayor seguridad.</p>

            <form action="{{ route('usuarios.update_password') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="current_password" class="block text-slate-700 font-semibold mb-2">Contraseña actual</label>
                    <input
                        type="password"
                        id="current_password"
                        name="current_password"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:border-cyan-500"
                        required>
                </div>

                <div>
                    <label for="new_password" class="block text-slate-700 font-semibold mb-2">Nueva contraseña</label>
                    <input
                        type="password"
                        id="new_password"
                        name="new_password"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:border-cyan-500"
                        required>
                </div>

                <div>
                    <label for="new_password_confirmation" class="block text-slate-700 font-semibold mb-2">Confirmar nueva contraseña</label>
                    <input
                        type="password"
                        id="new_password_confirmation"
                        name="new_password_confirmation"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:border-cyan-500"
                        required>
                </div>

                <button type="submit" class="inline-flex items-center justify-center gap-2 bg-slate-800 hover:bg-slate-900 text-white font-semibold px-5 py-3 rounded-xl transition-all">
                    <i class="fas fa-key"></i>
                    Cambiar contraseña
                </button>
            </form>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('home') }}" class="inline-flex items-center text-cyan-700 hover:text-cyan-900 font-semibold transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>
            Volver al inicio
        </a>
    </div>
</section>

@endsection