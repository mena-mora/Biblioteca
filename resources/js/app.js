import './bootstrap';

// Toggle del menú de hamburguesa en pantallas pequeñas
function initSidebarToggle() {
  const sidebarToggle = document.getElementById('sidebar-toggle');
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('overlay');

  console.log('Inicializando sidebar toggle...', { sidebarToggle, sidebar, overlay });

  if (!sidebarToggle || !sidebar || !overlay) {
    console.error('Elementos del sidebar no encontrados');
    return;
  }

  // Toggle al hacer click en el botón de hamburguesa
  sidebarToggle.addEventListener('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    console.log('Toggle clicked');
    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
  });

  // Cerrar sidebar al hacer click en el overlay
  overlay.addEventListener('click', function () {
    console.log('Overlay clicked');
    sidebar.classList.add('-translate-x-full');
    overlay.classList.add('hidden');
  });

  // Cerrar sidebar al hacer click en un link
  const sidebarLinks = sidebar.querySelectorAll('a');
  sidebarLinks.forEach(link => {
    link.addEventListener('click', function () {
      console.log('Link clicked');
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });
  });
}

// Ejecutar cuando el DOM está listo
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initSidebarToggle);
} else {
  initSidebarToggle();
}
