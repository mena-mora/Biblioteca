<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title',config('app.name', 'Admin Panel'))</title>
    @vite('resources/css/app.css')
    @stack('styles')
</head>
<body class="bg-gray-100">
      <header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-slate-200">
    <div class="container mx-auto px-4 py-4">
      <div class="flex justify-between items-center">
        <div class="flex items-center space-x-3">
          <button id="sidebar-toggle" class="md:hidden text-blue-800 focus:outline-none" aria-label="Abrir menú">
            <i class="fas fa-bars text-2xl"></i>
          </button>

          <div class="w-10 h-10 rounded-lg bg-blue-700 flex items-center justify-center custom-shadow">
            <i class="fas fa-book-open text-white text-xl"></i>
          </div>

          <div>
            <h1 class="text-xl font-bold text-blue-800">
              Admin <span class="text-blue-500">Biblioteca</span>
            </h1>
            <p class="text-xs text-gray-500">Panel de control</p>
          </div>
        </div>

        <!-- Menú (desktop) -->
        <nav class="hidden md:block">
          <ul class="flex space-x-8 items-center">
            <li>
              <a href="{{ route('home') }}" class="text-gray-700 font-medium hover:text-blue-600 transition-all">
                <i class="fas fa-home mr-2"></i>Inicio
              </a>
            </li>
            <li>
              <a href="#usuarios" class="text-gray-700 font-medium hover:text-blue-600 transition-all">
                <i class="fas fa-users mr-2"></i>Usuarios
              </a>
            </li>
            <li>
              <a href="#prestamos" class="text-gray-700 font-medium hover:text-blue-600 transition-all">
                <i class="fas fa-exchange-alt mr-2"></i>Préstamos
              </a>
            </li>

            <!-- Logout recomendado (POST) -->
            <li class="ml-2">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                  class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-2 rounded-lg font-medium transition-all glow">
                  <i class="fas fa-sign-out-alt mr-2"></i>Salir
                </button>
              </form>
            </li>
          </ul>
        </nav>

        <!-- Usuario -->
        <div class="hidden md:flex items-center space-x-3">
          <div class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center">
            <i class="fas fa-user text-blue-700"></i>
          </div>
          <span class="font-medium text-blue-900">Administrador</span>
        </div>
      </div>
    </div>
  </header>

  <!-- Layout -->
  <div class="bg-gray-50 min-h-screen">
    <div class="flex">
      <!-- Sidebar -->
      <aside id="sidebar"
        class="bg-white/90 backdrop-blur w-72 min-h-screen border-r border-slate-200 fixed md:relative inset-y-0 left-0 transform -translate-x-full md:translate-x-0 z-20 transition-transform duration-200">

        <div class="p-5 border-b border-slate-200">
          <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
              <i class="fas fa-user-shield text-blue-700"></i>
            </div>
            <div>
              <p class="font-bold text-blue-900 leading-tight">Administrador</p>
              <p class="text-xs text-gray-500">Gestión del sistema</p>
            </div>
          </div>
        </div>

        <nav class="p-4">
          <ul class="space-y-2">
            <li>
              <a href="{{ route('home') }}"
                class="flex items-center p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all font-medium hover-lift">
                <i class="fas fa-home w-6 mr-3"></i> Inicio
              </a>
            </li>
            <li>
              <a href="#libros"
                class="flex items-center p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all font-medium hover-lift">
                <i class="fas fa-book w-6 mr-3"></i> Usuarios
              </a>
            </li>
            <li>
              <a href="{{ route('categorias.index') }}"
                class="flex items-center p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all font-medium hover-lift">
                <i class="fas fa-tags w-6 mr-3"></i> Categorías
              </a>
            </li>
            <li>
              <a href="#libros"
                class="flex items-center p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all font-medium hover-lift">
                <i class="fas fa-book w-6 mr-3"></i> Libros
              </a>
            </li>
            <li>
              <a href="#prestamos"
                class="flex items-center p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all font-medium hover-lift">
                <i class="fas fa-exchange-alt w-6 mr-3"></i> Préstamos
              </a>
            </li>
            
            <li class="pt-2 border-t border-slate-200">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                  class="w-full flex items-center p-3 text-gray-700 hover:bg-red-50 hover:text-red-700 rounded-xl transition-all font-medium hover-lift">
                  <i class="fas fa-sign-out-alt w-6 mr-3"></i> Salir
                </button>
              </form>
            </li>
          </ul>

          <!-- Stats (como tus KPI cards) -->
          <div class="my-8 border-t border-slate-200 pt-6">
            <h3 class="text-xs font-semibold text-gray-500 uppercase mb-3">Estadísticas rápidas</h3>

            <div class="space-y-3">
              <div class="bg-blue-50 p-3 rounded-xl">
                <div class="flex justify-between items-center">
                  <span class="text-sm text-gray-600">Libros activos</span>
                  <span class="font-bold text-blue-700">1,245</span>
                </div>
              </div>
              <div class="bg-green-50 p-3 rounded-xl">
                <div class="flex justify-between items-center">
                  <span class="text-sm text-gray-600">Préstamos activos</span>
                  <span class="font-bold text-green-700">87</span>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </aside>

      <!-- Overlay -->
      <div id="overlay" class="fixed inset-0 bg-black/50 z-10 md:hidden hidden"></div>

      <!-- Content -->
      <main class="flex-1 p-4 md:p-8 md:ml-0">
        <!-- aquí va TODO tu contenido tal cual -->
        {{-- Tu contenido actual (cards, tabla, etc.) --}}@yield('content')
      </main>
    </div>
  </div>
    
    @vite('resources/js/app.js')
    @stack('scripts')
</body>
</html>