<footer class="border-t border-slate-200 bg-white/80 backdrop-blur" role="contentinfo">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
            <div class="flex items-center gap-3 min-w-0">
                <div class="h-8 w-8 rounded-lg bg-cyan-100 text-cyan-700 grid place-items-center shrink-0">
                    <i class="fas fa-book text-sm"></i>
                </div>
                <div class="min-w-0">
                    <p class="text-sm font-semibold text-slate-800 truncate">{{ config('app.name', 'Biblioteca') }}</p>
                    <p class="text-xs text-slate-500 truncate">Panel de gestion bibliotecaria</p>
                </div>
            </div>

            <nav class="flex flex-wrap items-center gap-x-4 gap-y-1 text-sm" aria-label="Enlaces del footer">
                <a href="{{ route('home') }}" class="text-slate-600 hover:text-cyan-700 transition-colors">Inicio</a>
                <a href="{{ route('libros.index') }}" class="text-slate-600 hover:text-cyan-700 transition-colors">Libros</a>
                <a href="{{ route('prestamos.index') }}" class="text-slate-600 hover:text-cyan-700 transition-colors">Prestamos</a>
                <a href="{{ route('usuarios.profile') }}" class="text-slate-600 hover:text-cyan-700 transition-colors">Mi perfil</a>
            </nav>
        </div>

        <div class="mt-3 pt-3 border-t border-slate-100 flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
            <small class="text-xs text-slate-500">&copy; {{ date('Y') }} {{ config('app.name', 'Biblioteca') }}.</small>
            <small class="text-xs text-slate-400">Hecho para una experiencia rapida y clara.</small>
        </div>
    </div>
</footer>

