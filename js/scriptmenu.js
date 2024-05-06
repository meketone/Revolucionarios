// Función para mostrar/ocultar el menú lateral
function toggleMenu() {
    const sidebar = document.getElementById('sidebar');
    if (sidebar.style.left === "-250px") {
        sidebar.style.left = "0px";  // Mostrar el menú
    } else {
        sidebar.style.left = "-250px";  // Ocultar el menú
    }
}

// Función para el menú de navegación principal
const showMenu = (toggleId, navId) => {
    const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId);

    toggle.addEventListener('click', () => {
        // Añadir/quitar la clase show-menu al menú de navegación
        nav.classList.toggle('show-menu');
        // Añadir/quitar la clase show-icon para mostrar y ocultar el ícono del menú
        toggle.classList.toggle('show-icon');
    });
}

showMenu('nav-toggle', 'nav-menu');
