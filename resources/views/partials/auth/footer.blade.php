<footer class="bg-slate-50 text-slate-600 py-8" role="contentinfo">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
			<div>
				<h5 class="text-lg font-semibold mb-1">{{ config('app.name', 'Biblioteca') }}</h5>
				<p class="text-sm text-slate-500">Gestión de libros, préstamos y recursos para la comunidad. Visítanos para descubrir novedades y eventos.</p>
			</div>

			<div>
				<h6 class="text-sm font-semibold mb-1">Enlaces</h6>
				<ul class="space-y-1 text-sm">
					<li><a href="{{ url('/') }}" class="text-slate-700 hover:text-indigo-600">Inicio</a></li>
					<li><a href="{{ url('/libros') }}" class="text-slate-700 hover:text-indigo-600">Catálogo</a></li>
					<li><a href="{{ url('/acerca') }}" class="text-slate-700 hover:text-indigo-600">Acerca</a></li>
					<li><a href="{{ url('/contacto') }}" class="text-slate-700 hover:text-indigo-600">Contacto</a></li>
				</ul>
			</div>

			<div>
				<h6 class="text-sm font-semibold mb-1">Contacto</h6>
				<p class="text-sm text-slate-600 mb-1">Correo: <a href="mailto:info@biblioteca.local" class="text-indigo-600 hover:underline">info@biblioteca.local</a></p>
				<p class="text-sm text-slate-600 mb-2">Tel: +51 000 000</p>
				<div class="flex items-center space-x-3 mt-2" aria-hidden="false">
					<a href="#" class="text-slate-700 hover:text-indigo-600" aria-label="Facebook">FB</a>
					<a href="#" class="text-slate-700 hover:text-indigo-600" aria-label="Twitter">TW</a>
					<a href="#" class="text-slate-700 hover:text-indigo-600" aria-label="Instagram">IG</a>
				</div>
			</div>
		</div>

		<div class="mt-6 border-t border-slate-200 pt-4 text-center">
			<small class="text-sm text-slate-500">&copy; {{ date('Y') }} {{ config('app.name', 'Biblioteca') }}. Todos los derechos reservados.</small>
		</div>
	</div>
</footer>

<!-- Footer actualizado a clases Tailwind para coincidir con el layout principal -->

