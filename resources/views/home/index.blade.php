@extends('layout.admin')
@section('title', 'Home')
@section('content')



          <!-- MAIN -->
          <main class="min-w-0">
            <!-- Encabezado de sección -->
            <section class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5">
              <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                  <h1 class="text-xl font-bold">Dashboard</h1>
                  <p class="text-sm text-slate-500">
                    Administra usuarios, libros y préstamos desde un solo lugar.
                  </p>
                </div>
                <div class="flex gap-2">
                  <button
                    class="px-4 py-2 rounded-xl bg-slate-900 text-white text-sm font-medium hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-400">
                    + Nuevo préstamo
                  </button>
                  <button
                    class="px-4 py-2 rounded-xl bg-white border border-slate-200 text-sm font-medium hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                    Agregar libro
                  </button>
                </div>
              </div>
            </section>

            <!-- Tarjetas resumen -->
            <section class="mt-6 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4" aria-label="Resumen">
              <article class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                <p class="text-xs text-slate-500 uppercase tracking-wider">Usuarios</p>
                <p class="text-2xl font-bold mt-1">128</p>
                <p class="text-sm text-emerald-700 mt-2">+8 esta semana</p>
              </article>

              <article class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                <p class="text-xs text-slate-500 uppercase tracking-wider">Libros</p>
                <p class="text-2xl font-bold mt-1">2,340</p>
                <p class="text-sm text-slate-500 mt-2">Catálogo total</p>
              </article>

              <article class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                <p class="text-xs text-slate-500 uppercase tracking-wider">Préstamos activos</p>
                <p class="text-2xl font-bold mt-1">42</p>
                <p class="text-sm text-amber-700 mt-2">9 por vencer</p>
              </article>

              <article class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                <p class="text-xs text-slate-500 uppercase tracking-wider">Atrasos</p>
                <p class="text-2xl font-bold mt-1">6</p>
                <p class="text-sm text-rose-700 mt-2">Requiere atención</p>
              </article>
            </section>

            <!-- Tabla / listado -->
            <section class="mt-6 bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
              <header class="p-5 border-b border-slate-200 flex items-center justify-between gap-3">
                <div>
                  <h2 class="font-semibold">Últimos préstamos</h2>
                  <p class="text-sm text-slate-500">Movimientos recientes del sistema.</p>
                </div>
                <form class="w-full sm:w-auto">
                  <label class="sr-only" for="search">Buscar</label>
                  <div class="relative">
                    <input id="search" type="search" placeholder="Buscar..."
                      class="w-full sm:w-64 rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 pl-10 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"/>
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-slate-400"
                      viewBox="0 0 24 24" fill="none" aria-hidden="true">
                      <path d="M21 21l-4.3-4.3M10.8 18.2a7.4 7.4 0 1 1 0-14.8 7.4 7.4 0 0 1 0 14.8Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                  </div>
                </form>
              </header>

              <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                  <thead class="bg-slate-50 text-slate-600">
                    <tr>
                      <th class="text-left font-semibold px-5 py-3">Usuario</th>
                      <th class="text-left font-semibold px-5 py-3">Libro</th>
                      <th class="text-left font-semibold px-5 py-3">Fecha</th>
                      <th class="text-left font-semibold px-5 py-3">Estado</th>
                      <th class="text-right font-semibold px-5 py-3">Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-slate-200">
                    <tr class="hover:bg-slate-50">
                      <td class="px-5 py-4 font-medium">María López</td>
                      <td class="px-5 py-4">Cien años de soledad</td>
                      <td class="px-5 py-4">2026-02-01</td>
                      <td class="px-5 py-4">
                        <span class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-1 text-emerald-700 font-medium">
                          Activo
                        </span>
                      </td>
                      <td class="px-5 py-4 text-right">
                        <button class="px-3 py-1.5 rounded-lg hover:bg-slate-100 font-medium">Ver</button>
                        <button class="px-3 py-1.5 rounded-lg hover:bg-slate-100 font-medium">Editar</button>
                      </td>
                    </tr>

                    <tr class="hover:bg-slate-50">
                      <td class="px-5 py-4 font-medium">Carlos Pérez</td>
                      <td class="px-5 py-4">El principito</td>
                      <td class="px-5 py-4">2026-01-29</td>
                      <td class="px-5 py-4">
                        <span class="inline-flex items-center rounded-full bg-amber-50 px-2.5 py-1 text-amber-700 font-medium">
                          Por vencer
                        </span>
                      </td>
                      <td class="px-5 py-4 text-right">
                        <button class="px-3 py-1.5 rounded-lg hover:bg-slate-100 font-medium">Ver</button>
                        <button class="px-3 py-1.5 rounded-lg hover:bg-slate-100 font-medium">Editar</button>
                      </td>
                    </tr>

                    <tr class="hover:bg-slate-50">
                      <td class="px-5 py-4 font-medium">Ana Torres</td>
                      <td class="px-5 py-4">Don Quijote</td>
                      <td class="px-5 py-4">2026-01-18</td>
                      <td class="px-5 py-4">
                        <span class="inline-flex items-center rounded-full bg-rose-50 px-2.5 py-1 text-rose-700 font-medium">
                          Atrasado
                        </span>
                      </td>
                      <td class="px-5 py-4 text-right">
                        <button class="px-3 py-1.5 rounded-lg hover:bg-slate-100 font-medium">Ver</button>
                        <button class="px-3 py-1.5 rounded-lg hover:bg-slate-100 font-medium">Editar</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </section>
          </main>
        </div>
      </div>
    </div>

 
@include('partials.auth.footer')
@endsection

