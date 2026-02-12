<footer class="footer bg-light text-muted py-4" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-4 mb-3">
				<h5 class="mb-1">{{ config('app.name', 'Biblioteca') }}</h5>
				<p class="small mb-0">Gestión de libros, préstamos y recursos para la comunidad. Visítanos para descubrir novedades y eventos.</p>
			</div>

			<div class="col-6 col-md-4 mb-3">
				<h6 class="mb-1">Enlaces</h6>
				<ul class="list-unstyled small mb-0">
					<li><a href="{{ url('/') }}">Inicio</a></li>
					<li><a href="{{ url('/libros') }}">Catálogo</a></li>
					<li><a href="{{ url('/acerca') }}">Acerca</a></li>
					<li><a href="{{ url('/contacto') }}">Contacto</a></li>
				</ul>
			</div>

			<div class="col-6 col-md-4 mb-3">
				<h6 class="mb-1">Contacto</h6>
				<p class="small mb-1">Correo: <a href="mailto:info@biblioteca.local">info@biblioteca.local</a></p>
				<p class="small mb-0">Tel: +51 000 000</p>
				<div class="mt-2" aria-hidden="false">
					<!-- Marcadores para iconos sociales; reemplazar con SVGs o componentes cuando estén disponibles -->
					<a href="#" class="me-2" aria-label="Facebook">FB</a>
					<a href="#" class="me-2" aria-label="Twitter">TW</a>
					<a href="#" aria-label="Instagram">IG</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 text-center pt-3">
				<small>&copy; {{ date('Y') }} {{ config('app.name', 'Biblioteca') }}. Todos los derechos reservados.</small>
			</div>
		</div>
	</div>
</footer>

<!-- Recomendación: añadir estilos en resources/css/app.css o reemplazar clases por las de tu framework CSS -->

