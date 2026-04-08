<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title',config('app.name', 'Admin Panel'))</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/css/app.css')
    @stack('styles')
</head>
<body class="bg-gray-100">
  <header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-slate-200">
    <div class="container mx-auto px-4 py-4">
      <div class="flex justify-between items-center">
        <div class="flex items-center space-x-3">
          <button id="sidebar-toggle" class="md:hidden text-cyan-800 focus:outline-none" aria-label="Abrir menú">
            <i class="fas fa-bars text-2xl"></i>
            
          </button>

          <div class="h-10 w-10 rounded-2xl  grid place-items-center text-white ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="Book-Close-Bookmark-1--Streamline-Ultimate" height="36" width="36">
                    <desc>
                      Book Close Bookmark 1 Streamline Icon: https://streamlinehq.com
                    </desc>
                  <path fill="#ffffff" d="M19.174 1.95652v2.86956H5.78267c-0.50737 0 -0.99396 -0.20154 -1.35272 -0.56032 -0.35876 -0.35876 -0.56032 -0.84535 -0.56032 -1.35272 0 -0.50737 0.20156 -0.99396 0.56032 -1.35272C4.78871 1.20155 5.2753 1 5.78267 1H18.2175c0.2536 0 0.497 0.10078 0.6763 0.28016 0.1794 0.17938 0.2802 0.42267 0.2802 0.67636Z" stroke-width="1"></path>
                  <path fill="#41a8b7" d="M20.1305 5.78262V22.0435c0 0.2536 -0.1008 0.497 -0.2802 0.6763 -0.1793 0.1794 -0.4227 0.2802 -0.6763 0.2802H5.78267c-0.50737 0 -0.99396 -0.2015 -1.35272 -0.5603 -0.35876 -0.3588 -0.56032 -0.8454 -0.56032 -1.3527V2.91306c0 0.50736 0.20156 0.99395 0.56032 1.35272 0.35876 0.35877 0.84535 0.56032 1.35272 0.56032H19.174c0.2536 0 0.497 0.10078 0.6763 0.28015 0.1794 0.17939 0.2802 0.42268 0.2802 0.67637Z" stroke-width="1"></path>
                  <path fill="#6abad2" d="M7.14189 21.087V4.8261H5.78267c-0.50737 0 -0.99396 -0.20155 -1.35272 -0.56032 -0.35876 -0.35877 -0.56032 -0.84536 -0.56032 -1.35272V21.087c0 0.5073 0.20156 0.9939 0.56032 1.3527 0.35876 0.3588 0.84535 0.5603 1.35272 0.5603h3.27226c-0.50737 0 -0.99396 -0.2015 -1.35272 -0.5603 -0.35877 -0.3588 -0.56032 -0.8454 -0.56032 -1.3527Z" stroke-width="1"></path>
                  <path fill="#ff808c" d="m17.2611 15.3478 -2.8696 -2.8695 -2.8695 2.8695V4.34783c0 -0.25369 0.1008 -0.49698 0.2801 -0.67636 0.1794 -0.17938 0.4227 -0.28016 0.6764 -0.28016h3.8261c0.2536 0 0.497 0.10078 0.6763 0.28016 0.1795 0.17938 0.2802 0.42267 0.2802 0.67636V15.3478Z" stroke-width="1"></path>
                  <path fill="#ffbfc5" d="M16.3046 3.39131h-3.8261c-0.2537 0 -0.497 0.10078 -0.6764 0.28016 -0.1793 0.17938 -0.2801 0.42267 -0.2801 0.67636v2.49748c0 -0.25369 0.1008 -0.49698 0.2801 -0.67637 0.1794 -0.17937 0.4227 -0.28015 0.6764 -0.28015h3.8261c0.2536 0 0.497 0.10078 0.6763 0.28015 0.1795 0.17939 0.2802 0.42268 0.2802 0.67637V4.34783c0 -0.25369 -0.1007 -0.49698 -0.2802 -0.67636 -0.1793 -0.17938 -0.4227 -0.28016 -0.6763 -0.28016Z" stroke-width="1"></path>
                  <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="m17.2611 15.3478 -2.8696 -2.8695 -2.8695 2.8695V4.34783c0 -0.25369 0.1008 -0.49698 0.2801 -0.67636 0.1794 -0.17938 0.4227 -0.28016 0.6764 -0.28016h3.8261c0.2536 0 0.497 0.10078 0.6763 0.28016 0.1795 0.17938 0.2802 0.42267 0.2802 0.67636V15.3478Z" stroke-width="1"></path>
                  <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M17.2609 4.8261h1.9131c0.2536 0 0.497 0.10078 0.6763 0.28015 0.1794 0.17939 0.2802 0.42268 0.2802 0.67637V22.0435c0 0.2536 -0.1008 0.497 -0.2802 0.6763 -0.1793 0.1794 -0.4227 0.2802 -0.6763 0.2802H5.78267c-0.50737 0 -0.99396 -0.2015 -1.35272 -0.5603 -0.35876 -0.3588 -0.56032 -0.8454 -0.56032 -1.3527V2.91306" stroke-width="1"></path>
                  <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M19.174 4.82608V1.95652c0 -0.25369 -0.1008 -0.49698 -0.2802 -0.67636C18.7145 1.10078 18.4711 1 18.2175 1H5.78267c-0.50737 0 -0.99396 0.20155 -1.35272 0.56032 -0.35876 0.35876 -0.56032 0.84535 -0.56032 1.35272 0 0.50737 0.20156 0.99396 0.56032 1.35272 0.35876 0.35878 0.84535 0.56032 1.35272 0.56032H9.1305" stroke-width="1"></path>
                </svg>
          
          </div>

          <div>
            <h1 class="text-xl font-bold text-cyan-800">
              Rkives
            </h1>
            <p class="text-xs text-gray-500">Panel de control</p>
          </div>
        </div>

        <!-- Menú (desktop) -->
        <nav class="hidden md:block">
          <ul class="flex space-x-8 items-center">
            <li>
              <a href="{{ route('home') }}" class="text-gray-700 font-medium hover:text-cyan-600 transition-all">
                <i class="fas fa-home mr-2"></i>Inicio
              </a>
            </li>
            <li>
            <a href="{{ route('usuarios.index') }}" class="text-gray-700 font-medium hover:text-cyan-600 transition-all">
                <i class="fas fa-users mr-2"></i>Usuarios
              </a>
            </li>
            <li>
              <a href="{{ route('prestamos.index') }}" class="text-gray-700 font-medium hover:text-cyan-600 transition-all">
                <i class="fas fa-exchange-alt mr-2"></i>Préstamos
              </a>
            </li>
            <li>
              <a href="{{ route('usuarios.profile') }}" class="text-gray-700 font-medium hover:text-cyan-600 transition-all">

                <i class="fas fa-solid fa-user mr-2"></i>Perfil
              </a>
            </li>

            <!-- Logout recomendado (POST) -->
            <li class="ml-2">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                  class="bg-cyan-700 hover:bg-cyan-800 text-white px-5 py-2 rounded-lg font-medium transition-all glow">
                  <i class="fas fa-sign-out-alt mr-2"></i>Salir
                </button>
              </form>
            </li>
          </ul>
        </nav>

        <!-- Usuario -->
        <div class="hidden md:flex items-center space-x-3">
          <div class="w-9 h-9 rounded-full bg-cyan-100 flex items-center justify-center">
            <i class="fas fa-user text-cyan-700"></i>
          </div>
          <span class="font-medium text-cyan-900">Administrador</span>
        </div>
      </div>
    </div>
  </header>

  <!-- Layout -->
  <div class="bg-gray-50 min-h-screen">
    <div class="flex">
      <!-- Sidebar -->
      <aside id="sidebar"
        class="bg-white/90 backdrop-blur w-56 min-h-screen border-r border-slate-200 fixed md:relative inset-y-0 left-0 transform -translate-x-full md:translate-x-0 z-20 transition-transform duration-200">

        <div class="p-5 border-b border-slate-200">
          <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-full bg-cyan-100 flex items-center justify-center">
              <i class="fas fa-user-shield text-cyan-700"></i>
            </div>
            <div>
              <p class="font-bold text-cyan-900 leading-tight">Administrador</p>
              <p class="text-xs text-gray-500">Gestión del sistema</p>
            </div>
          </div>
        </div>

        <nav class="p-4 ">
          <ul class="space-y-2">
            <li>
              <a href="{{ route('home') }}"
                class="flex items-center p-3 text-gray-700 hover:bg-cyan-50 hover:text-cyan-700 rounded-xl transition-all font-medium hover-lift">
                <i class="fas fa-home w-6 mr-3"></i> Inicio
              </a>
            </li>
            <li>
              <a href="{{ route('usuarios.index') }}"
                class="flex items-center p-3 text-gray-700 hover:bg-cyan-50 hover:text-cyan-700 rounded-xl transition-all font-medium hover-lift">
                <i class="fas fa-users w-6 mr-3"></i> Usuarios
              </a>
            </li>
            <li>
              <a href="{{ route('categorias.index') }}"
                class="flex items-center p-3 text-gray-700 hover:bg-cyan-50 hover:text-cyan-700 rounded-xl transition-all font-medium hover-lift">
                <i class="fas fa-tags w-6 mr-3"></i> Categorías
              </a>
            </li>
            <li>
              <a href="{{ route('libros.index') }}"
                class="flex items-center p-3 text-gray-700 hover:bg-cyan-50 hover:text-cyan-700 rounded-xl transition-all font-medium hover-lift">
                <i class="fas fa-book w-6 mr-3"></i> Libros
              </a>
            </li>
            <li>
              <a href="{{ route('prestamos.index') }}"
                class="flex items-center p-3 text-gray-700 hover:bg-cyan-50 hover:text-cyan-700 rounded-xl transition-all font-medium hover-lift">
                <i class="fas fa-exchange-alt w-6 mr-3"></i> Préstamos
              </a>
            </li>
            <li>
              <a href="{{ route('usuarios.profile') }}"
                class="flex items-center p-3 text-gray-700 hover:bg-cyan-50 hover:text-cyan-700 rounded-xl transition-all font-medium hover-lift">
                <i class="fas fa-solid fa-user w-6 mr-3"></i> Perfil
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