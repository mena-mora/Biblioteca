@extends('layout.app')
@section('title', 'Bienvenido a Biblioteca')
@section('content')
  <div class="min-h-screen flex flex-col">

    <!-- HEADER -->
    <header class="sticky top-0 z-30 bg-white/85 backdrop-blur border-b border-slate-200">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="h-16 flex items-center justify-between gap-3">

          <!-- Left: Brand + Hamburguesa -->
          <div class="flex items-center gap-3">
            <button
              id="btnOpen"
              type="button"
              class="md:hidden inline-flex items-center justify-center rounded-xl p-2 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
              aria-controls="mobileMenu"
              aria-expanded="false"
              aria-label="Abrir menú"
            >
              <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
              </svg>
            </button>

            <a href="#inicio" class="flex items-center gap-2">
              <div class="h-10 w-10 rounded-2xl bg-indigo-600 grid place-items-center text-white font-extrabold shadow-sm">
                B
              </div>
              <div class="leading-tight">
                <p class="font-semibold text-slate-900">Biblioteca</p>
                <p class="text-xs text-slate-500 -mt-0.5">Lee • Reserva • Aprende</p>
              </div>
            </a>
          </div>

          <!-- Desktop nav -->
          <nav class="hidden md:flex items-center gap-1" aria-label="Menú principal">
            <a href="#inicio"
               class="px-4 py-2 rounded-xl text-sm font-medium bg-indigo-50 text-indigo-700 hover:bg-indigo-100">
              Inicio
            </a>
            <a href="#catalogo"
               class="px-4 py-2 rounded-xl text-sm font-medium text-slate-700 hover:bg-slate-100">
              Catálogo
            </a>
            <a href="#beneficios"
               class="px-4 py-2 rounded-xl text-sm font-medium text-slate-700 hover:bg-slate-100">
              Beneficios
            </a>
          </nav>

          <!-- Right actions -->
          <div class="flex items-center gap-2">
            <a href="{{ route('login') }}"
               class="hidden sm:inline-flex px-4 py-2 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-100">
              Login
            </a>
          </div>
        </div>
      </div>
    </header>

    <!-- MAIN -->
    <main class="flex-1">
      <!-- HERO -->
      <section id="inicio" class="relative overflow-hidden">
        <!-- Background image (stock libre) -->
        <div class="absolute inset-0">
          <img
            src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=2400&q=70"
            alt="Biblioteca con estantes y libros"
            class="h-full w-full object-cover"
            loading="lazy"
          />
          <div class="absolute inset-0 bg-gradient-to-b from-slate-950/75 via-slate-950/55 to-slate-950/75"></div>

          <!-- Decorative blobs -->
          <div class="absolute -top-24 -right-24 h-80 w-80 rounded-full bg-indigo-500/25 blur-3xl"></div>
          <div class="absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-emerald-500/20 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-14 sm:py-20">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <!-- Text -->
            <div class="lg:col-span-7 text-white">
              <p class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-xs font-semibold tracking-wide border border-white/15">
                <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                Plataforma de Biblioteca
              </p>

              <h1 class="mt-5 text-3xl sm:text-5xl font-extrabold leading-tight">
                Todo tu catálogo y préstamos
                <span class="text-indigo-300">en un solo lugar</span>.
              </h1>

              <p class="mt-4 text-base sm:text-lg text-white/85 max-w-2xl">
                Descubre libros, revisa disponibilidad, reserva y lleva control de tus préstamos con una experiencia limpia y rápida.
              </p>

              <div class="mt-7 flex flex-col sm:flex-row gap-3">
                <a href="{{ route('login') }}"
                   class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-indigo-600 text-white font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-300 shadow-lg shadow-indigo-600/20">
                  Iniciar sesión
                </a>
                <a href="#catalogo"
                   class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-white/10 text-white font-semibold hover:bg-white/15 focus:outline-none focus:ring-2 focus:ring-white/30 border border-white/15">
                  Ver catálogo
                </a>
              </div>

              <!-- KPI -->
              <div class="mt-10 grid grid-cols-2 sm:grid-cols-3 gap-3 max-w-2xl">
                <article class="rounded-2xl bg-white/10 border border-white/15 p-4">
                  <p class="text-xs uppercase tracking-wider text-white/70">Títulos</p>
                  <p class="mt-1 text-2xl font-bold">+5,000</p>
                  <p class="mt-1 text-xs text-white/70">En crecimiento</p>
                </article>
                <article class="rounded-2xl bg-white/10 border border-white/15 p-4">
                  <p class="text-xs uppercase tracking-wider text-white/70">Reservas</p>
                  <p class="mt-1 text-2xl font-bold">Rápidas</p>
                  <p class="mt-1 text-xs text-white/70">En pocos pasos</p>
                </article>
                <article class="hidden sm:block rounded-2xl bg-white/10 border border-white/15 p-4">
                  <p class="text-xs uppercase tracking-wider text-white/70">Acceso</p>
                  <p class="mt-1 text-2xl font-bold">24/7</p>
                  <p class="mt-1 text-xs text-white/70">Desde cualquier lugar</p>
                </article>
              </div>
            </div>

            <!-- Hero Card -->
            <div class="lg:col-span-5">
              <div class="rounded-3xl bg-white/95 border border-white/40 shadow-2xl overflow-hidden">
                <div class="p-5 sm:p-6">
                  <div class="flex items-center justify-between gap-3">
                    <div>
                      <h2 class="text-lg font-bold text-slate-900">Recomendaciones</h2>
                      <p class="text-sm text-slate-500">Lecturas populares y nuevas.</p>
                    </div>
                    <span class="inline-flex items-center rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 border border-emerald-100">
                      Nuevo
                    </span>
                  </div>

                  <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <article class="rounded-2xl border border-slate-200 bg-slate-50 overflow-hidden">
                      <img
                        src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=1200&q=70"
                        alt="Libro abierto en una mesa"
                        class="h-36 w-full object-cover"
                        loading="lazy"
                      />
                      <div class="p-4">
                        <p class="text-sm font-semibold">Clásicos esenciales</p>
                        <p class="text-xs text-slate-500 mt-1">Para empezar con buen pie.</p>
                      </div>
                    </article>

                    <article class="rounded-2xl border border-slate-200 bg-slate-50 overflow-hidden">
                      <img
                        src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?auto=format&fit=crop&w=1200&q=70"
                        alt="Estantes de biblioteca"
                        class="h-36 w-full object-cover"
                        loading="lazy"
                      />
                      <div class="p-4">
                        <p class="text-sm font-semibold">Nuevas adquisiciones</p>
                        <p class="text-xs text-slate-500 mt-1">Lo más reciente del catálogo.</p>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- CATALOGO (sección visual) -->
      <section id="catalogo" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12">
        <header class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3">
          <div>
            <p class="text-xs uppercase tracking-wider text-slate-500">Explora</p>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Catálogo destacado</h2>
            <p class="mt-2 text-sm text-slate-600 max-w-2xl">
              Un vistazo a secciones populares: ciencia, literatura, programación y más.
            </p>
          </div>

          <a href="#login"
             class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-white border border-slate-200 text-sm font-semibold hover:bg-slate-50">
            Ver todo
          </a>
        </header>

        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
          <article class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden group">
            <div class="relative">
              <img
                src="https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&w=1400&q=70"
                alt="Libros apilados"
                class="h-44 w-full object-cover group-hover:scale-[1.02] transition-transform duration-300"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 to-transparent"></div>
              <p class="absolute bottom-3 left-3 text-white text-sm font-semibold">Literatura</p>
            </div>
            <div class="p-5">
              <p class="text-sm text-slate-600">Novelas, cuentos y poesía para todos los gustos.</p>
            </div>
          </article>

          <article class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden group">
            <div class="relative">
              <img
                src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1400&q=70"
                alt="Laptop y cuaderno"
                class="h-44 w-full object-cover group-hover:scale-[1.02] transition-transform duration-300"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 to-transparent"></div>
              <p class="absolute bottom-3 left-3 text-white text-sm font-semibold">Tecnología</p>
            </div>
            <div class="p-5">
              <p class="text-sm text-slate-600">Programación, redes, bases de datos y más.</p>
            </div>
          </article>

          <article class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden group">
            <div class="relative">
              <img
                src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1400&q=70"
                alt="Personas estudiando"
                class="h-44 w-full object-cover group-hover:scale-[1.02] transition-transform duration-300"
                loading="lazy"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 to-transparent"></div>
              <p class="absolute bottom-3 left-3 text-white text-sm font-semibold">Educación</p>
            </div>
            <div class="p-5">
              <p class="text-sm text-slate-600">Material académico y recursos para estudiar mejor.</p>
            </div>
          </article>
        </div>
      </section>

      <!-- BENEFICIOS -->
      <section id="beneficios" class="bg-white border-y border-slate-200">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12">
          <header class="max-w-2xl">
            <p class="text-xs uppercase tracking-wider text-slate-500">Por qué usarla</p>
            <h2 class="mt-2 text-2xl sm:text-3xl font-extrabold text-slate-900">Beneficios pensados para ti</h2>
            <p class="mt-2 text-sm text-slate-600">
              Una experiencia clara, rápida y moderna (como te gusta): tarjetas limpias, sombras suaves y buen contraste.
            </p>
          </header>

          <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <article class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
              <div class="h-11 w-11 rounded-2xl bg-indigo-600 text-white grid place-items-center">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                  <path d="M6 4h10a2 2 0 0 1 2 2v14l-3-2-3 2-3-2-3 2V6a2 2 0 0 1 2-2Z"
                    stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                </svg>
              </div>
              <h3 class="mt-4 font-bold text-slate-900">Catálogo ordenado</h3>
              <p class="mt-2 text-sm text-slate-600">Búsqueda rápida, filtros y fichas claras por libro.</p>
            </article>

            <article class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
              <div class="h-11 w-11 rounded-2xl bg-emerald-600 text-white grid place-items-center">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                  <path d="M7 7h10M7 12h10M7 17h6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                  <path d="M5 4h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H9l-4 2V6a2 2 0 0 1 2-2Z"
                    stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                </svg>
              </div>
              <h3 class="mt-4 font-bold text-slate-900">Préstamos simples</h3>
              <p class="mt-2 text-sm text-slate-600">Reserva y control de fechas con avisos por vencer.</p>
            </article>

            <article class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
              <div class="h-11 w-11 rounded-2xl bg-slate-900 text-white grid place-items-center">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                  <path d="M12 3l9 8h-3v10h-5v-6H11v6H6V11H3l9-8Z"
                    stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                </svg>
              </div>
              <h3 class="mt-4 font-bold text-slate-900">Responsive real</h3>
              <p class="mt-2 text-sm text-slate-600">Se adapta perfecto a celular, tablet y PC.</p>
            </article>
          </div>
        </div>
      </section>

      
    </main>

    <!-- FOOTER -->
    <footer class="border-t border-slate-200 bg-white">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
          <div class="flex items-center gap-2">
            <div class="h-10 w-10 rounded-2xl bg-indigo-600 grid place-items-center text-white font-extrabold">B</div>
            <div>
              <p class="text-sm font-semibold text-slate-900">Biblioteca</p>
              <p class="text-xs text-slate-500">Hecha con HTML + Tailwind + JS Vanilla</p>
            </div>
          </div>

          <nav class="flex items-center gap-2" aria-label="Enlaces del pie">
            <a href="#inicio" class="px-3 py-2 rounded-xl text-sm font-medium text-slate-700 hover:bg-slate-100">Inicio</a>
            <a href="#login" class="px-3 py-2 rounded-xl text-sm font-medium text-slate-700 hover:bg-slate-100">Login</a>
          </nav>
        </div>

        <div class="mt-4 pt-4 border-t border-slate-200 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2">
          <p class="text-sm text-slate-500">© <span id="year"></span> Biblioteca • Inicio</p>
          <p class="text-sm text-slate-500">
            Imágenes de <span class="font-semibold text-slate-700">Unsplash</span> (uso libre).
          </p>
        </div>
      </div>
    </footer>

    <!-- MENÚ MÓVIL (Drawer) -->
    <div id="mobileOverlay" class="fixed inset-0 z-40 hidden">
      <div id="overlayBg" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" aria-hidden="true"></div>

      <aside
        id="mobileMenu"
        class="absolute left-0 top-0 h-full w-80 max-w-[85%] bg-white border-r border-slate-200 shadow-xl p-3"
        role="dialog"
        aria-modal="true"
        aria-label="Menú de navegación"
      >
        <div class="flex items-center justify-between p-2">
          <a href="#inicio" class="flex items-center gap-2">
            <div class="h-10 w-10 rounded-2xl bg-indigo-600 grid place-items-center text-white font-extrabold">B</div>
            <div class="leading-tight">
              <p class="font-semibold">Biblioteca</p>
              <p class="text-xs text-slate-500 -mt-0.5">Menú</p>
            </div>
          </a>

          <button
            id="btnClose"
            type="button"
            class="inline-flex items-center justify-center rounded-xl p-2 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            aria-label="Cerrar menú"
          >
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path d="M6 6l12 12M18 6 6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </button>
        </div>

        <nav class="p-2 space-y-1" aria-label="Navegación móvil">
          <a href="#inicio"
             class="flex items-center gap-3 px-4 py-3 rounded-xl bg-indigo-50 text-indigo-700 font-medium hover:bg-indigo-100">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path d="M4 10.5 12 4l8 6.5V20a1 1 0 0 1-1 1h-5v-7H10v7H5a1 1 0 0 1-1-1v-9.5Z"
                stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
            </svg>
            Inicio
          </a>

          <a href="#catalogo"
             class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-slate-100">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path d="M6 4h10a2 2 0 0 1 2 2v14l-3-2-3 2-3-2-3 2V6a2 2 0 0 1 2-2Z"
                stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
            </svg>
            Catálogo
          </a>

          <a href="#beneficios"
             class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-slate-100">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path d="M12 3l9 8h-3v10h-5v-6H11v6H6V11H3l9-8Z"
                stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
            </svg>
            Beneficios
          </a>

          <a href="#login"
             class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-slate-100">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path d="M10 7V5a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2v-2"
                stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
              <path d="M13 12H3m0 0 3-3m-3 3 3 3"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Login
          </a>

          <div class="mt-3 rounded-2xl bg-slate-50 border border-slate-200 p-4">
            <p class="text-sm font-semibold">Tip</p>
            <p class="text-xs text-slate-600 mt-1">
              Toca fuera para cerrar o presiona <span class="font-semibold">Esc</span>.
            </p>
          </div>
        </nav>
      </aside>
    </div>

  </div>

  <!-- JS Vanilla: Toggle drawer -->
  <script>
    const btnOpen = document.getElementById("btnOpen");
    const btnClose = document.getElementById("btnClose");
    const overlay = document.getElementById("mobileOverlay");
    const overlayBg = document.getElementById("overlayBg");
    const sidebar = document.getElementById("mobileMenu");

    function openMenu() {
      overlay.classList.remove("hidden");
      btnOpen?.setAttribute("aria-expanded", "true");

      sidebar.classList.remove("drawer-exit", "drawer-exit-active");
      sidebar.classList.add("drawer-enter");
      requestAnimationFrame(() => {
        sidebar.classList.add("drawer-enter-active");
        sidebar.classList.remove("drawer-enter");
      });

      document.body.style.overflow = "hidden";
    }

    function closeMenu() {
      btnOpen?.setAttribute("aria-expanded", "false");

      sidebar.classList.remove("drawer-enter", "drawer-enter-active");
      sidebar.classList.add("drawer-exit");
      requestAnimationFrame(() => {
        sidebar.classList.add("drawer-exit-active");
        sidebar.classList.remove("drawer-exit");
      });

      setTimeout(() => {
        overlay.classList.add("hidden");
        document.body.style.overflow = "";
      }, 250);
    }

    btnOpen?.addEventListener("click", openMenu);
    btnClose?.addEventListener("click", closeMenu);
    overlayBg?.addEventListener("click", closeMenu);

    // Cerrar al navegar (mejor UX)
    sidebar?.querySelectorAll("a[href^='#']").forEach(a => a.addEventListener("click", closeMenu));

    // Escape
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && !overlay.classList.contains("hidden")) closeMenu();
    });

    // Desktop
    window.addEventListener("resize", () => {
      if (window.innerWidth >= 768 && !overlay.classList.contains("hidden")) closeMenu();
    });

    // Año footer
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>
@endsection
