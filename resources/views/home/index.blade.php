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
                    class="px-4 py-2 rounded-xl bg-white border border-slate-200 text-sm font-medium hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-cyan-400">
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
                <p class="text-2xl font-bold mt-1">{{$totalLibros}}</p>
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
                <div class="flex items-center gap-3">
                  <h2 class="font-semibold">Libros</h2>
                   
                </div>
                
                <form method="GET" action="{{ route('home') }}" class="w-full sm:w-auto flex gap-2">
                  <a href="{{ route('libros.create') }}"
                    class="px-4 py-2 rounded-xl  bg-slate-300 border border-slate-200 text-sm font-medium hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                    + Agregar libro
                  </a>
                  <label class="sr-only" for="search">Buscar</label>
                  <div class="relative">
                    <input id="search" name="search" type="search" placeholder="Buscar..."
                      value="{{ request('search') }}"
                      class="w-full sm:w-64 rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 pl-10 text-sm focus:outline-none focus:ring-2 focus:ring-cyan-400"/>
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
                      <th class="text-left font-semibold px-5 py-3">Titulo</th>
                      <th class="text-left font-semibold px-5 py-3">Autor</th>
                      <th class="text-left font-semibold px-5 py-3">Categoría</th>
                      <th class="text-left font-semibold px-5 py-3">Editorial</th>
                      <th class="text-left font-semibold px-5 py-3">ISBN</th>
                      
                      <th class="text-left font-semibold px-5 py-3">Estado</th>
                      <th class="text-right font-semibold px-5 py-3">Acciones</th>
                    </tr>
                  </thead>
                <tbody class="divide-y divide-slate-200">
                  @foreach ($libros as $libro)
                    <tr class="hover:bg-slate-50">
                      <td class="px-5 py-4">{{ $libro->titulo }}</td>
                        <td class="px-5 py-4">{{ $libro->autor }}</td>
                        <td class="px-5 py-4">{{ $libro->categoria->nombre }}</td>
                        <td class="px-5 py-4">{{ $libro->editorial }}</td>
                        <td class="px-5 py-4">{{ $libro->isbn }}</td>
                        
                        <td class="px-5 py-4">
                            <span class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-1 text-emerald-700 font-medium">
                            Activo
                            </span>
                        </td>
                      <td class="px-5 py-4 text-right">
                          <div class="flex justify-end gap-2">
                            <form action="{{ route('libros.edit', $libro->id) }}" method="GET">
                                @csrf
                                <button
                                    class="text-blue-600 hover:bg-blue-100 p-2 rounded-full transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                    </svg>
                                </button>
                            </form>

                            <form action="{{ route('libros.destroy', $libro->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="text-red-500 hover:bg-red-100 p-2 rounded-full transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79" />
                                    </svg>
                                </button>
                            </form>
                          </div>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
                </table>
                <!-- paginación -->
                <div class="flex items-center justify-between px-5 py-4 border-t border-slate-200 bg-white">
                  <p class="text-sm text-slate-600">
                    Mostrando <span class="font-medium">1</span> a <span class="font-medium">6</span> de
                    <span class="font-medium">24</span> Resultados
                  </p>
                  <div class="flex items-center gap-1">

                    <button
                      class="px-3 py-1.5 text-sm rounded-md border border-slate-300 text-slate-600 hover:bg-slate-100 transition">
                      Anterior
                    </button>

                    <button
                      class="px-3 py-1.5 text-sm rounded-md bg-slate-800 text-white">
                      1
                    </button>

                    <button
                      class="px-3 py-1.5 text-sm rounded-md border border-slate-300 text-slate-700 hover:bg-slate-100 transition">
                      2
                    </button>

                    <button
                      class="px-3 py-1.5 text-sm rounded-md border border-slate-300 text-slate-700 hover:bg-slate-100 transition">
                      3
                    </button>

                   
                    <button
                      class="px-3 py-1.5 text-sm rounded-md border border-slate-300 text-slate-600 hover:bg-slate-100 transition">
                      Siguiente
                    </button>
                  </div>

                </div>
              </div>
            </section>
            
          </main>
        </div>
      </div>
    </div>

 
@include('partials.auth.footer')
        <script>
          document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('search');
            if (!input) return;
            const tbody = document.querySelector('table tbody');
            let timer = null;

            function escapeHtml(text) {
              if (text === null || text === undefined) return '';
              return String(text)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
            }

            function renderRows(items) {
              if (!tbody) return;
              if (!items.length) {
                tbody.innerHTML = '<tr><td class="px-5 py-4 text-gray-500" colspan="7">No se encontraron libros.</td></tr>';
                return;
              }
              const rows = items.map(function (l) {
                return '<tr class="hover:bg-slate-50">' +
                  `<td class="px-5 py-4">${escapeHtml(l.titulo)}</td>` +
                  `<td class="px-5 py-4">${escapeHtml(l.autor)}</td>` +
                  `<td class="px-5 py-4">${escapeHtml(l.categoria || '')}</td>` +
                  `<td class="px-5 py-4">${escapeHtml(l.editorial)}</td>` +
                  `<td class="px-5 py-4">${escapeHtml(l.isbn)}</td>` +
                  '<td class="px-5 py-4">' +
                  '<span class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-1 text-emerald-700 font-medium">Activo</span>' +
                  '</td>' +
                  '<td class="px-5 py-4 text-right">' +
                  '<button class="px-3 py-1.5 rounded-lg hover:bg-slate-100 font-medium">Ver</button>' +
                  '<button class="px-3 py-1.5 rounded-lg hover:bg-slate-100 font-medium">Editar</button>' +
                  '</td>' +
                  '</tr>';
              }).join('');
              tbody.innerHTML = rows;
            }

            input.addEventListener('input', function () {
              clearTimeout(timer);
              timer = setTimeout(function () {
                const q = input.value;
                const url = new URL(window.location.href);
                url.searchParams.set('search', q);

                fetch(url.toString(), {
                  headers: { 'Accept': 'application/json' }
                }).then(function (res) {
                  if (!res.ok) throw new Error('Network response was not ok');
                  return res.json();
                }).then(function (data) {
                  renderRows(data);
                }).catch(function (err) {
                  console.error('Search error:', err);
                });
              }, 200);
            });
          });
        </script>
      @endsection

