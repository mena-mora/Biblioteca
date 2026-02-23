
@extends('layout.app') 

@section('title', 'Login - Biblioteca')
@section('content')
  <!-- Header -->
  <header class="bg-white shadow-sm sticky top-0 z-30">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center gap-3 w-full">
          <a href="#" class="flex items-center gap-3 h-30 w-50">
              <img src="{{ asset('images/logo.png') }}" alt="Logo de la Biblioteca" class="h-full w-full object-contain">

            <span class="font-semibold text-lg w-full">Biblioteca</span>
          </a>
          
          
        </div>
        <div class="text-righ flex items-center gap-3">
            <a href="/" class="ml-4 text-sm text-cyan-600 hover:text-cyan-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" /> 
            </svg>
          </a>
        </div>

        <!-- Desktop nav -->
        

        <!-- Mobile hamburger -->
        <div class="md:hidden">
          <button id="btnMenu" aria-expanded="false" aria-controls="mobileMenu" class="p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <svg id="iconOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg id="iconClose" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobileMenu" class="md:hidden hidden border-t bg-white">
      <div class="px-4 pt-4 pb-6 space-y-2">
        <a href="#inicio" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">Inicio</a>
        <a href="#login" class="block px-3 py-2 rounded-md text-base font-medium text-cyan-600 border border-indigo-600 hover:bg-indigo-50">Login</a>
      </div>
    </div>
  </header>

  <!-- Main -->
  <main class="flex-1">
    <!-- Login / Register -->
    <section id="login" class="min-h-[calc(100vh-8rem)] flex items-center justify-center bg-linear-to-b from-blue-50 to-white px-4 py-12">
      <div class="w-full max-w-4xl bg-white rounded-2xl shadow-lg grid grid-cols-1 md:grid-cols-2 overflow-hidden">
        <!-- Login -->
        <div class="p-8">
          <h2 class="text-2xl font-bold text-gray-800 text-center">Iniciar sesión</h2>
          <p class="text-sm text-gray-500 text-center mt-1">Accede a la biblioteca</p>

          <form class="mt-8 space-y-5" method="POST" action="{{ route('login') }}">
            @csrf
            <div>
              <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
              <input type="email" name="email" value="{{ old('email') }}" required placeholder="correo@ejemplo.com" class="mt-1 w-full rounded-lg border-gray-300 px-4 py-2 focus:border-blue-500 focus:ring-blue-500 @error('email') @enderror" />
              @error('email')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
              @enderror
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">Contraseña</label>
              <input type="password" name="password" required placeholder="••••••••" class="mt-1 w-full rounded-lg border-gray-300 px-4 py-2 focus:border-cyan-500 focus:ring-cyan-500 @error('password') @enderror" />
              @error('password')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
              @enderror
            </div>

            <button type="submit" class="w-full py-3 bg-cyan-600 text-white rounded-lg font-semibold hover:bg-cyan-700 transition">Entrar</button>
          </form>
        </div>

        <!-- Register -->
        <div class="p-8 bg-gray-50">
          <h2 class="text-2xl font-bold text-gray-800 text-center">Registrarse</h2>
          <p class="text-sm text-gray-500 text-center mt-1">Crea una cuenta nueva</p>

          <form class="mt-8 space-y-5" method="POST" action="{{ route('register') }}">
            @csrf
            <div>
              <label class="block text-sm font-medium text-gray-700">Nombre completo</label>
              <input 
              type="text" 
              id="name" 
              name="name" 
              required placeholder="Tu nombre" 
              class="mt-1 w-full rounded-lg border-gray-300 px-4 py-2 focus:border-cyan-500 focus:ring-cyan-500" />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
              <input 
              type="email" 
              id="email"
              name="email"
              required placeholder="correo@ejemplo.com" 
              class="mt-1 w-full rounded-lg border-gray-300 px-4 py-2 focus:border-cyan-500 focus:ring-cyan-500" />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">Contraseña</label>
              <input 
              type="password" 
              id="password"
                name="password"
              required placeholder="••••••••" class="mt-1 w-full rounded-lg border-gray-300 px-4 py-2 focus:border-cyan-500 focus:ring-cyan-500" />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">Confirmar contraseña</label>
              <input 
              type="password" 
              id="password_confirmation"
                name="password_confirmation"
              required placeholder="••••••••" class="mt-1 w-full rounded-lg border-gray-300 px-4 py-2 focus:border-cyan-500 focus:ring-cyan-500" />
            </div>

            <button type="submit" class="w-full py-3 bg-cyan-600 text-white rounded-lg font-semibold hover:bg-cyan-700 transition">Crear cuenta</button>
          </form>
        </div>
      </div>
    </section>
  </main>

    @include('partials.auth.footer')
  

  <!-- Vanilla JS for hamburger menu and small behaviors -->
  <script>
    (function(){
      const btn = document.getElementById('btnMenu');
      const mobile = document.getElementById('mobileMenu');
      const iconOpen = document.getElementById('iconOpen');
      const iconClose = document.getElementById('iconClose');

      btn.addEventListener('click', function(){
        const expanded = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', String(!expanded));
        mobile.classList.toggle('hidden');
        iconOpen.classList.toggle('hidden');
        iconClose.classList.toggle('hidden');
      });

      // Close mobile menu on resize to desktop
      window.addEventListener('resize', function(){
        if(window.innerWidth >= 768){
          mobile.classList.add('hidden');
          btn.setAttribute('aria-expanded', 'false');
          iconOpen.classList.remove('hidden');
          iconClose.classList.add('hidden');
        }
      });

      // Footer year
      const yearEl = document.getElementById('year');
      if (yearEl) {
        yearEl.textContent = new Date().getFullYear();
      }
    })();
  </script>

@endsection
