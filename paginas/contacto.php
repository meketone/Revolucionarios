<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/contacto.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="icon" href="logo1.png">
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/3e5cca439c.js" crossorigin="anonymous"></script>
    <script src="..\js\scriptmenu.js"></script>

    <?php require('../layouts/header.php') ?>


    <section id="principalContacto">
        <div class="contenedor">
            <div class="medio-circulo">
                <img src="Revolucionarios\imagenes\horarios.png" alt="Descripción de la imagen">
            </div>
            <div class="contacto">
                <h1>CONTACTO</h1>
            </div>

            <div class="redes">
                <div class="whatsapp">
                    <a href=""><img src="Revolucionarios\imagenes\whatsapp.png" alt="Icono de WhatsApp"></a>
                </div>
                <div class="facebook">
                    <a href=""><img src="Revolucionarios\imagenes\facebook.png" alt="Icono de Facebook"></a>
                </div>
            </div>

        </div>
    </section>

    <section class="sucursales">
        <h1 class="sucursales">SUCURSALES</h1>
    </section>

    <section id="contacto">

        <div id="mapita">
            <div id="map">
                <!-- Agrega el script de Leaflet -->
                <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

                <script>
                    // Inicializa el mapa con las coordenadas proporcionadas
                    var mymap = L.map('map').setView([19.729943, -101.198902], 16);

                    // Agrega el mapa de OpenStreetMap como capa base
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors'
                    }).addTo(mymap);

                    // Agrega un marcador en las coordenadas proporcionadas
                    L.marker([19.729943, -101.198902]).addTo(mymap)
                        .bindPopup('Encuéntranos!')
                        .openPopup();
                </script>
            </div>
        </div>
    </section>

    <section id="flecha">
        <div class="direccion">
            <img src="Revolucionarios\imagenes\direccion.png" alt="">
        </div>
    </section>

    <footer>
        <div class="footer-logo">
            <img src="path/to/your/logo.png" alt="Logo Los Revolucionarios">
        </div>
        <div class="footer-container">
            <div class="footer-section">
                <h4>Sucursales</h4>
                <p>#519 Av. Torreón Nuevo, Morelia, Mich.</p>
            </div>
            <div class="footer-section">
                <h4>Horario</h4>
                <p>1:00pm - 1:00am</p>
            </div>
            <div class="footer-section">
                <h4>Teléfono</h4>
                <p>443 232 4326</p>
            </div>
            <div class="footer-section">
                <h4>Nuestro Menú</h4>
                <p>TACOS | LA PARRILLA | MARISCOS | SANDWICH | ENSALADAS | ESPECIALIDADES | BOTANAS | COCTELES ESP</p>
            </div>
            <div class="footer-socials">
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>
    </body>

</html>